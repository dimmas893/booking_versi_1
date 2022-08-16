@extends('layouts.admin')

@section('content')
    
            <div class="card">
              <div class="card-body">
                 <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('products-update',['id' => $products->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="title">Nama Products</label>
                                        <input required type="text" class="form-control" name="name" value="{{ $products->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="number" class="form-control" name="stock" placeholder="stock" value="{{ $products->stock }}" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="harga" placeholder="harga" value="{{ $products->harga }}" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Kategori Product</label>
                                        <select name="id_categories" class="form-control">
                                            @foreach ($categories as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> 
                                    
                                     <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="image" placeholder="image" />
                                        <img src="{{ asset('storage/'.$products->image) }}" class="img-fluid" width="20%">
                                    </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success text-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
@endsection

