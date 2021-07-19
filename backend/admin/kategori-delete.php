<?php 

include '../config/config.php';

$queri="DELETE FROM kategori_makanan WHERE id_kategori='$_GET[id]'";
$querim="DELETE FROM makanan WHERE id_kategori='$_GET[id]'";
    mysqli_query($koneksi,$queri);
    mysqli_query($koneksi,$querim);
    mysqli_close($koneksi);
    header('location:kategori.php');