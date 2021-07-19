<?php 

include '../config/config.php';

$queri= "INSERT INTO kategori_makanan (kategori) VALUES ('$_POST[kategori]')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:kategori.php');