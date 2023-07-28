<?php
require 'functions/functions.php';
$last = query("SELECT * FROM blog ORDER BY id DESC LIMIT 1");
$item = query("SELECT * FROM blog ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>B-Log | VSGA Project</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="bi bi-newspaper" style="font-size: larger;"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Utama</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kategori.php">Kategori</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <?php if (isset($_SESSION['login'])) : ?>
              <button type="submit" class="btn btn-danger" name="keluar" id="keluar"><i class="bi bi-box-arrow-left"></i> Keluar</button>
            <?php else : ?>
              <a href="login.php" class="btn btn-outline-light text-black"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
            <?php endif ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Content -->
  <div class="container mt-4">
    <h1>Halaman Blog</h1>

    <div class="card mt-4 mb-4">
      <img src="upload/<?= $last[0]['gambar'] ?>" class="card-img-top" style="height: 500px;" alt="Headline" />
      <div class="card-body text-center">
        <h5 class="card-title"><?= $last[0]['judul'] ?></h5>
        <p class="card-text">
          <?= $last[0]['sub_judul'] ?></h5>
        </p>
        <p class="card-text">
          <small class="text-body-secondary"></small>
        </p>
        <a href="#" class="btn btn-primary">Baca Selengkapnya..</a>
      </div>
    </div>

    <?php for ($i = 1; $i < count($item); $i++) : ?>
      <div class="row mb-4 pb-4">
        <div class="col">
          <h2><a href="http://" class="text-decoration-none"><?= ucfirst($item[$i]['judul']) ?></a></h2>
          <img src="upload/<?= $item[$i]['gambar'] ?>" alt="gambar" style="width: 10%;">

          <p style="font-weight: bold;">
            <?= $item[$i]['tipe'] ?> | <?= ucfirst($item[$i]['sub_judul']) ?></a>
          </p>

          <p>
            <?= htmlspecialchars_decode($item[$i]['deskripsi']) ?>
          </p>

          <a href="http://">Lebih banyak...</a>
        </div>
      </div>
      <p class="border-bottom"></p>
    <?php endfor ?>
  </div>
  <!-- Content -->

  <!-- Footer -->
  <div class="mt-4">
    <footer class="text-black text-center text-lg-start">
      <div class="p-4" style="background-color: rgba(13,202,240);">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-2 mb-md-0">
            <h5 class="text-uppercase">B-Log</h5>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident consectetur illo quo non nulla impedit architecto porro voluptate voluptas accusamus?
            </p>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Alamat Kami</h5>
            <ul class="list-unstyled mb-0">
              <li>
                Jl. lohbener lama No.08, Legok, Kec. Lohbener, Kabupaten Indramayu, Jawa Barat 45252
              </li>
              <br>
              <li>
                Call Center: (0234) 5746464
              </li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <div class="card" style="width: 15rem;">
              <div class="card-body">
                <h4 class="card-title">Informasi</h4>
                <p>
                  Informasi yang kami berikan dapat memberikan wawasan dan pengetahuan terbaru mengenai apa yang terjadi di dunia sekitar kita.
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="text-center p-3" style="background-color: #4FC0D0;">
        © 2023 Copyright:
        <a class="text-white" href="index.php">B-Log</a>
      </div>
    </footer>
  </div>
  <!-- Footer -->

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.7.0.js"></script>
  <script>
    $("#keluar").on("click", function() {
      var kelar = confirm('Yakin ingin keluar ?');
      if (kelar) {
        document.location.href = 'functions/logout.php';
      }
    });
  </script>
</body>

</html>