<?php 

include '../config/config.php';

$queri= "INSERT INTO paket (paket) VALUES ('$_POST[paket]')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket.php');