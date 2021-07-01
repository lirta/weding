<?php 

include '../config/config.php';

$queri= "UPDATE item_paket SET item ='$_POST[nama]', harga='$_POST[harga]' WHERE id='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:paket-item.php');