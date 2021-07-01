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
  <title>Samudra || pesanan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
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
            <h1>Detail Pesanan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <?php 
                    $queri ="SELECT * FROM pesanan inner join paket on pesanan.paket_id = paket.id  WHERE id_pesanan = '$_GET[id]' ";
                    $hasil =mysqli_query($koneksi,$queri);
                    $paket=mysqli_fetch_assoc($hasil); ?>
                        <h3 class="profile-username text-center"><?php echo "$paket[paket]"; ?></h3>

                        <strong>Total Harga</strong>
                        <?php 
                        $total =mysqli_query($koneksi,"SELECT SUM(harga) as total  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$paket[paket_id]' ");
                        $tt=mysqli_fetch_assoc($total); 
                        $uang="Rp ".number_format($tt['total'],2,',','.');
                        ?>
                        <p class="text-muted"><?php echo "$uang"; ?></p>
                        <hr>
                        <strong>Total pembayaran</strong>
                        <?php 
                        $sub_total =mysqli_query($koneksi,"SELECT SUM(jumlah) as sub_total  FROM pembayaran WHERE  pesanan_id ='$paket[id_pesanan]' ");
                        $s_tt=mysqli_fetch_assoc($sub_total);
                        $uangb="Rp ".number_format($s_tt['sub_total'],2,',','.');
                        ?>
                        <p class="text-muted"><?php echo "$uangb"; ?></p>
                        <hr>
                        <strong>Total Sisa</strong>
                        <?php 
                        $sisa=$tt['total'] - $s_tt['sub_total']; 
                        $uangg="Rp ".number_format($sisa,2,',','.'); ?>
                        <p class="text-muted"><?php echo "$uangg"; ?></p>
                        <hr>
                    </div>
                </div>
            </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Pembayaran</h3> <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"> 
                  Pembayaran
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                  
                    <tr>
                      <th style="width: 10px">N0</th>
                      <th>Jumlah</th>
                      <th>Bukti Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $qr =mysqli_query($koneksi,"SELECT *  FROM pembayaran WHERE  pesanan_id ='$paket[id_pesanan]' ");
                    $no=1;
                    while($pem=mysqli_fetch_assoc($qr)){
                      $pem_t="Rp ".number_format($pem['jumlah'],2,',','.'); ?>
                    <tr>
                      <td>1.</td>
                      <td><?php echo "$pem_t";?></td>
                      <td>
                        <a href="../assets/pembayaran/<?php echo "$pem[bukti]";?>" data-toggle="lightbox" data-title="<?php echo "$pem_t";?>">
                        <?php echo "$pem[bukti]";?>
                        </a>
                      </td>
                      <td>
                        <a href="pembayaran-delete.php?id=<?php echo "$pem[id]"; ?> && ps=<?php echo "$paket[id_pesanan]"; ?> " class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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
      <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Bukti Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="pembayaran-add-proses.php" enctype="multipart/form-data">
                  <input type="text" class="form-control" id="id"  placeholder="Enter email" name="id" value="<?php echo "$_GET[id]"; ?>" hidden>
                      <div class="card-body">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" placeholder="Enter Jumlah" name="jumlah">
                        </div>
                        <div class="form-group">
                          <label for="foto">Bukti</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="foto" name="foto">
                              <label class="custom-file-label" for="foto">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                </div>
            </div>
      </div>
    </div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(function () {
  bsCustomFileInput.init();
});
$(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  });
</script>
</body>
</html>
<?php } ?>