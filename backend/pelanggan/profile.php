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
  <title>Samudra || Profile</title>

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
        <?php 
        $queri ="SELECT * FROM pelanggan   WHERE id = '$_SESSION[id]' ";
        $hasil =mysqli_query($koneksi,$queri);
        $pelanggan=mysqli_fetch_assoc($hasil);?>
            
            <div class="col-md-5">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="../assets/pelanggan/<?php echo"$pelanggan[foto]"; ?>"
                            alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo"$pelanggan[name]"; ?></h3>

                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right"><?php echo"$pelanggan[email]"; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>No Hp</b> <a class="float-right"><?php echo"$pelanggan[hp]"; ?></a>
                        </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#profile"><b>Edit Profile</b></a>
                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pass"><b>Reset Password</b></a>
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
    <div class="modal fade" id="pass">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="reset-pass-proses.php" enctype="multipart/form-data">
                      <div class="card-body" >
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" id="pass"  name="pass">
                        </div>
                        
                        <input type="text" class="form-control" id="id" placeholder="Enter em" name="id" value="<?php echo "$pelanggan[id]"; ?>" hidden >
                        
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
    <div class="modal fade" id="profile">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="profile-edit-proses.php" enctype="multipart/form-data">
                      <div class="card-body" >
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama"  value="<?php echo "$pelanggan[name]"; ?>" >
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email"  name="email" value="<?php echo "$pelanggan[email]"; ?>">
                        </div>
                        <div class="form-group">
                            <label for="hp">Hp</label>
                            <input type="text" class="form-control" id="hp" placeholder="Enter hp" name="hp" value="<?php echo "$pelanggan[hp]"; ?>" >
                        </div>
                        <input type="text" class="form-control" id="em" placeholder="Enter em" name="em" value="<?php echo "$pelanggan[email]"; ?>" hidden >
                        <input type="text" class="form-control" id="id" placeholder="Enter em" name="id" value="<?php echo "$pelanggan[id]"; ?>" hidden >
                        
                        <div class="form-group">
                          <label for="foto">Foto</label>
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