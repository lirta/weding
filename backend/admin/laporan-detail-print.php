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
  <title>Detail Laporan</title>

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
                    <small class="float-right"><?php echo"$date"; ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <hr>
    <!-- /.row -->
    <?php $q_info=mysqli_query($koneksi,"SELECT * FROM pesanan inner join paket on pesanan.paket_id = paket.id
                                                  inner join pelanggan on pesanan.pelanggan_id=pelanggan.id WHERE id_pesanan='$_GET[id]' ");
                    $info=mysqli_fetch_assoc($q_info);?>
    <!-- Table row -->
    <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Paket
                  <address>
                    <strong><?php echo"$info[paket]"; ?></strong><br>
                    <?php 
                    $total =mysqli_query($koneksi,"SELECT SUM(harga) as total  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$info[paket_id]' ");
                    $tt=mysqli_fetch_assoc($total); 
                    $uang="Rp ".number_format($tt['total'],2,',','.');
                    ?>
                    Harga Paket: <strong><?php echo"$uang"; ?></strong> <br>
                    Tanggal Pesan: <?php echo"$info[tgl_pesan]"; ?><br>
                    Tanggal Acara: <?php echo"$info[tgl_pesta]"; ?><br>
                    Alamat Acara: <?php echo"$info[alamat]"; ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Ketring
                  <address>
                  <?php 
                    $total_ketring =mysqli_query($koneksi,"SELECT * FROM ketring INNER JOIN makanan on ketring.id_makanan = makanan.id WHERE  pesanan_id ='$_GET[id]' ");
                    $ketemu=mysqli_num_rows($total_ketring);
                    if ($ketemu > 0) {
                        $total_ket=0;
                        while($jum_k=mysqli_fetch_assoc($total_ketring)){
                        $sub_t=$jum_k['jumlah']*$jum_k['harga'];
                        $total_ket=$total_ket+$sub_t;
                        }
                        $total_semua=$tt['total'] + $total_ket;
                        $uangk="Rp ".number_format($total_ket,2,',','.'); ?>
                    Harga Ketring: <strong><?php echo"$uangk"; ?></strong> <br>
                          <?php }else{ ?>
                      <p class="text-muted">Tidak ada Ketring</p>
                          <?php $total_semua=$tt['total']; } ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Pelanggan</b><br>
                  <br>
                  <b><?php echo"$info[name]"; ?></b><br>
                  <b><?php echo"$info[email]"; ?></b><br>
                  <b><?php echo"$info[hp]"; ?></b>
                </div>
                <!-- /.col -->
              </div>

              <!-- Table row -->
              <div class="row">
                <div class="col-4 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Item Wedding</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $querik ="SELECT * FROM daftar_item INNER JOIN item_paket on daftar_item.item_id=item_paket.id WHERE paket_id ='$info[paket_id]' ";
                        $hasilk =mysqli_query($koneksi,$querik);
                        $no=1;
                        while ($item_p=mysqli_fetch_assoc($hasilk)) {
                          ?>
                        <tr>
                        <td><?php echo "$no";?></td>
                        <td><?php echo "$item_p[item]";?></td>
                        </tr>
                          <?php $no++; } ?>
                    </tbody>
                  </table>
                </div>
                <div class="col-8 table-responsive">
                  <table class="table table-striped">
                  <thead>
                        <tr>
                            <th style="width: 10px">N0</th>
                            <th>makanan</th>
                            <th>jumlah</th>
                            <th>harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $ketring ="SELECT * FROM ketring INNER JOIN makanan on ketring.id_makanan=makanan.id WHERE pesanan_id ='$_GET[id]' ";
                        $h_ketring =mysqli_query($koneksi,$ketring);
                        $no_k=1;
                        while ($i_ketring=mysqli_fetch_assoc($h_ketring)) {
                          ?>
                        <tr>
                            <td><?php echo "$no_k";?></td>
                            <td><?php echo "$i_ketring[makanan]";?></td>
                            <td><?php echo "$i_ketring[jumlah]";?></td>
                            <td><?php echo "$i_ketring[harga]";?></td>
                        </tr>
                          <?php $no_k++; } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <!-- /.col -->
                <div class="col-4">
                  <p class="lead">Pembayaran</p>

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                        <th>Tanggal Bayar</th>
                        <th>No Reg</th>
                        <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php 
                      $qr =mysqli_query($koneksi,"SELECT *  FROM pembayaran WHERE  pesanan_id ='$_GET[id]' ");
                      $no=1;
                      while($pem=mysqli_fetch_assoc($qr)){
                        $pem_t="Rp ".number_format($pem['jumlah'],2,',','.'); ?>
                      <tr>
                        <td><?php echo"$pem[tgl_bayar]";?></td>
                        <td><?php echo"$pem[reg]";?></td>
                        <td><?php echo "$pem_t";?></td>
                      </tr>
                      <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="laporan-detail-print.php?id=<?php echo"$_GET[id]"; ?>" rel="noopener" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                </div>
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