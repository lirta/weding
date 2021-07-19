<div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Paket
                  <address>
                    <strong><?php echo"$info[paket]"; ?></strong><br>
                    <?php 
                    $total =mysqli_query($koneksi,"SELECT SUM(harga) as total  FROM custom INNER JOIN item_paket on custom.id_item = item_paket.id WHERE  id_pesanan ='$_GET[id]' ");
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
                        $uangk="Rp ".number_format($total_ket,2,',','.'); ?>
                    Harga Ketring: <strong><?php echo"$uangk"; ?></strong> <br>
                          <?php }else{ ?>
                      <p class="text-muted">Tidak ada Ketring</p>
                          <?php  } ?>
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
                        $querik ="SELECT * FROM custom INNER JOIN item_paket on custom.id_item = item_paket.id WHERE  id_pesanan ='$_GET[id]' ";
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
                      while($pem=mysqli_fetch_assoc($qr)){
                        $pem_t="Rp ".number_format($pem['jumlah'],2,',','.'); ?>
                      <tr>
                        <td><?php echo"$pem[tgl_bayar]";?></td>
                        <td><?php echo"$pem[reg]";?></td>
                        <td><?php echo "$pem_t";?></td>
                      </tr>
                      <?php  } ?>
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
                <a href="laporan-detail-costum-print.php?id=<?php echo"$_GET[id]"; ?>" rel="noopener" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>