<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Information System</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #f8f9fc;
            --sidebar-width: 14rem;
            --sidebar-collapsed-width: 4.5rem;
            --transition-speed: 0.3s;
        }
        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary-color) 0%, #224abe 100%);
            color: white;
            position: fixed;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: width var(--transition-speed) ease;
            z-index: 1000;
        }
        .sidebar-collapsed {
            width: var(--sidebar-collapsed-width);
        }
        .sidebar-collapsed .sidebar-brand span,
        .sidebar-collapsed .nav-link span {
            display: none;
        }
        .sidebar-collapsed .sidebar-brand {
            justify-content: center;
        }
        .sidebar-collapsed .nav-link {
            text-align: center;
            padding: 0.75rem 0;
        }
        .sidebar-collapsed .nav-link i {
            margin-right: 0;
            font-size: 1.25rem;
        }
        .sidebar-brand {
            height: 4.375rem;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 800;
            padding: 1.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            letter-spacing: 0.05rem;
            z-index: 1;
            transition: all var(--transition-speed) ease;
        }
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
            margin: 0 1rem 1rem;
            transition: all var(--transition-speed) ease;
        }
        .sidebar-collapsed .sidebar-divider {
            margin: 0 0.5rem 1rem;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1rem;
            margin: 0 0.5rem;
            border-radius: 0.35rem;
            white-space: nowrap;
            transition: all var(--transition-speed) ease;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            font-weight: 700;
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
            transition: all var(--transition-speed) ease;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            transition: all var(--transition-speed) ease;
        }
        .main-content-expanded {
            margin-left: var(--sidebar-collapsed-width);
            width: calc(100% - var(--sidebar-collapsed-width));
        }
        .topbar {
            height: 4.375rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            background: white;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .card {
            border: none;
            border-radius: 0.35rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            padding: 1rem 1.35rem;
        }
        .badge-primary {
            background-color: var(--primary-color);
        }
        .sidebar-toggle-btn {
            border: none;
            background: none;
            color: #6e707e;
            cursor: pointer;
            padding: 0.5rem;
        }
        .sidebar-toggle-btn:hover {
            color: var(--primary-color);
        }
        .sidebar-toggle-btn i {
            font-size: 1.25rem;
        }
        .nav-link .tooltip-text {
            visibility: hidden;
            width: auto;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            left: 100%;
            opacity: 0;
            transition: opacity 0.3s;
            white-space: nowrap;
            margin-left: 15px;
        }
        .sidebar-collapsed .nav-link:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <i class="bi bi-heart-pulse me-2"></i>
        <span>HealthSys</span>
    </div>
    <hr class="sidebar-divider">

    <div class="sidebar-nav">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                    <span class="tooltip-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('clients*') ? 'active' : '' }}" href="{{ route('clients.index') }}">
                    <i class="bi bi-people-fill"></i>
                    <span>Clients</span>
                    <span class="tooltip-text">Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('programs*') ? 'active' : '' }}" href="{{ route('programs.index') }}">
                    <i class="bi bi-clipboard2-pulse"></i>
                    <span>Programs</span>
                    <span class="tooltip-text">Programs</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Topbar -->
    <nav class="topbar navbar navbar-expand navbar-light bg-white mb-4 static-top">
        <div class="container-fluid">
            <button class="sidebar-toggle-btn me-3" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ms-auto">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Dr. {{ Auth::user()->name }}</span>
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow">
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container-fluid px-4">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        
        // Check localStorage for saved state
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            sidebar.classList.add('sidebar-collapsed');
            mainContent.classList.add('main-content-expanded');
        }
        
        // Toggle sidebar
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('sidebar-collapsed');
            mainContent.classList.toggle('main-content-expanded');
            
            // Save state to localStorage
            const isNowCollapsed = sidebar.classList.contains('sidebar-collapsed');
            localStorage.setItem('sidebarCollapsed', isNowCollapsed);
        });
        
        // Auto-collapse on mobile
        function handleResize() {
            if (window.innerWidth < 768) {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-content-expanded');
            } else {
                // Restore previous state for desktop
                const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
                if (!isCollapsed) {
                    sidebar.classList.remove('sidebar-collapsed');
                    mainContent.classList.remove('main-content-expanded');
                }
            }
        }
        
        // Initial check
        handleResize();
        
        // Listen for resize events
        window.addEventListener('resize', handleResize);
    });
</script>
</body>
</html>