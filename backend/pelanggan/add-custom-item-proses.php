<?php 
include '../config/config.php';
$id_p=$_GET['idp'];
$id_i=$_GET['idi'];

    $queri= "INSERT INTO custom (id_pesanan,id_item) VALUES ('$id_p','$id_i')";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:add-custom-item.php?id=$id_p");
