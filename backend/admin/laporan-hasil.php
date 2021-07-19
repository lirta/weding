<?php include "../config/config.php";
if (!isset($_SESSION)) {session_start();}
if (empty($_SESSION['email']) AND
    empty($_SESSION['password']))
    { header('location:../login.php');}
else { 
    $date = date("Y-m-d"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'template/nav.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'template/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Laporan SAMUDRA WEDDING
                    <small class="float-right"><?php echo"$date"; ?> </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              
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
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $bln=mysqli_query($koneksi,"SELECT * FROM pesanan inner join paket on pesanan.paket_id = paket.id
                                                  inner join pelanggan on pesanan.pelanggan_id=pelanggan.id WHERE MONTH(tgl_pesan)='$_POST[bln]' and YEAR(tgl_pesan)='$_POST[thn]' ");
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
                      <td>
                      <a href="laporan-detail.php?id=<?php echo "$h_bl[id_pesanan]"; ?>" class="btn btn-info"><i class="fas fa-clipboard-list"></i></a>
                      </td>
                    </tr>
                    <?php }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="laporan-print.php?thn=<?php echo"$_POST[thn]"; ?> && bln=<?php echo"$_POST[bln]"; ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'template/footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>

<?php } ?>