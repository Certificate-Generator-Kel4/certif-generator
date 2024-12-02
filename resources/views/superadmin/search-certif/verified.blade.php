@extends('layouts_dashboard.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Certificate Templates</h1>
    <a href="{{ route('certificate.create') }}" class="btn btn-success mb-3">Add New Template</a>
    <div class="row">
        @foreach($templates as $template)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $template->background_url }}" class="card-img-top" alt="{{ $template->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $template->title }}</h5>
                    <p>{{ $template->style }}</p>
                    <a href="{{ route('certificate.edit', $template->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
    verified
@endsection('content')
