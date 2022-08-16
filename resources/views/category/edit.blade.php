@extends('layouts.admin')

@section('content')
    
            <div class="card">
              <div class="card-body">
              
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('category-update',['id' => $categories->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label for="title">Nama Category</label>
                                <input required type="text" class="form-control" name="name" value="{{ $categories->name }}">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success text-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
@endsection

