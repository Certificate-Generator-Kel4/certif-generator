@extends('layouts_dashboard.app')

@section('back')
<a href="javascript:history.back()" class="btn btn-primary mb-3"><i class="fa-solid fa-backward"></i></a>
@endsection

@section('content')

<p>
    Judul Certif :
    {{   $certif->event->nama_event }}
</p>

<p>
    Nama Peserta : 
    {{   $certif->participant->nama }}
</p>

@endsection('content')