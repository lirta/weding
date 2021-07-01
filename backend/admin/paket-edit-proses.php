<?php 

include '../config/config.php';

$queri= "UPDATE paket SET paket ='$_POST[paket]' WHERE id='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket.php');