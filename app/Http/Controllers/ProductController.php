<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('product.index', compact(['products', 'categories']));
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
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'stock' => 'required',
            'harga' => 'required',
            'id_categories' => 'required',
        ]);

        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/products', 'public');
        Product::create($data);
        toast('Data Products berhasil ditambahkan')->autoClose(2000)->hideCloseButton();
        return redirect()->back();
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
    public function edit($id)
    {
        $products = Product::with('category')->FindOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact(['products', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $products = Product::find($request->id);

        if ($request->file('image')) {

            Storage::delete('public/' . $products->image);
            $file = $request->file('image')->store('assets/products', 'public');
            $products->image = $file;
        }

        $products->name = $request->name;
        $products->stock = $request->stock;
        $products->harga = $request->harga;
        $products->id_categories = $request->id_categories;


        $products->save();
        toast('Data Products berhasil diubah')->autoClose(2000)->hideCloseButton();
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
        $user = Product::find($request->id);
        $user->delete();

        toast('Data Products berhasil dihapus')->autoClose(2000)->hideCloseButton();
        return redirect()->back();
    }
}
