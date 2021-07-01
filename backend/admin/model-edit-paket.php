<div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">Add Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post" action="paket-edit-proses.php">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="paket">Paket</label>
                            <input type="text" class="form-control" id="paket" placeholder="Enter Name Paket" name="paket" value="<?php echo "$paket[paket]";  ?>">
                        </div>
                    </div>
                    <input type="text" class="form-control" id="id" placeholder="Harga" name="id" value="<?php echo "$paket[id]";  ?>" hidden>
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
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>