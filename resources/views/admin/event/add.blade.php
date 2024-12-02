@extends('layouts_dashboard.app')

@section('back')
<a href="javascript:history.back()" class="btn btn-primary mb-3"><i class="fa-solid fa-backward"></i></a>
@endsection

@section('content')
<div class="card-header py-3 d-flex justify-content-start mb-3">
<div class="col-lg-12 margin-tb d-flex justify-content-start">
            <div class="pull-left">
                <h3>Add Data Event</h3>
            </div>
        </div>
</div>

<form action="{{route('admin.event.store')}}"  method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" id="nama_event">
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
    </div>

    <div class="form-group">
        <label for="no_telephone">No Telephone</label>
        <input type="number" name="no_telp" class="form-control" id="no_telephone">
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="logo">Logo</label>
        <input type="file" class="form-control-file" name="logo" id="logo">
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="tanggal">Tanggal Pelaksanaan</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal">
        </div>

        <div class="form-group col-md-6">
            <label for="ttd">Tanda Tangan</label>
            <input type="text" name="ttd" class="form-control" id="ttd" placeholder="atas nama">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection('content')
