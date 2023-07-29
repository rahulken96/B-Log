<?php
require '../../functions/functions.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");

if (mysqli_affected_rows($conn)) {
  echo "<script>alert('Data berhasil dihapus !'); document.location.href='../kategori.php';</script>";
}
echo "<script>alert('Data gagal dihapus !'); document.location.href='../kategori.php';</script>";
?>