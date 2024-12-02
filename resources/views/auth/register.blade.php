@extends('layouts.app')
@section('content')

<div class="container d-flex flex-column flex-md-row align-items-center min-vh-100">
    <!-- Form Section -->
    <div class="col-12 col-md-6 p-4">
        <h2 class="text-center mb-4 fw-bold">Sign Up</h2>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf

            <!-- Username Field -->
            <div class="mb-3">
                <label for="name" class="form-label">User Name</label>
                <input type="text" name="name" class="form-control bg-light text-dark border-1" id="name" placeholder="Enter your name" required>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control bg-light text-dark border-1" id="email" placeholder="Enter your email" required>
            </div>

            {{-- <!-- Role Field -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select bg-light text-dark border-1" required>
                    <option value="" disabled selected>-- Select Role --</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="super-admin">Super Admin</option>
                </select>
            </div> --}}

            <!-- Password Field -->
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control bg-light text-dark border-1" id="password" placeholder="Enter your password" required>
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-3 position-relative">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control bg-light text-dark border-1" id="password_confirmation" placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>

            <!-- Redirect to Login -->
            <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="text-primary fw-bold">Log in now</a></p>
        </form>

        <!-- Social Login Buttons -->
        <div class="text-center text-muted mb-3">OR</div>
        <button class="btn btn-outline-light border w-100 mb-2" onclick="location.href='{{ url('auth/google') }}'">
            <i class="fab fa-google me-2 text-danger"></i> Continue with Google
        </button>
        <button class="btn btn-outline-light border w-100 mb-2" onclick="location.href='{{ url('auth/facebook') }}'">
            <i class="fab fa-facebook-f me-2 text-primary"></i> Continue with Facebook
        </button>
        <button class="btn btn-outline-light border w-100" onclick="location.href='{{ url('auth/apple') }}'">
            <i class="fab fa-apple me-2 text-dark"></i> Continue with Apple
        </button>
    </div>

    <!-- Image Section -->
    <div class="col-12 col-md-6 p-0">
        <img src="{{ asset('assets/LOGIN.jpg') }}" alt="Certificate Wall" class="img-fluid custom-img w-100 h-100">
    </div>
</div>

@endsection
