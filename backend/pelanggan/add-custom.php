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
  <title>Admin</title>

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
  <?php 
  $queri =mysqli_query($koneksi,"SELECT * FROM paket WHERE id='$_GET[id]'");
  $paket=mysqli_fetch_assoc($queri);
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paket Wedding <?php echo"$paket[paket]"; ?></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h4>Form Pemesanan</h4>
                        </div>
                        <div class="card-body">

                          <form method="post" action="pesanan-add-proses.php">
                              <div class="card-body" hidden>
                                <div class="form-group">
                                    <label for="paket">Paket</label>
                                    <input type="text" class="form-control" id="paket" placeholder="Enter email" name="paket"  value="<?php echo "$paket[id]"; ?>" >
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="form-group">
                                    <label for="tgl">Tanggal Pesta</label>
                                    <input type="date" class="form-control" id="tgl"  name="tgl" required>
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="form-group">
                                    <label for="alamat">Alamat Pesta</label>
                                    <input type="text" class="form-control" id="alamat" placeholder="Enter alamat" name="alamat" required >
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1" required>
                                  <label for="customCheckbox1" class="custom-control-label">Syarat & Perjanjian</label>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="id"  placeholder="Enter alamat" name="id" value="<?php echo"$_SESSION[id]" ; ?>"  hidden>
                              <!-- /.card-body -->
                              <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card">
                        <div class="card-header">
                          <h4>Syarat & Perjanjian</h4>
                        </div>
                        <div class="card-body">
                          <p>Dengan ini Pelanggan menyetujui persyaratan dari SAMUDRA WEDDING seperti berikut:</p>
                          <p><ul>
                            <li>Pelanggan harus melunasi uang muka sebesar 50%</li>
                            <li>Pelunasan uang muka paling lama 3 hari setelah pemesanan</li>
                            <li>Setelah pelunasan uang muka maka pesanan tidak bisa di ubah</li>
                            <li>Jika pesanan dibatalkan setelah pelunasan uang muka maka uang yang dikembalikan sebesar 50% dari uang muka</li>
                            <li>Pelunasan sisa uang 2 hari sebelum hari H</li>
                          </ul></p>
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