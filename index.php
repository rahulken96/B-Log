<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>B-Log | VSGA Project</title>

  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
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
        <form class="d-flex" role="search">
          <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
          <a href="tambah-blog.php" class="btn btn-outline-light text-black">Tambah Blog</a>
        </form>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h1>Halaman Blog</h1>

    <div class="card mt-4 mb-4">
      <img src="https://images.unsplash.com/photo-1461988320302-91bde64fc8e4?ixid=2yJhcHBfaWQiOjEyMDd9&fm=jpg&fit=crop&w=1080&q=80&fit=max" class="card-img-top mx-auto d-block" height="400px" alt="Headline" />
      <div class="card-body text-center">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">
          This is a wider card with supporting text below as a natural lead-in
          to additional content. This content is a little bit longer.
        </p>
        <p class="card-text">
          <small class="text-body-secondary">Last updated 3 mins ago</small>
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>

    <div class="row mb-4 pb-4">
      <div class="col">
        <h2><a href="http://" class="text-decoration-none">Blog</a></h2>

        <p>
          Ditulis oleh <a href="http://" class="text-decoration-none">Saya</a>
        </p>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam veniam
          vero, natus laborum atque quod dolores eum excepturi nulla eos?
        </p>

        <a href="http://">Lebih banyak...</a>
      </div>
      <div class="col">
        <h2><a href="http://" class="text-decoration-none">Blog</a></h2>

        <p>
          Ditulis oleh <a href="http://" class="text-decoration-none">Saya</a>
        </p>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam veniam
          vero, natus laborum atque quod dolores eum excepturi nulla eos?
        </p>

        <a href="http://">Lebih banyak...</a>
      </div>
    </div>

    <br />

    <p class="border-bottom"></p>
    <div class="row mb-4 pb-4">
      <div class="col">
        <h2><a href="http://" class="text-decoration-none">Blog</a></h2>

        <p>
          Ditulis oleh <a href="http://" class="text-decoration-none">Saya</a>
        </p>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam veniam
          vero, natus laborum atque quod dolores eum excepturi nulla eos?
        </p>

        <a href="http://">Lebih banyak...</a>
      </div>
      <div class="col">
        <h2><a href="http://" class="text-decoration-none">Blog</a></h2>

        <p>
          Ditulis oleh <a href="http://" class="text-decoration-none">Saya</a>
        </p>

        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam veniam
          vero, natus laborum atque quod dolores eum excepturi nulla eos?
        </p>

        <a href="http://">Lebih banyak...</a>
      </div>
    </div>
  </div>

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

  <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>