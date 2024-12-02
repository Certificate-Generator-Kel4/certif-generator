@extends('layouts_dashboard.app')

@section('content')
<div class="container mt-4">
    <h1>Add Certificate Template</h1>
    <form method="POST" action="{{ route('certificate.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Template Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="background_url" class="form-label">Background URL</label>
            <input type="url" class="form-control" id="background_url" name="background_url" required>
        </div>
        <div class="mb-3">
            <label for="style" class="form-label">Style (Optional)</label>
            <input type="text" class="form-control" id="style" name="style">
        </div>
        <button type="submit" class="btn btn-primary">Add Template</button>
    </form>
</div>
@endsection
