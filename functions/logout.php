<?php
  require 'functions.php';

  $_SESSION = [];
  session_unset();
  session_destroy();
  if (empty($_SESSION)) {
    echo "<script>alert('Anda telah keluar !'); window.location.href='../index.php';</script>";
    exit;
  }
  echo "<script>alert('Keluar Gagal !'); history.back();</script>";
?>