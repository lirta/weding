<?php 

include '../config/config.php';


if ($_POST['em'] == $_POST['email'] ) {
    $acak = rand(00000000, 99999999);
    $namafoto = $_FILES['foto']['name'];
    $nama = $acak.$namafoto;
    $folderawal = $_FILES['foto']['tmp_name'];
    $foldertujuan="../assets/pelanggan/";

    move_uploaded_file($folderawal,$foldertujuan.$nama);
    if (!empty($folderawal))
    {	
        $queri="UPDATE pelanggan SET
                                name='$_POST[nama]',
                                hp='$_POST[hp]',
                                foto='$nama'
                                WHERE id='$_POST[id]'";
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header('location:profile.php');
                        
    }else{
        $queri="UPDATE pelanggan SET
                                name='$_POST[nama]',
                                hp='$_POST[hp]'
                                WHERE id='$_POST[id]'";
        mysqli_query($koneksi,$queri);
        mysqli_close($koneksi);
        header('location:profile.php');
    }
}else{
    $email=$_POST['email'];
    $qe=("SELECT * FROM pelanggan where email = '$email' ");
    $hasile =mysqli_query($koneksi,$qe);  
    $ketemu=mysqli_num_rows($hasile);
    if ($ketemu >  0) {
        header('location:profile.php');
    }else{
    
        $acak = rand(00000000, 99999999);
        $namafoto = $_FILES['foto']['name'];
        $nama = $acak.$namafoto;
        $folderawal = $_FILES['foto']['tmp_name'];
        $foldertujuan="../assets/pelanggan/";

        move_uploaded_file($folderawal,$foldertujuan.$nama);
        if (!empty($folderawal))
        {	
            $queri="UPDATE pelanggan SET
                                    name='$_POST[nama]',
                                    email='$_POST[email]',
                                    alamat='$_POST[alamat]',
                                    hp='$_POST[hp]',
                                    foto='$nama'
                                    WHERE id='$_POST[id]'";
            mysqli_query($koneksi,$queri);
            mysqli_close($koneksi);
            header('location:profile.php');
                            
        }else{
            $queri="UPDATE pelanggan SET
                                    name='$_POST[nama]',
                                    email='$_POST[email]',
                                    alamat='$_POST[alamat]',
                                    hp='$_POST[hp]'
                                    WHERE id='$_POST[id]'";
            mysqli_query($koneksi,$queri);
            mysqli_close($koneksi);
            header('location:profile.php');
        }
    }
}