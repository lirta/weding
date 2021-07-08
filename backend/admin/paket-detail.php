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
  <title>Admin </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
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
            <h1>Detail Paket</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
              <?php 
                $queri ="SELECT * FROM paket WHERE id='$_GET[id]'";
                $hasil =mysqli_query($koneksi,$queri);
                $paket=mysqli_fetch_assoc($hasil); 
              ?>
                <h3 class="card-title"><?php echo "$paket[paket]"; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Total Item</strong>
                <?php 
                $total_item =mysqli_query($koneksi,"SELECT *  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$_GET[id]' ");
                $tt_item=mysqli_num_rows($total_item); 
                ?>
                <p class="text-muted">
                  <?php echo "$tt_item"; ?>
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Total Harga</strong>
                <?php 
                $total =mysqli_query($koneksi,"SELECT SUM(harga) as total  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$_GET[id]' ");
                $tt=mysqli_fetch_assoc($total); 
                $uang="Rp ".number_format($tt['total'],2,',','.');
                ?>

                <p class="text-muted"><?php echo "$uang"; ?></p>

                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
            <div class="col-md-9">
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
                        <th>Item</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $querii ="SELECT * FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$_GET[id]'";
                      $hasill =mysqli_query($koneksi,$querii);
                      $no = 1;
                      while ($item=mysqli_fetch_assoc($hasill)) { 
                      $uang2="Rp ".number_format($item['harga'],2,',','.');?>
                      <tr>
                        <td><?php echo "$no" ?></td>
                        <td><?php echo "$item[item]" ?></td>
                        <td><?php echo "$uang2" ?></td>
                        <td>
                          <a href="peket-detail-delete.php?id=<?php echo "$item[id_daf]"; ?> && idp=<?php echo "$_GET[id]"; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
                <h4 class="modal-title">Add Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="paket-detail-add-proses.php">
                    <div class="card-body">
                      <div class="form-group">
                          <label for="rules">Item</label>
                          <select class="custom-select rounded-0" id="item" name="item">
                          <?php 
                            $queri_s ="SELECT * FROM item_paket ";
                            $hasil_ =mysqli_query($koneksi,$queri_s);
                            while ($item_s=mysqli_fetch_assoc($hasil_)) { ?>
                            <option value="<?php echo "$item_s[id]"; ?>"><?php echo "$item_s[item]"; ?></option>
                            <?php } ?>
                          </select>
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
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
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
  })
</script>
</body>
</html>
<?php } ?>