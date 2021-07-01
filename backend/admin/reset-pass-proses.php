<?php 

include '../config/config.php';


$ps=md5($_POST['pass']);

        $queri="UPDATE admin SET
                                password='$ps'
                                WHERE id='$_POST[id]'";
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header('location:profile.php');
                        
  