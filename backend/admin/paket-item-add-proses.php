<?php 

include '../config/config.php';

$queri= "INSERT INTO item_paket (item,harga) VALUES ('$_POST[nama]','$_POST[harga]')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket-item.php');