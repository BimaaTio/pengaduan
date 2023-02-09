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
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Bootstrap" width="58" height="54"
                        class="me-2">
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
                        <a href="/report" class="nav-link">Daftar Aduan</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    <form action="/logout" method="post">
                        @csrf
                        <li class="nav-item">
                            <button class="nav-link btn btn-primary">Logout</button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->
    <!-- Heroes -->
    <div class="container col-xxl-8 ">
        <div class="row align-items-center g-5 py-5">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-5 fw-bold lh-1 mb-3 ">SIADU</h1>
                <p class="lead  my-4">
                    Suara Anda adalah Perubahan!
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="login.php?info=Silahkan Login dulu untuk melaporkan"
                        class="btn btn-primary btn-lg px-4 me-md-2">Lapor
                        Sekarang</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ asset('assets/img/heroes.svg') }}" alt="" srcset="">
            </div>
        </div>
    </div>
    <!-- /Heroes -->
    <div class="container">
        <hr class="hr-text">
        <hr>
    </div>
    <br>
    <!-- Deskripsi -->
    <section class="container mt-5" data-aos="fade-up-right">
        <h2 class="fw-bold">Apa itu SIADU ?</h2>
        <div class="row" data-aos="fade-right">
            <div class="col-md-7">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id eum sapiente quaerat dolorem eligendi
                    molestias minima reiciendis aliquid earum vel beatae excepturi, nisi nesciunt unde vero facilis
                    expedita?.
                </p>
            </div>
        </div>
    </section>
    <!-- End desk -->
    <section class="container mt-5" data-aos="fade-up">
        <div class="row flex-lg-row-reverse">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4" data-aos="fade-left">Bagaimana Cara Lapor ?</h2>
                <h6 data-aos="fade-left" class="mb-2">Cara Melaporkan Masalah sebagai Berikut :</h6>
                <ul class="list-unstyled">
                    <li>1. Silahkan Buat Akun Terlebih dahulu</li>
                    <li>2. Setelah Buat Akun,silakan login</li>
                    <li>3. Setelah Login anda akan masuk ke halaman dashboard</li>
                    <li>4. Dan silakan anda mengisi form yang tersedia</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="https://instagram.com/bimatio_" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <span class="mb-3 mb-md-0 text-muted">Copyright 2023 &copy; Bimatio_</span>
                </a>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://instagram.com/bimatio_"><i
                            class="bi bi-instagram" width="24" height="24"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="https://wa.me/6288802791267"><i
                            class="bi bi-whatsapp" width="24" height="24"></i></a></li>
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
