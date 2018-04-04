



<!-- Modal (Pop up when detail button clicked) -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="myModalLabel">Form Registrasi</h4>
                        </div>
                        <div class="modal-body">
                            <form id="frmUsers" name="frmUsers" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Uuid</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="uuid_" name="uuid_" placeholder="uuid" value="" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control has-error" id="nama" name="nama" placeholder="Nama" value="" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="" required>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                            <input type="hidden" id="uuid" name="uuid" >
                        </div>
                    </div>
                </div>
            </div>