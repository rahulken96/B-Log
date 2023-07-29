<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'b_log_project');

function dd($req)
{
  var_dump($req);
  die;
}

function query($query)
{
  global $conn;

  $hasil = mysqli_query($conn, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($hasil)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  global $conn;

  /* Tambah data register */
  if (isset($data['daftar'])) {
    $nama  = htmlspecialchars($data["nama"]);
    $email    = htmlspecialchars($data["email"]);
    $noHP   = htmlspecialchars($data["noHP"]);
    $user   = htmlspecialchars($data["username"]);
    $pw   = htmlspecialchars($data["password"]);

    $query = "INSERT INTO users VALUES ('', '$nama', '$email', '$noHP', '$user', '$pw')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }
  /* Tambah data register */

  $judul  = htmlspecialchars($data["judul"]);
  $sub    = htmlspecialchars($data["subJudul"]);
  $tipe   = htmlspecialchars($data["tipe"]);
  $desk   = htmlspecialchars($data["desk"]);

  /* Proses Upload Gambar */
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  /* Akhir Proses Upload Gambar */

  $query = "INSERT INTO blog VALUES ('', '$judul', '$sub', '$tipe', '$desk', '$gambar')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  /* Tambah data register */
  // if (isset($data['kategori'])) {
  //   $nama  = htmlspecialchars($data["nama"]);
  //   $email    = htmlspecialchars($data["email"]);
  //   $noHP   = htmlspecialchars($data["noHP"]);
  //   $user   = htmlspecialchars($data["username"]);
  //   $pw   = htmlspecialchars($data["password"]);

  //   $query = "INSERT INTO users VALUES ('', '$nama', '$email', '$noHP', '$user', '$pw')";

  //   mysqli_query($conn, $query);
  //   return mysqli_affected_rows($conn);
  // }
  /* Tambah data register */

  $id       = $data['id'];
  $judul    = htmlspecialchars($data["judul"]);
  $sub      = htmlspecialchars($data["subJudul"]);
  $tipe     = htmlspecialchars($data["tipe"]);
  $desk     = htmlspecialchars($data["desk"]);
  $desk     = htmlspecialchars($data["desk"]);
  $gambar  = htmlspecialchars($data["gambarLama"]);

  /* Proses Upload Gambar */
  if ($_FILES['gambar']['error'] !== 4) {
    $gambar = upload();
  }
  /* Akhir Proses Upload Gambar */

  $query = "UPDATE blog SET judul='$judul', sub_judul='$sub', tipe='$tipe', deskripsi='$desk', gambar='$gambar' WHERE id='$id'";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES["gambar"]["name"];
  $ukuranFile = $_FILES["gambar"]["size"];
  $error = $_FILES["gambar"]["error"];
  $tmpName = $_FILES["gambar"]["tmp_name"];

  /* cek apakah ada gambar diupload atau tidak */
  if ($error === 4) {
    echo "<script>alert('Gambar wajib diupload !'); document.location.href='tambah-blog.php';</script>";
    return false;
  }

  /* cek format gampar yang diupload */
  $ekstensiGambar = ['jpg', 'jpeg', 'png']; // contoh beberapa ekstensi gambar yang valid
  $formatFile = explode('.', $namaFile);
  $formatFile = strtolower(end($formatFile)); // mengambil format file dari suatu gambar yang sesuai dengan ekstensi gambar yang valid

  if (!in_array($formatFile, $ekstensiGambar)) {
    echo "<script>alert('Yang diupload bukan gambar !'); document.location.href='tambah-blog.php';</script>";
    return false;
  }

  /* cek ukuran gambar yang diupload */
  if ($ukuranFile > 1000000) {
    echo "<script>alert('Gambar yang diupload terlalu besar !'); document.location.href='tambah-blog.php';</script>";
    return false;
  }

  /* lolos pengecekan, gambar siap diupload */
  $encNamaFile = uniqid() . '.' . $formatFile; // ubah nama file menjadi nama acak
  move_uploaded_file($tmpName, '../../upload/' . $encNamaFile);
  return $encNamaFile;
}

function login($data)
{
  global $conn;
  // session_start();

  $user  = htmlspecialchars($data["username"]);
  $pw    = htmlspecialchars($data["password"]);

  $query = "SELECT * FROM users WHERE username = '$user'";
  $login = mysqli_query($conn, $query);

  /* Cek Username */
  if (mysqli_num_rows($login) === 1) {

    /* Cek Password */
    // password_verify($pw, $encPW["password"])
    $encPW = mysqli_fetch_assoc($login); // Ngambil Data
    if ($pw == $encPW["password"]) {

      /* Buat Session baru */
      $_SESSION["login"] = true;
      $_SESSION["nama"] = $encPW["nama"];

      echo "<script>alert('Selamat Datang ^_^'); window.location.href='dashboard/index.php';</script>";
    }
    echo "<script> let alertG = document.getElementById('gagal'); alertG.style.display = 'block';</script>";
  }
  echo "<script> let alertG = document.getElementById('gagal'); alertG.style.display = 'block';</script>";
}
