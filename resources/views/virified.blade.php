@extends('layouts.app')

@section('content')
<!-- Back to Home -->
<div class="container mt-3">
    <a href="/" class="text-decoration-none text-dark fw-bold">
        &larr; Back to Home
    </a>
</div>

<!-- Certificate Verification -->
<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="bg-white shadow p-5 rounded text-center" style="max-width: 600px;">
        <!-- Certificate Verified Image -->
        <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" 
             alt="Verified Icon" class="mb-4" style="width: 100px; height: auto;">

        <!-- Title -->
        <h2 class="fw-bold">Certificate Verified Successfully</h2>
        
        <!-- Certificate Details -->
        <div class="text-start mt-4">
            <p><strong>Certificate Holder:</strong> <span class="float-end">John Doe</span></p>
            <p><strong>Event Name:</strong> <span class="float-end">UI/UX Design</span></p>
            <p><strong>Issued By:</strong> <span class="float-end">Maxy Academ</span></p>
            <p><strong>Issue Date:</strong> <span class="float-end">November 20, 2024</span></p>
            <p><strong>Certificate UID:</strong> <span class="float-end">Cert1234-5678-ABCD</span></p>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="#" class="btn btn-warning d-flex align-items-center">
                <i class="bi bi-download me-2"></i> Download
            </a>
            <a href="#" class="btn btn-warning d-flex align-items-center">
                <i class="bi bi-share me-2"></i> Share
            </a>
        </div>
    </div>
</div>
@endsection
