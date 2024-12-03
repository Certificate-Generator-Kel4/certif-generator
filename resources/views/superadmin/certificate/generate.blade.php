@extends('layouts_dashboard.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Pilih Template Sertifikat Anda</h2>

    <div class="row justify-content-center">
        @if($templates->isEmpty())
            <p class="text-center">Tidak ada template tersedia.</p>
        @else
            @foreach ($templates as $template)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('sertif/' . $template->preview) }}" class="card-img-top" alt="Template">
                    <div class="card-body text-center">
                        <h5 class="card-title">Template {{ $template->name }}</h5>
                        <a href="{{ route('generate', ['template_id' => $template->id]) }}" class="btn btn-success">Select</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
