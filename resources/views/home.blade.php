@extends('layouts.app')
@section('title', 'Certificate Generator')
@section('content')

<div class="container">
    <!-- Hero Section -->
    <section class="hero text-white text-center py-5">
        <!-- Judul Utama -->
        <h1 class="display-4 fw-bold text-dark">Verify Your Certificate in Seconds</h1>
        <p class="lead text-dark">Enter the UID to check the authenticity and details of your certificate.</p>
        
        <!-- Tombol -->
        <div class="my-4" style="margin-bottom: 15px;">
            <button onclick="window.location.href='{{ route('certificate.verification') }}'" class="btn btn-lg" style="background-color: #FFEE32; border: none; padding: 10px 20px;">Check Certificate</button>
        </div>
    
        <!-- Gambar -->
        <img src="{{ asset('assets/11.png') }}" class="img-fluid" alt="Banner Image" 
             style="width: 100%; height: auto; display: block; margin: 0; padding: 0;">
    </section>
    

<!-- How to Verify Section -->
<section id="verify" class="py-5">
    <div class="container py-5">
        <h2 class="text-center mb-4">How to Verify Your Certificate</h2>
        <div class="row text-center">
          <!-- Step 1 -->
          <div class="col-md-4">
            <div class="icon-circle">
              <img src="{{ asset('assets/Glyph_ undefined.png') }}" alt="Locate UID">
            </div>
            <div class="step-title">Locate the Certificate UID</div>
            <p class="step-text">Find the Unique Identifier (UID) on your certificate. It’s usually located at the bottom-right corner.</p>
          </div>
          <!-- Step 2 -->
          <div class="col-md-4">
            <div class="icon-circle">
              <img src="{{ asset('assets/Keyboard.png') }}" alt="Enter UID">
            </div>
            <div class="step-title">Enter the UID in the Field Above</div>
            <p class="step-text">Type the UID code into the verification box and click "Verify Now".</p>
          </div>
          <!-- Step 3 -->
          <div class="col-md-4">
            <div class="icon-circle">
              <img src="{{ asset('assets/Arrow.png') }}" alt="Confirm Details">
            </div>
            <div class="step-title">Confirm the Certificate Details</div>
            <p class="step-text">Instantly view the certificate details, including the recipient's name, issue date, and issuing organization.</p>
          </div>
        </div>
        <div class="check-btn">
          <button onclick="window.location.href='{{ route('certificate.verification') }}'" class="btn btn-lg" style="background-color: #FFEE32; border: none; padding: 10px 20px;">Check Certificate</button>
        </div>
      </div>
</section>


 <!-- Why Verify Section -->
 <section class="py-5  text-center">
    <div class="container">
      <h2 class="fw-bold">Why Verify With Us?</h2>
      <div class="row mt-5 g-4">
        <!-- Fast & Easy Verification -->
        <div class="col-md-6 col-lg-4">
          <div class="card shadow border-0 h-100" style="background-color: #FFEE32;">
            <div class="card-body">
              <img src="{{ asset('assets/Lock.png') }}" alt="Fast Icon" class="img-fluid mb-3" style="width: 40px; height: auto;">
              <h5 class="card-title">Fast & Easy Verification</h5>
              <p class="card-text">Quickly verify your certificates by entering a Unique Identifier (UID) for instant results. No delays—confirm authenticity in seconds.</p>
            </div>
          </div>
        </div>
        <!-- Secure & Trusted Platform -->
        <div class="col-md-6 col-lg-4">
          <div class="card shadow border-0 h-100" style="background-color: #FFEE32;">
            <div class="card-body">
              <img src="{{ asset('assets/Timer.png') }}" alt="Secure Icon" class="img-fluid mb-3"style="width: 40px; height: auto;">
              <h5 class="card-title">Secure & Trusted Platform</h5>
              <p class="card-text">Your data is protected with advanced encryption, ensuring all verifications are secure and tamper-proof. Trust in complete data integrity.</p>
            </div>
          </div>
        </div>
        <!-- Trusted by Organizations -->
        <div class="col-md-6 col-lg-4">
          <div class="card shadow border-0 h-100" style="background-color: #FFEE32;">
            <div class="card-body">
              <img src="{{ asset('assets/Web.png') }}" alt="Trusted Icon" class="img-fluid mb-3"style="width: 40px; height: auto;">
              <h5 class="card-title">Trusted by Organizations</h5>
              <p class="card-text">Thousands of users and top institutions rely on our platform to validate certificates for academic and professional achievements.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Ready to Verify Section -->
<section class="text-center py-5  text-white">
    <div class="container">
        <h2>Ready to Verify Your Certificate?</h2>
        <a href="#verify" class="btn  btn-lg mt-3" style="background-color: #FFEE32;">Check Certificate</a>
    </div>
</section>


