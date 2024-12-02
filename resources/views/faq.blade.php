@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div id="FAQ" class="container min-vh-100 d-flex flex-column justify-content-center">
    <div class="row">
        <!-- Left Section -->
        <div class="col-12 col-md-6 mb-4 mb-md-0">
            <h1 class="fw-bold mb-3">FAQ</h1>
            <p class="mb-4">Got questions? We've got answers! Our team is here to help make your experience as smooth as possible. If you don't find what you're looking for, don't hesitate to reach out—we're just a click away.</p>
            <a href="/contact" class="btn btn-warning">Get in Touch</a>
        </div>

        <!-- Right Section -->
        <div class="col-12 col-md-6">
            <ul class="list-group">
                <!-- Pertanyaan 1 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>What is the Certificate Generator Web?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq1"></i>
                    </div>
                    <div id="faq1" class="collapse mt-2">
                        The Certificate Generator Web is a platform that allows you to easily create, customize, and download certificates for various purposes.
                    </div>
                </li>

                <!-- Pertanyaan 2 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Who can use this service?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq2"></i>
                    </div>
                    <div id="faq2" class="collapse mt-2">
                        This service can be used by individuals, companies, and organizations who need professional and customizable certificates.
                    </div>
                </li>

                <!-- Pertanyaan 3 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Is this service free?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq3"></i>
                    </div>
                    <div id="faq3" class="collapse mt-2">
                        Yes, the service offers both free and premium options depending on your needs.
                    </div>
                </li>

                <!-- Pertanyaan 4 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>What formats are available for download?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq4"></i>
                    </div>
                    <div id="faq4" class="collapse mt-2">
                        You can download certificates in PDF, PNG, and JPEG formats.
                    </div>
                </li>

                <!-- Pertanyaan 5 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>How do I create a certificate?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq5"></i>
                    </div>
                    <div id="faq5" class="collapse mt-2">
                        Simply sign up, select a template, customize the details, and download your certificate.
                    </div>
                </li>

                <!-- Pertanyaan 6 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Can I customize the certificate template?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq6"></i>
                    </div>
                    <div id="faq6" class="collapse mt-2">
                        Yes, you can customize text, fonts, colors, and logos on the templates.
                    </div>
                </li>

                <!-- Pertanyaan 7 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>What if I face any technical issues?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq7"></i>
                    </div>
                    <div id="faq7" class="collapse mt-2">
                        You can contact our support team via the 'Contact Us' page for assistance.
                    </div>
                </li>

                <!-- Pertanyaan 8 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Is my data secure?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq8"></i>
                    </div>
                    <div id="faq8" class="collapse mt-2">
                        Yes, we use advanced encryption protocols to ensure the security of your data.
                    </div>
                </li>

                <!-- Pertanyaan 9 -->
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>How long does it take to generate a certificate?</span>
                        <i class="fas fa-chevron-right toggle-icon" data-bs-toggle="collapse" data-bs-target="#faq9"></i>
                    </div>
                    <div id="faq9" class="collapse mt-2">
                        It typically takes just a few seconds to generate a certificate once all details are entered.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
