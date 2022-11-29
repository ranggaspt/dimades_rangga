@extends('admin.layout')
@section('content')
        <form method="post" action="{{ route('mitra.update', Crypt::encrypt($data->id))}}">
        {{ csrf_field() }}
        <div class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-default">
                        <div class="card-header">
                            <h2>Edit Mitra</h2>
                        </div>
                    </div>
                    @include('admin.partials.flash')
                    <diV class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Admin PT</label>
                            <input type="text" name="namaAdminPt" class="form-control" value="{{$data->namaAdminPt}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{$data->jk == "Laki-laki" ? "selected" : ""}}>Laki-Laki</option>
                                <option value="Perempuan" {{$data->jk == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="notelp" value="{{$data->notelp}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$data->email}}">
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Simpan</button>
                            <a href="{{route('mitra.index')}}" class="btn btn-secondary btn-default">Kembali</a>
                        </div>
                    </diV>
                </div>
            </div>
        </div>
        </form>
@endsection