<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Blog MSIB</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Font Awesome for additional icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Menggunakan Google Fonts */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f8fc;
        }

        /* Sidebar Styles */
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #02060b; /* Warna biru baru */
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar-wrapper.toggled {
            margin-left: -250px;
        }

        #sidebar-wrapper .sidebar-heading {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 1.5rem;
            text-align: center;
            background-color: #223bbb; /* Biru lebih gelap */
        }

        #sidebar-wrapper .list-group-item {
            background-color: #c0cede; /* Warna biru baru */
            color: #fff;
            border: none;
            transition: background-color 0.3s ease;
        }

        #sidebar-wrapper .list-group-item:hover {
            background-color: #6ca4e2; /* Warna biru saat hover */
            color: #fff;
        }

        /* Page Content */
        #page-content-wrapper {
            width: 100%;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar .navbar-brand {
            font-weight: bold;
            color: #0d6efd;
        }

        .navbar .nav-link {
            color: #0d6efd !important;
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: #0b5ed7 !important;
        }

        /* Toggle Button */
        #menu-toggle {
            background-color: #2e3f57;
            border: none;
            color: #fff;
        }

        #menu-toggle:hover {
            background-color: #0b5ed7;
        }

        /* User Dropdown */
        .dropdown-menu {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
        }

        .dropdown-item i {
            margin-right: 0.5rem;
            color: #0d6efd;
        }

        /* Alerts */
        .alert {
            border-radius: 0.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -250px;
            }
            #sidebar-wrapper.toggled {
                margin-left: 0;
            }
        }
        
        footer {
            background-color: #303131; /* Warna latar belakang bukan biru */
            color: #e0d5d5; /* Warna teks */
            padding: 9px;
        }

        footer a {
            color: #d1d8e2; /* Warna tautan */
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #e6d8d8; /* Warna tautan saat hover */
        }

    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <nav class="bg-primary" id="sidebar-wrapper">
            <div class="sidebar-heading" id="menu-heading">Menu</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action bg-primary">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action bg-primary">
                    <i class="bi bi-tags me-2"></i> Categories
                </a>
                <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action bg-primary">
                    <i class="bi bi-file-text me-2"></i> Posts
                </a>
                <a href="{{ route('authors.index') }}" class="list-group-item list-group-item-action bg-primary">
                    <i class="bi bi-people me-2"></i> Authors
                </a>
            </div>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <!-- Toggle Button -->
                    <button class="btn" id="menu-toggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <!-- Navbar Brand -->
                    <a class="navbar-brand ms-3" href="#">Blog MSIB</a>
                    <!-- User Dropdown -->
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://via.placeholder.com/30" alt="User" class="rounded-circle me-2">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="bi bi-person me-2"></i> Profile Detail
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- /Navbar -->

            <!-- Main Content -->
            <div class="container-fluid mt-4 flex-grow-1">
                @yield('content')

                <!-- Alerts -->
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if (session('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <!-- /Main Content -->

            <!-- Footer -->
            <footer class="mt-auto">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <p>&copy; {{ date('Y') }} Blog Magang Studi Independen Bersertifikat - Nicko Ilham Akbar</p>
                        </div>
                        <div class="col-md-6 social-icons text-md-end">
                            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Toggle Sidebar
        document.getElementById("menu-toggle").addEventListener("click", function(e) {
            e.preventDefault();
            document.getElementById("sidebar-wrapper").classList.toggle("toggled");
        });

        // Close sidebar when clicking outside on small screens
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar-wrapper');
            const toggleButton = document.getElementById('menu-toggle');
            if (!sidebar.contains(event.target) && !toggleButton.contains(event.target) && sidebar.classList.contains('toggled')) {
                sidebar.classList.remove('toggled');
            }
        });
    </script>
</body>
</html>
