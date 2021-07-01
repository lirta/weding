<?php 

include '../config/config.php';
$id=$_POST['id'];
$q=("SELECT * FROM admin where id = '$id' ");
$hasil =mysqli_query($koneksi,$q);
$r=mysqli_fetch_assoc($hasil);
// echo "$r[email]";

if ($r['email'] == $_POST['email'] ) {
    $acak = rand(00000000, 99999999);
        $namafoto = $_FILES['foto']['name'];
                    $nama = $acak.$namafoto;
                    $folderawal = $_FILES['foto']['tmp_name'];
                    $foldertujuan="../assets/admin/";
        
                    move_uploaded_file($folderawal,$foldertujuan.$nama);
                    if (!empty($folderawal))
                    {	
                        $queri="UPDATE admin SET
                                                name='$_POST[nama]',
                                                hp='$_POST[hp]',
                                                rules='$_POST[rules]',
                                                status='$_POST[status]',
                                                foto='$nama'
                                                WHERE id='$_POST[id]'";
                        mysqli_query($koneksi,$queri);
                        mysqli_close($koneksi);
                        header('location:admin.php');
                                        
                    }else{
                        $queri="UPDATE admin SET
                                                name='$_POST[nama]',
                                                alamat='$_POST[alamat]',
                                                hp='$_POST[hp]',
                                                rules='$_POST[rules]',
                                                status='$_POST[status]'
                                                WHERE id='$_POST[id]'";
                        mysqli_query($koneksi,$queri);
                        mysqli_close($koneksi);
                        header('location:admin.php');
                    }
}else{
    $email=$_POST['email'];
    $qe=("SELECT * FROM admin where email = '$email' ");
    $hasile =mysqli_query($koneksi,$qe);  
    $ketemu=mysqli_num_rows($hasile);
    if ($ketemu >  0) {
        header('location:admin.php');
    }else{
    
        $acak = rand(00000000, 99999999);
        $namafoto = $_FILES['foto']['name'];
                    $nama = $acak.$namafoto;
                    $folderawal = $_FILES['foto']['tmp_name'];
                    $foldertujuan="../assets/admin/";
        
                    move_uploaded_file($folderawal,$foldertujuan.$nama);
                    if (!empty($folderawal))
                    {	
                        $queri="UPDATE admin SET
                                                name='$_POST[nama]',
                                                email='$_POST[email]',
                                                alamat='$_POST[alamat]',
                                                hp='$_POST[hp]',
                                                rules='$_POST[rules]',
                                                status='$_POST[status]',
                                                foto='$nama'
                                                WHERE id='$_POST[id]'";
                        mysqli_query($koneksi,$queri);
                        mysqli_close($koneksi);
                        header('location:admin.php');
                                        
                    }else{
                        $queri="UPDATE admin SET
                                                name='$_POST[nama]',
                                                email='$_POST[email]',
                                                alamat='$_POST[alamat]',
                                                hp='$_POST[hp]',
                                                rules='$_POST[rules]',
                                                status='$_POST[status]'
                                                WHERE id='$_POST[id]'";
                        mysqli_query($koneksi,$queri);
                        mysqli_close($koneksi);
                        header('location:admin.php');
                    }
    }
}