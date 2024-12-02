@extends('layouts_dashboard.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Certificate Template</h1>
    <form method="POST" action="{{ route('certificate.update', $template->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Template Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $template->title }}" required>
        </div>
        <div class="mb-3">
            <label for="background_url" class="form-label">Background URL</label>
            <input type="url" class="form-control" id="background_url" name="background_url" value="{{ $template->background_url }}" required>
        </div>
        <div class="mb-3">
            <label for="style" class="form-label">Style (Optional)</label>
            <input type="text" class="form-control" id="style" name="style" value="{{ $template->style }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Template</button>
    </form>
</div>
@endsection
