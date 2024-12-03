<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Toggle</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
          html, body {
      overflow-x: hidden;
      }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #FFEE32;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <div class="d-flex align-items-center">
            <span class="me-3">Hi, Admin</span>
            <i class="bi bi-person-circle" style="font-size: 1.5rem; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#logoutModal"></i>
        </div>
    </div>
</nav>

<!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>




 <!-- Sidebar -->
<div id="sidebar" class="position-fixed d-flex flex-column" style="background-color:#FFFABF; width: 240px; height: calc(100vh - 56px); top: 56px; transition: width 0.3s;">
    <!-- Header -->
    <div id="sidebar-header" class="d-flex align-items-center py-3 px-3">
        <span id="dashboardText">Dashboard</span>
    </div>

    <!-- Menu Items -->
    <a href="{{ route('superadmin.certificate.generate') }}" class="d-flex align-items-center py-3 px-3 text-dark text-decoration-none">
        <i class="bi bi-files-alt me-2"></i> <span class="menu-text">Generated</span>
    </a>
    <a href="{{ route('data') }}" class="d-flex align-items-center py-3 px-3 text-dark text-decoration-none">
        <i class="bi bi-table me-2"></i> <span class="menu-text">Data</span>
    </a>
    <a href="#" class="d-flex align-items-center py-3 px-3 text-dark text-decoration-none">
        <i class="bi bi-clock-history me-2"></i> <span class="menu-text">History</span>
    </a>
    <a href="{{ route('certificate.template') }}" class="d-flex align-items-center py-3 px-3 text-dark text-decoration-none">
        <i class="bi bi-file-earmark me-2"></i> <span class="menu-text">Template</span>
    </a>
    <a href="#" class="d-flex align-items-center py-3 px-3 text-dark text-decoration-none">
        <i class="bi bi-gear me-2"></i> <span class="menu-text">Setting</span>
    </a>
    <a href="#" class="d-flex align-items-center py-3 px-3 text-dark text-decoration-none">
        <i class="bi bi-question-circle me-2"></i> <span class="menu-text">Help</span>
    </a>

    <!-- Toggle Button -->
    <button id="toggleSidebar" class="btn position-absolute top-50 start-100 translate-middle-y p-0" style="background-color:#FF5622; width: 40px; height: 40px; border-radius: 50%;">
        <i class="bi bi-chevron-double-left"></i>
    </button>
</div>

<!-- Content -->
<div id="content" style="margin-left: 240px; padding: 20px; transition: margin-left 0.3s;">
    @yield('content')
</div>


<!-- Sidebar Toggle Script -->
<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content'); // Kontainer content
        const icon = this.querySelector('i');
        const menuTexts = sidebar.querySelectorAll('.menu-text');
        const dashboardText = document.getElementById('dashboardText');

        // Toggle collapsed state
        if (sidebar.style.width === '60px') {
            sidebar.style.width = '240px';
            content.style.marginLeft = '240px'; // Adjust content margin
            menuTexts.forEach(el => el.style.display = 'inline');
            if (dashboardText) dashboardText.style.display = 'inline';
            icon.className = 'bi bi-chevron-double-left';
        } else {
            sidebar.style.width = '60px';
            content.style.marginLeft = '60px'; // Adjust content margin
            menuTexts.forEach(el => el.style.display = 'none');
            if (dashboardText) dashboardText.style.display = 'none';
            icon.className = 'bi bi-chevron-double-right';
        }
    });
</script>


</body>
</html>
