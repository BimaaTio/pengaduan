<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $title !!}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css"
        integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" alt="logo" type="image/x-icon">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- Navbars -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6777ef;">
        <div class="container">
            <div class="d-flex flex-grow-1">
                <span class="w-100 d-lg-none d-block">
                    <!-- hidden spacer to center brand on mobile -->
                </span>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Bootstrap" width="58" height="54" class="me-2">
                    SIADU </a>
                <div class="w-100 text-right">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar7">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
                <ul class="navbar-nav ms-auto flex-nowrap">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/daftar-laporan" class="nav-link">Daftar Laporan</a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <form action="/logout" method="post">
                                @csrf
                                <li>
                                    <button class="dropdown-item">Logout</button>
                                </li>
                            </form>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->
    @yield('heroes')
    <div class="container">
        @yield('konten')
    </div>
    
    <!-- Footer -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="https://instagram.com/bimatio_" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <span class="mb-3 mb-md-0 text-muted">Copyright 2023 &copy; Bimatio_</span>
                </a>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://instagram.com/bimatio_"><i class="bi bi-instagram"
                            width="24" height="24"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://wa.me/6288802791267"><i class="bi bi-whatsapp"
                            width="24" height="24"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-linkedin" width="24"
                            height="24"></i></a></li>
            </ul>
        </footer>
    </div>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>