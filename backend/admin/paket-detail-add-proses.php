<?php 

include '../config/config.php';

$queri= "INSERT INTO daftar_item (paket_id,item_id) VALUES ('$_POST[id]','$_POST[item]')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:paket-detail.php?id=$_POST[id]");