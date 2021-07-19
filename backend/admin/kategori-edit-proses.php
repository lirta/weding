<?php 

include '../config/config.php';

$queri= "UPDATE kategori_makanan SET kategori ='$_POST[kategori]' WHERE id_kategori='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header('location:kategori.php');