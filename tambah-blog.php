<?php
/* Cek session dulu */
// if (!isset($_SESSION["login"])) {
//   echo "<script>alert('Harap Masuk Terlebih Dahulu!'); document.location.href = 'login.php';</script>";
//   exit;
//   // header("location: index.php");
// }else {
//   echo "<script>alert('Hhaiwhdoiwd!!!!!'); document.location.href = 'login.php';</script>";
// }
/* akhir cek */

require 'functions.php';
if (isset($_POST["tambah"])) {

  if (tambah($_POST) > 0) {
    echo "<script>alert('Data Berhasil Ditambahkan!'); document.location.href = 'index.php';</script>";
  } else {
    echo "<script>alert('Gagal Ditambahkan!')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah B-Log | VSGA Project</title>

  <link rel="stylesheet" href="assets/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="bi bi-newspaper" style="font-size: larger;"></i></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex" role="search">
          <a href="login.php" class="btn btn-danger" onclick="logout()"><i class="bi bi-box-arrow-left"></i> Keluar</a>
        </form>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1>Halaman Tambah Blog</h1>
    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
      <div class="col-md-6">
        <label for="judul" class="form-label">Judul Blog</label>
        <input type="text" class="form-control" placeholder="Masukkan judul" id="judul" name="judul" required />
      </div>
      <div class="col-md-6">
        <label for="subJudul" class="form-label">Sub-judul</label>
        <input type="text" class="form-control" placeholder="Masukkan sub-judul" id="subJudul" name="subJudul" required />
      </div>
      <div class="col-12">
        <label for="tipe" class="form-label">Tipe Blog</label>
        <select id="tipe" name="tipe" class="form-select" required>
          <option value="" selected disabled>-- Pilih --</option>
          <option value="Kesehatan">Kesehatan</option>
          <option value="Lingkungan">Lingkungan</option>
          <option value="Bisnis">Bisnis</option>
          <option value="Teknologi">Teknologi</option>
        </select>
      </div>
      <div class="col-12">
        <label for="desk" class="form-label">Deskripsi Blog</label>
        <textarea class="form-control" placeholder="Tuliskan deskripsi..." id="desk" name="desk" required></textarea>
      </div>
      <div class="col-md-12">
        <label for="gambar" class="form-label">Gambar Blog</label>
        <input class="form-control" type="file" id="gambar" name="gambar">
      </div>
      <div class="col-12 mb-4">
        <button type="submit" class="btn btn-success" name="tambah">Tambah Blog</button>
      </div>
    </form>
  </div>

  <div class="mt-5">
    <footer class="text-black text-center text-lg-start">
      <div class="text-center p-3" style="background-color: #4FC0D0;">
        © 2023 Copyright:
        <a class="text-white" href="index.php">B-Log</a>
      </div>
    </footer>
  </div>

  <script src="assets/bootstrap.bundle.min.js"></script>
  <script>
    function logout(){
      alert('Anda Telah Keluar !');
      document.location.href='login.php';
    }
  </script>
</body>

</html>