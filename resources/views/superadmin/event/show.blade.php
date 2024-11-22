@extends('layouts_dashboard.app')

@section('content')

<div class="row">
    <div class="col-6">
        Judul Event : {{$detail_event->nama_event}}
    </div>
    <div class="col-6">
    email Event : {{$detail_event->email}}
    </div>
</div>

<h4 class="mt-4">list peserta : </h4>
@foreach ($participant as $p)
    <p>Nama : {{$p->nama}}</p>
@endforeach

@endsection('content')