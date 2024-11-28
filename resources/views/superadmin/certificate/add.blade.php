@extends('layouts_dashboard.app')

@section('content')


<form action="{{route('superadmin.event.store')}}"  method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nama_event">Nama Event</label>
            <input type="text" name="nama_event" class="form-control" id="nama_event">
        </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection('content')