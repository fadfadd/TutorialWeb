<?php
include 'koneksi.php';

// ambil id dari URL
$id = $_GET['id'];

// hapus data
mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");

// kembali ke halaman utama
header("location:home.php");
?>
