
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Certificate Generator')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> 
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFEE32; padding: 1.5rem 0;">
        <div class="container">
            <a class="navbar-brand" href="/">CertGen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#verify">How It Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
                </ul>
                <div class="d-flex gap-2">
                    <a class="btn" style="background-color: #FFD100" href="{{ route('register') }}" role="button">Sign Up</a>
                    <a class="btn" style="background-color: #FFD100" href="{{ route('login') }}" role="button">Login</a>
                </div>
            </div>
        </div>
    </nav>    

    <!-- Dynamic Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 text-dark" style="background-color: #FFD100;">
        <div class="container">
            <p class="mb-2">
                Copyright &copy; Certificate Generator | All Rights Reserved
            </p>
            <p class="mb-0">
                <a href="/terms" class="text-dark text-decoration-underline">Terms and Conditions</a> | 
                <a href="/privacy" class="text-dark text-decoration-underline">Privacy Policy</a>
            </p>
        </div>
    </footer>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 