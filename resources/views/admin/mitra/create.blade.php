@extends('admin.layout')
@section('content')
<form action="{{route('mitra.store')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class=" card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Tambah Mitra</h2>
                    </div>
                    @include('admin.partials.flash')
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name='name' class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Admin Perusahaan</label>
                            <input type="text" name='namaAdminPt' class="form-control" value="{{old('namaAdminPt')}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name='jk'>
                                <option>Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{old('jk') == "laki-laki" ? "selected" : ""}}>laki-laki</option>
                                <option value="perempuan" {{old('jk') == "perempuan" ? "selected" : ""}}>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">No telepon</label>
                            <input type="text" name='notelp' class="form-control" value="{{old('notelp')}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" name='email' class="form-control" value="{{old('email')}}">
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