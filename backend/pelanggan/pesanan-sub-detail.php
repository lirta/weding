<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?php echo "$paket[paket]"; ?></h3>
                <strong>Harga Paket</strong>
                    <?php 
                    $total =mysqli_query($koneksi,"SELECT SUM(harga) as total  FROM daftar_item INNER JOIN item_paket on daftar_item.item_id = item_paket.id WHERE  paket_id ='$paket[paket_id]' ");
                    $tt=mysqli_fetch_assoc($total); 
                    $uang="Rp ".number_format($tt['total'],2,',','.');
                    ?>
                <p class="text-muted"><?php echo "$uang"; ?></p>
                <hr>
                
                <strong>Harga Ketring</strong>
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
                <a href="ketring.php?id=<?php echo"$_GET[id]"; ?>" class="btn btn-warning float-right"><i class="fas fa-edit"></i></a>
                <p class="text-muted"><?php echo "$uangk"; ?></p>
                    <?php }else{ ?>
                <a href="ketring.php?id=<?php echo"$_GET[id]"; ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i></a>
                <p class="text-muted">Tidak ada Ketring</p>
                    <?php $total_semua=$tt['total']; } ?>
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
                    $sisa=$total_semua - $s_tt['sub_total']; 
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
                      <td><?php echo "$no";?></td>
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
    </div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Paket Wedding</h3> <br>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">N0</th>
                            <th>item</th>
                            <th>Gambar</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $querik ="SELECT * FROM daftar_item INNER JOIN item_paket on daftar_item.item_id=item_paket.id WHERE paket_id ='$paket[paket_id]' ";
                        $hasilk =mysqli_query($koneksi,$querik);
                        $no=1;
                        while ($item_p=mysqli_fetch_assoc($hasilk)) {
                          ?>
                        <tr>
                        <td><?php echo "$no";?></td>
                        <td><?php echo "$item_p[item]";?></td>
                        <td>
                            <a href="../assets/galery/<?php echo "$item_p[gambar]";?>" data-toggle="lightbox" data-title="<?php echo "$item_p[item]";?>"  class="btn btn-info">
                            <i class="nav-icon far fa-image"></i>
                            </a>
                        </td>
                        </tr>
                          <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ketring</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">N0</th>
                            <th>makanan</th>
                            <th>jumlah</th>
                            <th>harga</th>
                            <th>Gambar</th>
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
                            <td>
                                <a href="../assets/makanan/<?php echo "$i_ketring[gambar]";?>" data-toggle="lightbox" data-title="<?php echo "$i_ketring[makanan]";?>"  class="btn btn-info">
                                <i class="nav-icon far fa-image"></i>
                                </a>
                            </td>
                        </tr>
                          <?php $no_k++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>