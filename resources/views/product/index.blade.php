@extends('layouts.template')

@section('content')
    @section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header justify-content-between d-flex d-inline">
            <h4 class="card-title"> Data Products</h4>
            <a href="#" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"> Tambah</i></a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                <thead class=" text-primary">
                    <th>NAME</th>
                    <th>STOCK</th>
                    <th>HARGA</th>
                    <th>CATEGORIES</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>   
                </thead>
                <tbody>
                    @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->stock }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td><img src="{{ asset('storage/'.$p->image) }}" class="img-fluid" width="50px"></td>
                        <td>
                            <a href="#" data-id="{{ $p->id }}" data-name="{{ $p->name }}" data-harga="{{ $p->harga }}" data-stock="{{ $p->stock }}" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></a>
                            <a href="#" data-target="#delete" data-toggle="modal" data-id="{{ $p->id }}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('products-delete') }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id">
                        <div class="modal-header">
                            <h5 class="modal-title"><span>Hapus</span> Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus Data Admin ini ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('products-store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="modal-header">
                            <h5 class="modal-title"><span>Tambah</span> Data Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                             <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required>
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required>
                                @error('stock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
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
                                <input type="file" class="form-control" name="image" placeholder="image" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('products-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id">
                        <div class="modal-header">
                            <h5 class="modal-title"><span>Ubah</span> Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required>
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock">stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" required>
                                @error('stock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
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
                                <img src="{{ asset('storage/'.$p->image) }}" class="img-fluid" width="50px">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    $("#edit").on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var name = $(e.relatedTarget).data('name');
        var harga = $(e.relatedTarget).data('harga');
        var stock = $(e.relatedTarget).data('stock');
        $('#edit').find('input[name="id"]').val(id);
        $('#edit').find('input[name="name"]').val(name);
        $('#edit').find('input[name="harga"]').val(harga);
        $('#edit').find('input[name="stock"]').val(stock);
    });
    
    $('#delete').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        console.log(id);
        $('#delete').find('input[name="id"]').val(id);
    });
</script>
@endpush
        
        