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

  /* Tambah data kategori */
  if (isset($data['tambahKategori'])) {
    $kategori  = htmlspecialchars($data["kategori"]);

    $query = "INSERT INTO kategori VALUES ('', '$kategori')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }
  /* Tambah data kategori */

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
  $gambar   = htmlspecialchars($data["gambarLama"]);

  /* Proses Upload Gambar */
    if ($_FILES['gambar']['error'] !== 4) {

      /* Cek gambar lama dalam folder upload*/
      $path = "../../upload/$gambar";
      if (file_exists($path)) {

        /* Hapus Gambar Lama */
        unlink($path);

        /* Proses gambar baru */
        $gambar = upload();

      } else {
        return false;
      }

    }
  /* Akhir Proses Upload Gambar */

  /* Proses Cek data sama */
    $dataBlog = "SELECT * FROM blog WHERE id = '$id'";
    $blog = mysqli_query($conn, $dataBlog);
    $oldData = mysqli_fetch_assoc($blog);

    if ($judul == $oldData['judul'] && $sub == $oldData['sub_judul'] && $tipe == $oldData['tipe'] && $desk == $oldData['deskripsi'] && $gambar == $oldData['gambar']) {
      return true;
    }
  /* Akhir Proses Cek Data Sama*/

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
    echo "<script>alert('Gambar wajib diupload !'); history.back();</script>";
    return false;
  }

  /* cek format gampar yang diupload */
  $ekstensiGambar = ['jpg', 'jpeg', 'png']; // contoh beberapa ekstensi gambar yang valid
  $formatFile = explode('.', $namaFile);
  $formatFile = strtolower(end($formatFile)); // mengambil format file dari suatu gambar yang sesuai dengan ekstensi gambar yang valid

  if (!in_array($formatFile, $ekstensiGambar)) {
    echo "<script>alert('Yang diupload bukan gambar !'); history.back();</script>";
    return false;
  }

  /* cek ukuran gambar yang diupload */
  if ($ukuranFile > 1000000) {
    echo "<script>alert('Gambar yang diupload terlalu besar !'); history.back();</script>";
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
