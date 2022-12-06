@extends('admin.layout')

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class=" card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Produk</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name='name' class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mitra</label>
                            <select class="form-control" name='jk'>
                                <option>Pilih Mitra</option>
                                {{-- <option value="laki-laki" {{old('jk') == "laki-laki" ? "selected" : ""}}>laki-laki</option>
                                <option value="perempuan" {{old('jk') == "perempuan" ? "selected" : ""}}>perempuan</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kategori</label>
                            <select class="form-control" name='jk'>
                                <option>Pilih Kategori</option>
                                {{-- <option value="laki-laki" {{old('jk') == "laki-laki" ? "selected" : ""}}>laki-laki</option>
                                <option value="perempuan" {{old('jk') == "perempuan" ? "selected" : ""}}>perempuan</option> --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga</label>
                            <input type="text" name='harga' class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stok</label>
                            <input type="text" name='stok' class="form-control" value="">
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{route('mitra.index')}}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection