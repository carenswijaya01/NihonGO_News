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
                    <!-- Banner & Highlight News -->
                    <div class="row" data-aos="fade-up">
                        <div class="col-xl-8 stretch-card grid-margin">
                            <div class="position-relative">
                                <img src="img/{{$global->banner_berita}}" alt="banner" class="img-fluid" style="filter: brightness(50%);" />
                                <div class="banner-content">
                                    <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                        Berita Hot
                                    </div>
                                    <a href="artikel/{{$global->id_berita}}" style="text-decoration: none; color: white;">
                                        <h1 class="mb-0">{{ $global->judul_berita }}</h1>
                                    </a>
                                    <h4 class="mb-2">
                                        {{ substr(substr($global->isi_berita, 0, 100), 0, strrpos(substr($global->isi_berita, 0, 100), ' ')) }} ...
                                    </h4>
                                    <div class="fs-12">
                                        <span class="mr-2">{{$global->kategori_berita}}</span>{{$global->tanggal_berita}}
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 grid-margin">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <h2>Berita Terbaru</h2>
                                    @if(count($berita) < 3) @foreach($berita as $b) <div class="d-flex pt-4 align-items-center justify-content-between">
                                        <div class="pr-3">
                                            <a href="artikel/{{$b->id_berita}}" style="text-decoration: none; color: white;">
                                                <h5>{{$b->judul_berita}}</h5>
                                            </a>
                                            <div class="fs-12">
                                                <span class="mr-2">{{$b->kategori_berita}}</span>{{$b->tanggal_berita}}
                                            </div>
                                        </div>
                                        <div class="rotate-img">
                                            <img src="img/{{$b->banner_berita}}" alt="thumb" class="img-fluid img-lg" />
                                        </div>
                                </div>
                                @endforeach
                                @else
                                @for($i = 0; $i < 3; $i++) <div class="d-flex pt-4 align-items-center justify-content-between">
                                    <div class="pr-3">
                                        <a href="artikel/{{$berita[$i]->id_berita}}" style="text-decoration: none; color: white;">
                                            <h5>{{$berita[$i]->judul_berita}}</h5>
                                        </a>
                                        <div class="fs-12">
                                            <span class="mr-2">{{$berita[$i]->kategori_berita}}</span>{{$berita[$i]->tanggal_berita}}
                                        </div>
                                    </div>
                                    <div class="rotate-img">
                                        <img src="img/{{$berita[$i]->banner_berita}}" alt="thumb" class="img-fluid img-lg" />
                                    </div>
                            </div>
                            @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori & Berita -->
            <div class="row" data-aos="fade-up">
                <!-- Kategori -->
                <div class="col-lg-3 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h2>Kategori</h2>
                            <ul class="vertical-menu">
                                @foreach($kategori as $k)
                                <li><a href="/{{strtolower($k->nama_kategori)}}">{{$k->nama_kategori}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Berita -->
                <div class="col-lg-9 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            @foreach($berita as $b)
                            <div class="row">
                                <div class="col-sm-4 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img src="img/{{$b->banner_berita}}" alt="thumb" class="img-fluid" />
                                        </div>
                                        <div class="badge-positioned">
                                            <span class="badge badge-danger font-weight-bold">Flash news</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8  grid-margin">
                                    <a href="artikel/{{$b->id_berita}}" style="text-decoration: none; color: black;">
                                        <h2 class="mb-2 font-weight-600">
                                            {{$b->judul_berita}}
                                        </h2>
                                    </a>
                                    <div class="fs-13 mb-2">
                                        <span class="mr-2">{{$b->kategori_berita}}</span>{{$b->tanggal_berita}}
                                    </div>
                                    <p class="mb-0">
                                        {{ substr(substr($b->isi_berita, 0, 100), 0, strrpos(substr($b->isi_berita, 0, 100), ' ')) }} ...
                                    </p>
                                </div>
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
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/aos/dist/aos.js/aos.js"></script>
    <script src="assets/js/demo.js"></script>
</body>

</html>