<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog MSIB')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #f0f4f7;
        }

        /* Navbar */
        .navbar {
            background-color: #343a40;
            padding: 1rem 2rem;
        }

        .navbar-brand {
            color: #f8f9fa;
            font-weight: bold;
            font-size: 1.6rem;
        }

        .navbar-brand:hover {
            color: #ffffff;
        }

        .nav-link {
            color: #f8f9fa !important;
        }

        .nav-link:hover {
            color: #007bff !important;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #5cfa74, #007bff);
            color: white;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.25rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Card Styling */
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 1rem;
            background-color: white;
            padding: 1rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 1rem 1rem 0 0;
        }

        .card-title a {
            text-decoration: none;
            color: #343a40;
            font-weight: bold;
        }

        .card-title a:hover {
            color: #007bff;
        }

        /* Button Styling */
        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            text-align: center;
        }

        footer a {
            color: #f8f9fa;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #007bff;
        }

        footer p {
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <i class="fas fa-blog"></i> Blog MSIB
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('frontend.home') }}">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link" style="display: inline; cursor: pointer;">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="hero">
        <div>
            <h1>Explore Our Latest Articles</h1>
            <p>Stay updated with the latest trends and insights in technology.</p>
        </div>
    </div>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @yield('content')
    </div>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Blog Magang Studi Independen Bersertifikat - Nicko Ilham Akbar</p>
            <div>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
