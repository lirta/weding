<?php include "../config/config.php";
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['email']) AND
    empty($_SESSION['password']))
    { header('location:../login.php');}
else { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporarn Bulanan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
            <i class="fas fa-globe"></i> Laporan SAMUDRA WEDDING
            <small class="float-right"><?php $date = date("Y-m-d"); echo"$date"; ?> </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <hr>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Pelanggan</th>
                      <th>Paket Wedding</th>
                      <th>Paket Ketring</th>
                      <th>Tanggal Pesan</th>
                      <th>Tanggal Acara</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $bln=mysqli_query($koneksi,"SELECT * FROM pesanan inner join paket on pesanan.paket_id = paket.id
                                                  inner join pelanggan on pesanan.pelanggan_id=pelanggan.id WHERE MONTH(tgl_pesan)='$_GET[bln]' and YEAR(tgl_pesan)='$_GET[thn]' ");
                      while($h_bl=mysqli_fetch_assoc($bln)){  
                        $total_ketring =mysqli_query($koneksi,"SELECT * FROM ketring INNER JOIN makanan on ketring.id_makanan = makanan.id WHERE  pesanan_id ='$h_bl[id_pesanan]' ");
                        $ketemu=mysqli_num_rows($total_ketring);?>
                    <tr>
                      <td><?php echo"$h_bl[name]"; ?></td>
                      <td><?php echo"$h_bl[paket]"; ?></td>
                      <td><?php if ($ketemu >0) {
                          echo "Ketring";
                      }else{ echo"NO Ketring";} ?></td>
                      <td><?php echo"$h_bl[tgl_pesan]"; ?></td>
                      <td><?php echo"$h_bl[tgl_pesta]"; ?></td>
                      <td><?php echo"$h_bl[status]"; ?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
    <!-- /.row -->

    
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
<?php } ?>