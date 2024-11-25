@extends('layouts_dashboard.app')

@section('back')
<a href="javascript:history.back()" class="btn btn-primary mb-3 btn-sm"><i class="fa-solid fa-backward"></i></a>
<a href="{{route('superadmin.participant.export_template')}}" class="btn btn-sm btn-dark mb-3"> Template <i class="fa-solid fa-file-excel" style="color: #63E6BE;"></i></a>
@endsection

@section('content')
<form action="{{ route('superadmin.participant.import.store') }}" method="POST" enctype="multipart/form-data">
    @csrf   
    <input type="hidden" value="{{$eventID}}" name="event_id">
    <input type="file" name="file" class="form-control">
    <br>
    <button class="btn btn-success">Import User Data</button>
</form>
@endsection('content')