<!-- Testimonials Section -->
<section id="testimonials" class="testimonials py-5">
    <div class="container">
      <!-- Judul Section -->
      <h2 class="text-center mb-4">What Our Users Are Saying</h2>
      <p class="text-center text-muted mb-5">
        Here's what our users say about our service.
      </p>
  
      <!-- Grid Testimonials -->
      <div class="row g-4">
        <!-- Testimonial Card 1 -->
        <div class="col-md-3">
          <div class="card h-100 p-4 shadow-sm border-0" style="background-color: #FFEE32;">
            <!-- Rating Bintang -->
            <div class="stars mb-3 text-center">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star text-muted"></i>
            </div>
            <!-- Isi Testimonial -->
            <p class="text-muted text-center">
              This platform has made certificate verification so quick and easy. It’s transformed our HR processes, saving us valuable time.
            </p>
            <!-- Avatar dan Info Pengguna -->
            <div class="d-flex align-items-center mt-auto">
              <img
                src="{{ asset('assets/Testi 1.png') }}"
                alt="User Avatar"
                class="rounded-circle me-3"
                width="50"
              />
              <div>
                <h6 class="mb-0 fw-bold">Sarah Johnson</h6>
                <small class="text-muted">HR Manager</small>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Testimonial Card 2 -->
        <div class="col-md-3">
          <div class="card h-100 p-4 shadow-sm border-0" style="background-color: #FFEE32;">
            <div class="stars mb-3 text-center">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="text-muted text-center">
              The secure UID feature ensures our certificates are authentic. Our students love how easily they can share verified achievements on LinkedIn.
            </p>
            <div class="d-flex align-items-center mt-auto">
              <img
                src="{{ asset('assets/Testi 2.png') }}"
                alt="User Avatar"
                class="rounded-circle me-3"
                width="50"
              />
              <div>
                <h6 class="mb-0 fw-bold">Michael Lee</h6>
                <small class="text-muted">Training Coordinator</small>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Testimonial Card 3 -->
        <div class="col-md-3">
          <div class="card h-100 p-4 shadow-sm border-0" style="background-color: #FFEE32;">
            <div class="stars mb-3 text-center">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star text-muted"></i>
              <i class="bi bi-star text-muted"></i>
            </div>
            <p class="text-muted text-center">
              We needed a reliable verification tool, and this platform exceeded our expectations with seamless integration, robust features, and great analytics.
            </p>
            <div class="d-flex align-items-center mt-auto">
              <img
                src="{{ asset('assets/Testi 3.png') }}"
                alt="User Avatar"
                class="rounded-circle me-3"
                width="50"
              />
              <div>
                <h6 class="mb-0 fw-bold">Linda Garcia</h6>
                <small class="text-muted">Head of Compliance</small>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Testimonial Card 4 -->
        <div class="col-md-3">
          <div class="card h-100 p-4 shadow-sm border-0" style="background-color: #FFEE32;">
            <div class="stars mb-3 text-center">
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
              <i class="bi bi-star-fill text-warning"></i>
            </div>
            <p class="text-muted text-center">
              Managing certificates for large events has never been easier. Automated emails and instant verification save us hours of work.
            </p>
            <div class="d-flex align-items-center mt-auto">
              <img
                src="{{ asset('assets/Testi 4.png') }}"
                alt="User Avatar"
                class="rounded-circle me-3"
                width="50"
              />
              <div>
                <h6 class="mb-0 fw-bold">David Thompson</h6>
                <small class="text-muted">Event Organizer</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
  
<!-- FAQ Section -->
<section id="FAQ" class="faq-section py-5">
    <div class="container-sm"> <!-- Menggunakan container kecil untuk mengurangi lebar -->
      <!-- Header -->
      <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Frequently Asked Questions</h2>
        <p class="text-muted">
          Find answers to common questions about our certificate verification platform.
        </p>
      </div>
  
      <!-- Cards -->
      <div class="row row-cols-1 row-cols-md-2 g-3"> <!-- Grid rapat -->
        <!-- Card 1 -->
        <div class="col">
          <div class="card text-dark h-100 shadow" style="background-color: #FFEE32;">
            <div class="card-body">
              <h5 class="card-title">How do I verify my certificate?</h5>
              <p class="card-text">
                Simply enter the Unique Identifier (UID) found on your certificate in the
                verification field on our homepage, then click 'Verify Now' to instantly check its authenticity.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col">
          <div class="card text-dark h-100 shadow" style="background-color: #FFEE32;">
            <div class="card-body">
              <h5 class="card-title">Where can I find the UID on my certificate?</h5>
              <p class="card-text">
                The UID is usually located at the bottom-right corner of your certificate.
                It’s a unique alphanumeric code that ensures the authenticity of your document.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col">
          <div class="card text-dark h-100 shadow" style="background-color: #FFEE32;">
            <div class="card-body">
              <h5 class="card-title">What if my certificate is not found?</h5>
              <p class="card-text">
                If your certificate cannot be verified, double-check the UID you entered.
                If the issue persists, please contact the issuing organization for further assistance.
              </p>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="col">
          <div class="card text-dark h-100 shadow" style="background-color: #FFEE32;">
            <div class="card-body">
              <h5 class="card-title">Is my data secure when using this platform?</h5>
              <p class="card-text">
                Yes, we prioritize your privacy. Our platform uses advanced encryption to protect all data,
                ensuring that your information remains safe and confidential.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</div>
@endsection
 