@extends('admin.layout')

@section('content')
<form action="{{route('category.update',Crypt::encrypt($data->id))}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class=" card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit Category</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name='name' class="form-control" value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis</label>
                            <select class="form-control" name='jk'>
                                <option>Pilih Jenis Kategory</option>
                                <option value="makanan" {{$data->jk == "makanan" ? "selected" : ""}}>Makanan & Minuman</option>
                                <option value="benda" {{$data->jk == "benda" ? "selected" : ""}}>Benda</option>
                            </select>
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{route('category.index')}}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection