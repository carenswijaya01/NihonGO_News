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
                                    <a class="navbar-brand" href="/">
                                        <img src="{{ asset('assets/images/logo_NNews.svg') }}" alt="" />
                                    </a>
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
                                                <a class="nav-link" href="/anime">Anime</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/manga">Manga</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/cosplay">Cosplay</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/vtuber">VTuber</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/kontak">KONTAK</a>
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
                            <a href="/artikel/{{$random->id_berita}}" style="text-decoration: none; color: black;">
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
                    <div class="col-sm-12">
                        <div class="card" data-aos="fade-up">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-sm grid-margin">
                                                <center>
                                                    <h1 class="font-weight-600 mb-2">
                                                        {{$berita->judul_berita}}
                                                    </h1>
                                                    <p class="fs-13 text-muted mb-0">
                                                        <span class="mr-2">{{$berita->kategori_berita}} </span>
                                                        <span class="mr-2">{{$berita->penulis_berita}} </span>
                                                        <span class="mr-2">{{$berita->tanggal_berita}}</span>
                                                    </p>
                                                    <br>
                                                    <div class="rotate-img">
                                                        <img src="{{ asset('img/'.$berita->banner_berita) }}" alt="banner" class="img-fluid" />
                                                    </div>
                                                </center>
                                                <br>
                                                <p align="justify" class="fs-15">
                                                    {!! nl2br(e($berita->isi_berita)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h2 class="mb-4 text-primary font-weight-600">
                                            Berita Terbaru
                                        </h2>
                                        @foreach($baru as $b)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="border-bottom pb-4 pt-4">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <a href="/artikel/{{$b->id_berita}}" style="text-decoration: none; color: black;">
                                                                <h5 class="font-weight-600 mb-1">
                                                                    {{$b->judul_berita}}
                                                                </h5>
                                                            </a>
                                                            <p class="fs-13 text-muted mb-0">
                                                                <span class="mr-2">{{$b->kategori_berita}}</span>{{$b->tanggal_berita}}
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="rotate-img">
                                                                <img src="{{ asset('img/'.$b->banner_berita) }}" alt="banner" class="img-fluid" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="trending">
                                            <h2 class="mb-4 text-primary font-weight-600">
                                                Berita Hot
                                            </h2>
                                            @foreach($trending as $t)
                                            <div class="mb-4">
                                                <div class="rotate-img">
                                                    <img src="{{ asset('img/'.$t->banner_berita) }}" alt="banner" class="img-fluid" />
                                                </div>
                                                <a href="/artikel/{{$t->id_berita}}" style="text-decoration: none; color: black;">
                                                    <h3 class="mt-3 font-weight-600">
                                                        {{$t->judul_berita}}
                                                    </h3>
                                                </a>
                                                <p class="fs-13 text-muted mb-0">
                                                    <span class="mr-2">{{$t->kategori_berita}}</span>{{$t->tanggal_berita}}
                                                </p>
                                            </div>
                                            @endforeach
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