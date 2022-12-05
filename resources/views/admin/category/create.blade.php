@extends('admin.layout')
@section('content')
<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class=" card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Tambah Kategori</h2>
                    </div>
                    @include('admin.partials.flash')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name='name' class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis</label>
                            <select class="form-control" name='type'>
                                <option>Pilih Jenis Kategori</option>
                                <option value="1" {{old('type') === '1' ? "selected" : ""}}>Makanan & Minuman</option>
                                <option value="1" {{old('type') === '2' ? "selected" : ""}}>Benda</option>
                            </select>
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{route('category.index')}}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection