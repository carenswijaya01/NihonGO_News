<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>NihonGO News</title>

    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/dist/aos.css/aos/css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="container-scroller">
        <div class="main-panel">
            <!-- Setting untuk navbar -->
            <header id="header">
                <div class="container">
                    <!-- Untuk Bikin Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-light pt-3">
                        <!-- navbar bawah -->
                        <div class="navbar-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a class="navbar-brand" href="/"><img src="assets/images/logo_NNews.svg" alt="" /></a>
                                </div>
                                <div>
                                    <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                            <li>
                                                <button class="navbar-close">
                                                    <i class="mdi mdi-close"></i>
                                                </button>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/">BERANDA</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="anime">Anime</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="manga">Manga</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="cosplay">Cosplay</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="vtuber">VTuber</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="kontak">KONTAK</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="social-media">
                                    <li>
                                        <a href="https://www.instagram.com/carens_wijaya/">
                                            <i class="mdi mdi-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/channel/UC_4_0TZHHTJOlcsD-D7sf2g">
                                            <i class="mdi mdi-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/carens_wijaya">
                                            <i class="mdi mdi-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Untuk bikin Flash News di bawah navbar -->
            <div class="flash-news-banner">
                <div class="container">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <span class="badge badge-dark mr-3">Flash news</span>
                            <a href="artikel/{{$random->id_berita}}" style="text-decoration: none; color: black;">
                                <p class="mb-0">
                                    {{$random->judul_berita}}
                                </p>
                            </a>
                        </div>
                        <div class="d-flex">
                            <span class="mr-3 text-danger"><?= date("l, d M Y"); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Untuk bikin main content nya (banner, berita, kategori) -->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card" data-aos="fade-up">
                                <div class="card-body">
                                    <div class="aboutus-wrapper">
                                        <h1 class="mt-5 text-center mb-5">
                                            Kontak Kami
                                        </h1>
                                        <div class="row">
                                            <div class="col-lg-12 mb-5 mb-sm-2">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control textarea" placeholder="Masukkan Komentar Anda" id="message"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Masukkan Nama Anda" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Masukkan Email Anda" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <a href="#" class="btn btn-lg btn-dark font-weight-bold mt-3">Kirim Pesan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="./assets/js/demo.js"></script>
</body>

</html>