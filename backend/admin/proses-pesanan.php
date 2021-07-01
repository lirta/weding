<?php 

include '../config/config.php';
$id=$_GET['id'];
$q=("SELECT * FROM pesanan where id_pesanan = '$id' ");
$hasil =mysqli_query($koneksi,$q);
$r=mysqli_fetch_assoc($hasil);

if ($r['status'] == "konfirmasi") {
    $st="proses";
    
    $queri= "UPDATE pesanan SET status ='$st' WHERE id_pesanan='$id'";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:pesanan-proses.php");
}elseif ($r['status'] == "proses") {
    $st="selesai";
    
    $queri= "UPDATE pesanan SET status ='$st' WHERE id_pesanan='$id'";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:pesanan-selesai.php");
}else{
    
    header("location:pesanan-selesai.php");
}
