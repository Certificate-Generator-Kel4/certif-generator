@extends('layouts_dashboard.app')

@section('content')
<div class="container mt-5">
    <h2>Atur Certificate Template</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTemplateModal"> Tambah Template</a>
    </div>
    <div class="row">
        @foreach ($templates as $template)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($template['preview']) }}" class="card-img-top" alt="{{ $template['name'] }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $template['name'] }}</h5>
                        <a href="{{ route('superadmin.certificate.generate', ['template_id' => $template['id']]) }}" class="btn btn-success">Select</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal for Adding New Template -->
<div class="modal fade" id="addTemplateModal" tabindex="-1" aria-labelledby="addTemplateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('certificate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addTemplateModalLabel">Add New Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="templateName" class="form-label">Template Name</label>
                        <input type="text" class="form-control" id="templateName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="templateFile" class="form-label">Upload Template Preview</label>
                        <input type="file" class="form-control" id="templateFile" name="preview" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Template</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
