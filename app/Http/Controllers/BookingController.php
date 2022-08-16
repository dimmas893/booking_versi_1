<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Product;
use App\Models\Status;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = booking::with('status', 'user', 'products')->get();
        $status = Status::all();
        return view('booking.index', compact(['booking', 'status']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $dataStokKamar = Product::where('id', $request->id_products)->first();
        $dataTransaksiKamar = Transaction::where('tanggal', $request->tanggal)->where('id_products', $request->id_products)->count();
        $stokTersedia = $dataStokKamar->stock - $dataTransaksiKamar;
        // dd($stokTersedia);


        if ($request->jumlah <= $stokTersedia) {
            $external_id = 'va-' . time();
            $booking = [
                'no_invoice' => $external_id,
                'bukti_bayar' => $request->bukti_bayar,
                'tanggal' => $request->tanggal,
                'id_products' => $request->id_products,
                'id_users' => $request->id_users,
                'id_status' => '1',
                'jumlah' => $request->jumlah,
                'tagihan' => $request->tagihan,
            ];
            $bookingg =  booking::create($booking);

            // dd($bookingg);

            Transaction::create([
                'id_booking' => $bookingg['id'],
                'id_products' => $bookingg['id_products'],
                'tanggal' => $bookingg['tanggal'],
            ]);
            toast('Booking kamar berhasil')->autoClose(2000)->hideCloseButton();
            return redirect()->back();
        } else {
            toast('Maaf Kamar Sudah Penuh')->autoClose(2000)->hideCloseButton();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $booking = booking::with('status', 'user', 'products')->FindOrFail($id);
    //     $status = Status::all();
    //     return view('booking.edit', compact(['booking', 'status']));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->id_status = $request->id_status;
        $booking->save();
        toast('Data Berhasil di Update')->autoClose(2000)->hideCloseButton();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        booking::destroy($request->id);

        toast('Data Berhasil Diupdate')->autoClose(2000)->hideCloseButton();
        return redirect()->back();
    }
}
