<?php 

include '../config/config.php';
$acak = rand(00000000, 99999999);
$namafoto = $_FILES['foto']['name'];
$nama = $acak.$namafoto;
$folderawal = $_FILES['foto']['tmp_name'];
$foldertujuan="../assets/makanan/";
if (!empty($folderawal)) {
    
    move_uploaded_file($folderawal,$foldertujuan.$nama);
    $queri= "UPDATE makanan SET makanan ='$_POST[nama]', harga='$_POST[harga]', gambar='$nama' WHERE id='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:kategori-detail.php?id=$_POST[idk]"); 
}else{
    $queri= "UPDATE makanan SET makanan ='$_POST[nama]', harga='$_POST[harga]' WHERE id='$_POST[id]'";
    
    mysqli_query($koneksi,$queri);
    mysqli_close($koneksi);
    header("location:kategori-detail.php?id=$_POST[idk]"); 

}