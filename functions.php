<?php
$conn = mysqli_connect('localhost', 'root', '', 'b_log_project');

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

  $judul  = htmlspecialchars($data["judul"]);
  $sub    = htmlspecialchars($data["subJudul"]);
  $tipe   = htmlspecialchars($data["tipe"]);
  $desk   = htmlspecialchars($data["desk"]);
  $gambar = $_FILES["gambar"]["name"];

  $query = "INSERT INTO blog VALUES ('', '$judul', '$sub', '$tipe', '$desk', '$gambar')";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
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
    $encPW = mysqli_fetch_assoc($login); /* Ngambil Data*/
    // password_verify($pw, $encPW["password"])
    if ($pw == $encPW["password"]) {

      /* Buat Session baru */
      $_SESSION["login"] = true;

      echo "<script>alert('Selamat Datang ^_^'); document.location.href='tambah-blog.php';</script>";
      // header('location: tambah-blog.php');
      // exit;
    }
    echo "<script> let alertG = document.getElementById('gagal'); alertG.style.display = 'block';</script>";
  }

  echo "<script> let alertG = document.getElementById('gagal'); alertG.style.display = 'block';</script>";
}
