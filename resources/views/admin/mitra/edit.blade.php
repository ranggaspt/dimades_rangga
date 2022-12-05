@extends('admin.layout')

@section('content')
<form action="{{route('mitra.update',Crypt::encrypt($data->id))}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class=" card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Mitra</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" name='name' class="form-control" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Admin Perusahaan</label>
                            <input type="text" name='namaAdminPt' class="form-control" value="{{$data->namaAdminPt}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name='jk'>
                                <option>Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{$data->jk == "laki-laki" ? "selected" : ""}}>laki-laki</option>
                                <option value="perempuan" {{$data->jk == "perempuan" ? "selected" : ""}}>perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">No telepon</label>
                            <input type="text" name='notelp' class="form-control" value="{{$data->notelp}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" name='email' class="form-control" value="{{$data->email}}">
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{route('mitra.index')}}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection