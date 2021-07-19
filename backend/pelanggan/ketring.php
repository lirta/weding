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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Yang dipesan</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"> 
                          Add 
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">N0</th>
                                    <th>Kategori</th>
                                    <th>Makanan</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Foto</th>
                                    <th style="width: 10px">aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $q_ketring="SELECT * FROM ketring INNER JOIN makanan on ketring.id_makanan=makanan.id
                                                              INNER JOIN kategori_makanan on makanan.id_kategori = kategori_makanan.id_kategori WHERE pesanan_id='$_GET[id]'";
                            $hasil_ketring=mysqli_query($koneksi,$q_ketring);
                            $nok=1;
                            while($ket=mysqli_fetch_assoc($hasil_ketring)){
                              $uang="Rp ".number_format($ket['harga'],2,',','.');?>
                                <tr>
                                  <td><?php echo "$nok"; ?></td>
                                  <td><?php echo "$ket[kategori]"; ?></td>
                                  <td><?php echo "$ket[makanan]"; ?></td>
                                  <td><?php echo "$uang"; ?></td>
                                  <td><?php echo "$ket[jumlah]"; ?></td>
                                  <td>
                                  <a href="../assets/makanan/<?php echo "$ket[gambar]" ?>" data-toggle="lightbox" data-title="<?php echo "$ket[makanan]"; ?>" class="btn btn-info">
                                    <i class="nav-icon far fa-image"></i>
                                  </td>
                                  <td> <a href="ketring-delete.php?id=<?php echo "$ket[id_ketring]"; ?> & idp=<?php echo "$_GET[id]"; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                            <?php $nok=$nok+1; }
                            ?>
                            <tbody>
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
  <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  action="ketring_add_proses.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Makanan</label>
                        <select class="custom-select" name="makanan">
                        <?php 
                          $queri ="SELECT * FROM makanan INNER JOIN kategori_makanan on makanan.id_kategori = kategori_makanan.id_kategori ";
                          $hasil =mysqli_query($koneksi,$queri);
                          while ($item=mysqli_fetch_assoc($hasil)) { 
                              
                          $cek = "SELECT * FROM ketring WHERE id_makanan='$item[id]' and  pesanan_id='$_GET[id]'";
                          $result = mysqli_query($koneksi, $cek);
                          $ketemu=mysqli_num_rows($result);
                          if ($ketemu > 0) {}else{

                          ?>
                          <option value="<?php echo "$item[id]"; ?>"><?php echo "$item[kategori]"; ?> || <?php echo "$item[makanan]"; ?></option>
                          <?php
                                }
                            } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" placeholder="Enter Jumlah Makanan" name="jumlah">
                      </div>
                          <input type="text" class="form-control" id="pesanan"  name="pesanan" value="<?php echo"$_GET[id]"; ?>" hidden>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
      
        </div>
    </div>

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