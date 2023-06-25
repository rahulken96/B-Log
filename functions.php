<?php
  $conn = mysqli_connect('localhost', 'root', '', 'b_log_project');

  function query($query){
    global $conn;

    $hasil = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($hasil)) {
       $rows[] = $row;
    }

    return $rows;
  }

  function tambah($data){
    global $conn;
    // return var_dump($data);
    $judul  = htmlspecialchars($data["judul"]);
    $sub    = htmlspecialchars($data["subJudul"]);
    $tipe   = htmlspecialchars($data["tipe"]);
    $desk   = htmlspecialchars($data["desk"]);
    $gambar = $_FILES["gambar"]["name"];

    $query = "INSERT INTO blog VALUES ('', '$judul', '$sub', '$tipe', '$desk', '$gambar')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
  }
?>