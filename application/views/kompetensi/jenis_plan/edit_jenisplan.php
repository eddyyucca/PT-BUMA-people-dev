<div class="content-body">
    <div class="container-fluid">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Edit Plan</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_edit_jenisplan/' . $data->id_plan)  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Jenis Kompetensi</td>
                                                                    <td><select data-placeholder="Begin typing a name to filter..." name="kompetensi" class="form-control  selectpicker" data-live-search="true">
                                                                            <?php foreach ($kom as $k) { ?>
                                                                                <option value="<?= $k->id_kom ?>" <?= $k->id_kom == $data->kompetensi ? 'selected=selected' : ''; ?>><?= $k->j_kompetensi ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Nama Jenis Plan</td>
                                                                    <td><input type="text" name="nama_plan" value="<?= $data->nama_plan ?>" class="form-control" required placeholder="Nama Jenis Plan"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <button class="btn btn-success">Simpan</button>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>