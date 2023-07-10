<?php
require 'functions.php';
if (isset($_POST["tambah"])) {

  if (tambah($_POST) > 0) {
    echo "<script>alert('Data Berhasil Ditambahkan!'); document.location.href = 'index.php';</script>";
  } else {
    echo "<script>alert('Gagal Ditambahkan!')</script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk B-Log | VSGA Project</title>

  <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
<!-- Start Pages -->
  <div class="account-pages my-5 pt-sm-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card overflow-hidden">
            <div class="bg-soft" style="background-color: rgba(13,202,240);">
              <div class="row">
                <div class="col-7">
                  <div class="text-primary p-4">
                    <h5 class="text-black">Selamat Datang !</h5>
                    <p class="text-black">Silahkan Masuk ^_^</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="auth-logo">
                <a href="index.php" class="auth-logo-light">
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-white">
                      <img src="assets/images/newspaper.svg" alt="" height="36">
                    </span>
                  </div>
                </a>

                <a href="index.php" class="auth-logo-dark">
                  <div class="avatar-md profile-user-wid mb-4">
                    <span class="avatar-title rounded-circle bg-white">
                      <img src="assets/images/newspaper.svg" alt="" height="36">
                    </span>
                  </div>
                </a>
              </div>
              <div class="p-2">
                <form action="functions.php" class="form-horizontal">

                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukkan email">
                  </div>

                  <div class="mb-3">
                    <label for="nohp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="nohp" placeholder="Masukkan nohp">
                  </div>

                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan username">
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group auth-pass-inputgroup">
                      <input type="password" class="form-control" placeholder="Masukkan password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                  </div>

                  <div class="mt-4 d-grid">
                    <button class="btn btn-info waves-effect waves-light" type="submit">Masuk</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
          <div class="mt-5 text-center">

            <div>
            <p>Sudah Punya Akun ? <a href="login.php" class="fw-medium text-primary">
                  Masuk</a> </p>
              <p>©
                <script>
                  document.write(new Date().getFullYear())
                </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- end account-pages -->

</body>
</html>