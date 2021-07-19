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
  <title>Admin || Ketring</title>

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
              <?php 
                $queri ="SELECT * FROM kategori_makanan WHERE id_kategori='$_GET[id]'";
                $hasil =mysqli_query($koneksi,$queri);
                $kategori=mysqli_fetch_assoc($hasil); 
              ?>
            <h1><?php echo "$kategori[kategori]"; ?></h1>
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
                  <h3 class="card-title">Paket Item</h3> <br>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"> 
                    Add
                  </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                    
                      <tr>
                        <th style="width: 10px">N0</th>
                        <th>Makanan</th>
                        <th>Harga/Porsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $querii ="SELECT * FROM  makanan  WHERE  id_kategori ='$_GET[id]' ";
                      $hasill =mysqli_query($koneksi,$querii);
                      $no = 1;
                      while ($item=mysqli_fetch_assoc($hasill)) { 
                      $uang2="Rp ".number_format($item['harga'],2,',','.');?>
                      <tr>
                        <td><?php echo "$no" ?></td>
                        <td><?php echo "$item[makanan]" ?></td>
                        <td><?php echo "$uang2" ?></td>
                        <td>
                        <a href="../assets/makanan/<?php echo "$item[gambar]" ?>" data-toggle="lightbox" data-title="<?php echo "$item[makanan]"; ?>" class="btn btn-info">
                           <i class="nav-icon far fa-image"></i>
                        </a>
                        </td>
                        <td>
                          <a href="makanan-edit.php?id=<?php echo "$item[id]"; ?> && idk=<?php echo "$_GET[id]"; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="makanan-delete.php?id=<?php echo "$item[id]"; ?> && idk=<?php echo "$_GET[id]"; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        
                      </tr>
                      <?php 
                          $no=$no+1;
                  } 
                  ?>
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
                <h4 class="modal-title">Add Makanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="makanan-add-proses.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Makanan</label>
                            <input type="text" class="form-control" id="nama" placeholder="Enter Name Makanan" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" placeholder="Enter harga ex: 1200000" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="input-group">
                              <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="foto" name="foto" required>
                                  <label class="custom-file-label" for="foto">Choose file</label>
                              </div>
                            </div>
                        </div>
                      <input type="text" class="form-control" id="id" placeholder="Harga" name="id" value="<?php echo "$_GET[id]"; ?>" hidden>
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