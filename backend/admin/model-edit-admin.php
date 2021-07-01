<div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title">edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  action="admin_edit_proses.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="rules">Rules</label>
                            <select class="custom-select rounded-0" id="rules" name="rules">
                              <option value="<?php echo "$admin[rules]"; ?>"><?php echo "$admin[rules]"; ?></option>
                              <option value="super">Super Admin</option>
                              <option value="admin">admin</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" id="id" placeholder="Enter Full Name" name="id" value="<?php echo "$admin[id]"; ?>"  hidden>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Enter Full Name" name="nama" value="<?php echo "$admin[name]"; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="hp">No Hp</label>
                            <input type="text" class="form-control" id="hp" placeholder="Enter Full No Hp" name="hp" value="<?php echo "$admin[hp]"; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Enter Full Alamat" name="alamat" value="<?php echo "$admin[alamat]"; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo "$admin[email]"; ?>">
                        </div>
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
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>