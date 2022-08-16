@extends('layouts.template')

@section('content')
    @foreach ($products as $pro)
        <div class="card mt-5" style="width: 18rem;">
            <img src="{{ asset('storage/'.$pro->image) }}" class="card-img-top" height="100px" width="100px">
            <div class="card-body">
                <form action="{{ route('booking-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_users" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_products" value="{{ $pro->id }}">   
                    <input type="hidden" name="tagihan" value="{{ $pro->harga }}">   
                    <input type="hidden" name="jumlah" value="1">   
                    <h5 class="card-title">{{ $pro->name }} / ({{ $pro->stock }} kamar)</h5>
                    <p class="card-text">Rp {{ number_format($pro->harga,2,',','.') }}/hari</p>
                    <input type="date" value="2022-08-11" name="tanggal"> 
                    <input type="submit" class="btn btn-success" value="Booking now"> 
                </form>
            </div>
        </div>
     @endforeach
@endsection

