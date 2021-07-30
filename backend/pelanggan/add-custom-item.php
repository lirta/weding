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
  $queri =mysqli_query($koneksi,"SELECT * FROM pesanan WHERE id_pesanan='$_GET[id]'");
  $paket=mysqli_fetch_assoc($queri);
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Paket Wedding Custom</h1> <br>
            <a href="pesanan.php" class="btn btn-primary">Selesai</a>
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
                        <h4>Item Yang dipesan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">N0</th>
                                    <th>Item</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th style="width: 10px">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $q_item ="SELECT * FROM custom INNER JOIN  item_paket ON custom.id_item = item_paket.id WHERE id_pesanan='$_GET[id]'";
                                $h_item =mysqli_query($koneksi,$q_item);
                                $no_item = 1;
                                $total=0;
                                $totall=0;
                                while ($custom=mysqli_fetch_assoc($h_item)) { 
                                $uang_custom="Rp ".number_format($custom['harga'],2,',','.');
                                $total=$total+$custom['harga'];
                                $totall="Rp ".number_format($total,2,',','.');
                                ?>
                                <tr>
                                <td><?php echo "$no_item"; ?></td>
                                <td><?php echo "$custom[item]"; ?></td>
                                <td><?php echo "$uang_custom"; ?></td>
                                <td>
                                <a href="../assets/galery/<?php echo "$custom[gambar]" ?>" data-toggle="lightbox" data-title="<?php echo "$custom[item]"; ?>" class="btn btn-info">
                                    <i class="nav-icon far fa-image"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="add-custom-delete.php?idc=<?php echo "$custom[id_custom]"; ?> & idp=<?php echo "$_GET[id]"; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                </tr>
                                <?php 
                                    $no_item=$no_item+1;
                            } ?>
                                <tr>
                                  <td colspan="2"><b>Total Harga</b></td>
                                  <td colspan="3"><b><?php echo "$totall"; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Item yang disediakan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">N0</th>
                                    <th>Item</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th style="width:10px">aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $queri ="SELECT * FROM item_paket ";
                                $hasil =mysqli_query($koneksi,$queri);
                                $no = 1;
                                while ($item=mysqli_fetch_assoc($hasil)) { 
                                    
                                $cek = "SELECT * FROM custom WHERE id_item='$item[id]' and id_pesanan='$_GET[id]'";
                                $result = mysqli_query($koneksi, $cek);
                                $ketemu=mysqli_num_rows($result);
                                if ($ketemu > 0) {}else{

                                $uang="Rp ".number_format($item['harga'],2,',','.');?>
                                <tr>
                                <td><?php echo "$no"; ?></td>
                                <td><?php echo "$item[item]"; ?></td>
                                <td><?php echo "$uang"; ?></td>
                                <td>
                                <a href="../assets/galery/<?php echo "$item[gambar]" ?>" data-toggle="lightbox" data-title="<?php echo "$item[item]"; ?>" class="btn btn-info">
                                    <i class="nav-icon far fa-image"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="add-custom-item-proses.php?idi=<?php echo "$item[id]"; ?> & idp=<?php echo "$_GET[id]"; ?>" class="btn btn-primary" ><i class="fas fa-plus"></i></a>
                                </td>
                                </tr>
                                <?php 
                                    $no=$no+1;
                                }
                            } ?>
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