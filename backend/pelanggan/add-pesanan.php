<div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Pemesanan Paket || <?php echo "$paket[paket]"; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                            <input type="date" class="form-control" id="tgl"  name="tgl" >
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                            <label for="alamat">Alamat Pesta</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Enter alamat" name="alamat" >
                        </div>
                    </div>
                    <input type="text" class="form-control" id="id"  placeholder="Enter alamat" name="id" value="<?php echo"$_SESSION[id]" ; ?>"  hidden>
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