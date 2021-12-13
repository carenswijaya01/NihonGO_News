<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>NihonGO News - Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

<body class="text-center">
    <br><br><br>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="form-group mb-3">

                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        Akun Tidak Ditemukan
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Kata Sandi" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        Password Salah
                                    </div>
                                    @enderror
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                            </form>
                            <br>
                            <!-- <small>Belum Registrasi? <a href="/registration">Daftar Sekarang!</a></small> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>