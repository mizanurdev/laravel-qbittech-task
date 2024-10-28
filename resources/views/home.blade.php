<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- CUSTOM CSS -->
     <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Task Management</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        @if (Auth::user()->role === 'admin')
                            <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                        @else
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Efficient Task Management for Teams</h1>
        <p>Stay organized, collaborate seamlessly, and manage projects with ease.</p>
        <a href="#" class="btn btn-custom btn-custom-primary">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section class="features-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-clipboard-check"></i>
                </div>
                <h4>Task Tracking</h4>
                <p>Keep track of all your tasks in one place with real-time status updates.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-people"></i>
                </div>
                <h4>Team Collaboration</h4>
                <p>Collaborate with your team effortlessly and improve productivity.</p>
            </div>
            <div class="col-md-4">
                <div class="feature-icon mb-3">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
                <h4>Performance Insights</h4>
                <p>Analyze task performance and stay on top of your project deadlines.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer pt-3">
    <div class="container">
        <p>&copy; 2024 Task Management System powered by <span><a href="https://mizanurdev.com/" target="_blank" >Md. Mizanur Rahman</a></span></p>
    </div>
</footer>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
