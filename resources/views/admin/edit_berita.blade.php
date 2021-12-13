<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>NihonGO News - Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">



    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <br>
    <div class="container">
        <center>
            <h1>Edit Berita</h1>
        </center>
        <br>
        <form action="/admin/berita/simpan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul_berita" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="judul_berita" placeholder="Masukkan Judul Berita" name="judul_berita" value="{{ $berita[0]->judul_berita }}" required>
            </div>
            <div class="mb-3">
                <label for="judul_berita" class="form-label">Tanggal Berita</label>
                <input type="date" class="form-control" id="tanggal_berita" name="tanggal_berita" value="{{ $berita[0]->tanggal_berita}}" required>
            </div>
            <div class="mb-3">
                <label for="penulis_berita" class="form-label">Penulis Berita</label>
                <input type="text" class="form-control" id="penulis_berita" placeholder="Masukkan Nama Penulis Berita" name="penulis_berita" value="{{ $berita[0]->penulis_berita}}" required>
            </div>
            <div class="mb-3">
                <label for="banner_berita" class="form-label">Banner Berita</label>
                <input type="file" class="form-control" id="banner_berita" name="banner_berita" value="{{ $berita[0] -> banner_berita }}">
            </div>
            <div class="mb-3">
                <label for="isi_berita" class="form-label">Isi Berita</label>
                <textarea class="form-control" id="isi_berita" rows="15" name="isi_berita" required>{{ $berita[0]->isi_berita}}</textarea>
            </div>
            <div class="mb-3">
                <label for="kategori_berita">Kategori Berita</label>
                <select class="form-control" id="kategori_berita" name="kategori_berita" required>
                    @foreach($kategori as $k)
                    @if($k->id_kategori == $berita[0]->kategori_berita)
                    <option value="{{ $k->id_kategori }}" selected>
                        {{ $k-> nama_kategori}}
                    </option>
                    @else
                    <option value="{{ $k->id_kategori }}">
                        {{ $k-> nama_kategori}}
                    </option>
                    @endif
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="id" value="{{$berita[0] -> id_berita}}">
            <input type="hidden" name="aksi" value="ubah">
            <input type="submit" value="Ubah Berita">
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</body>

</html>