<?php 

include '../config/config.php';
$id=$_GET['id'];
    $st="cancel";
    
    $queri= "UPDATE pesanan SET status ='$st' WHERE id_pesanan='$id'";
        
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header("location:pesanan-cancel.php");
