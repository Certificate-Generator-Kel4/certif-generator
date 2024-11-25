@extends('layouts_dashboard.app')

@section('back')
<a href="javascript:history.back()" class="btn btn-primary mb-3"><i class="fa-solid fa-backward"></i></a>
@endsection

@section('content')
<div class="card-header py-3 d-flex justify-content-start mb-3">
    <div class="row">

        <div class="col-lg-12 margin-tb d-flex justify-content-start">
            <div class="pull-left">
                <h3>Edit Product</h3>
            </div>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>


<form action="{{route('superadmin.event.update', $event->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <input type="hidden" name="user_id" value="{{ $event->user_id }}">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" id="nama_event" value="{{ $event->nama_event }}">
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $event->email }}">
        </div>

    </div>
    <div class="form-group">
        <label for="no_telephone">No Telephone</label>
        <input type="number" name="no_telp" class="form-control" id="no_telephone" value="{{ $event->no_telp }}">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ $event->deskripsi }}</textarea>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="logo">Input Logo</label>
            @if($event->logo)
            <div>
                <img src="{{ asset('storage/' . $event->logo) }}" alt="Current Logo" width="100">
            </div>
            @endif
            <input type="file" class="form-control-file" name="logo" id="logo">
        </div>
    </div>
    <div class="form-row">


        <div class="form-group col-md-6">
            <label for="tanggal">Tanggal Pelaksanaan</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $event->tanggal }}">
        </div>

        <div class="form-group col-md-6">
            <label for="ttd">Tanda Tangan</label>
            <input type="ttd" name="ttd" class="form-control" id="ttd" value="{{ $event->ttd }}">
        </div>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection('content')
