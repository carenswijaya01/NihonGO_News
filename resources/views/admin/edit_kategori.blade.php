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
            <h1>Edit Kategori</h1>
        </center>
        <br>
        <form action="/admin/kategori/simpan" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" placeholder="Masukkan Judul Berita" name="nama_kategori" value="{{$kategori[0]->nama_kategori}}" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" rows="3" name="keterangan" required>{{$kategori[0]->keterangan}}</textarea>
            </div>
            <input type="hidden" name="id" value="{{$kategori[0] -> id_kategori}}">
            <input type="hidden" name="aksi" value="ubah">
            <input type="submit" value="Edit Kategori">
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</body>

</html>