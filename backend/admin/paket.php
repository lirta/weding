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
  <title>Admin | Paket</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1>Paket</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Paket</h3> <br>
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
                      <th>Paket</th>
                      <th>Total Item</th>
                      <th>Total Harga</th>
                      <th style="width: 200px">aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $queri ="SELECT * FROM paket ";
                    $hasil =mysqli_query($koneksi,$queri);
                    $no = 1;
                    while ($paket=mysqli_fetch_assoc($hasil)) {
                      
                      $total_item =mysqli_query($koneksi,"SELECT *  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$paket[id]' ");
                      $tt_item=mysqli_num_rows($total_item); 

                      $total =mysqli_query($koneksi,"SELECT SUM(harga) as total  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$paket[id]' ");
                      $tt=mysqli_fetch_assoc($total); 
                      $uang="Rp ".number_format($tt['total'],2,',','.');
                      ?>
                    <tr>
                      <?php if ($paket['paket'] == "Custom") { ?>
                        
                        <td><?php echo "$no"; ?></td>
                        <td><?php echo "$paket[paket]"; ?></td>
                        <td> - </td> 
                        <td> - </td>
                        <td> - </td>
                      <?php }else{ ?>

                        <td><?php echo "$no"; ?></td>
                        <td><?php echo "$paket[paket]"; ?></td>
                        <td><?php echo "$tt_item"; ?></td> 
                        <td><?php echo "$uang"; ?></td>
                        <td>
                          <a href="paket-edit.php?id=<?php echo "$paket[id]"; ?>" class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                          <a href="paket-delete.php?id=<?php echo "$paket[id]"; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                          <a href="paket-detail.php?id=<?php echo "$paket[id]"; ?>" class="btn btn-info"><i class="fas fa-clipboard-list"></i></a>
                        </td>
                      </tr>
                      <?php 
                      } 
                    include 'model-edit-paket.php';
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
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="paket-add-proses.php">
                      <div class="card-body">
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <input type="text" class="form-control" id="paket" placeholder="Enter paket" name="paket">
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
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
</script>
</body>
</html>
<?php } ?>