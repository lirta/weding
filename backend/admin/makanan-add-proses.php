<?php 

include '../config/config.php';

$id=$_POST['id'];
$acak = rand(00000000, 99999999);
$namafoto = $_FILES['foto']['name'];
$nama = $acak.$namafoto;
$folderawal = $_FILES['foto']['tmp_name'];
$foldertujuan="../assets/makanan/";

move_uploaded_file($folderawal,$foldertujuan.$nama);

$queri= "INSERT INTO makanan (id_kategori,makanan,harga,gambar) VALUES ('$_POST[id]','$_POST[nama]','$_POST[harga]','$nama')";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:kategori-detail.php?id=$id"); 