<div class="content-body">
    <div class="container-fluid">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Tambah Level Kompetensi</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_edit_level_kom/').$data->id_lp  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Kompetensi</td>
                                                                    <td>
                                                                        <select name="opt_kom" id="opt_kom" class="form-control">
                                                                            <option value="">No Selected</option>
                                                                            <?php foreach ($kom as $x) { ?>
                                                                                <option value="<?= $x->id_kom ?>"><?= $x->j_kompetensi ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Plan Kompetensi</td>
                                                                    <td>
                                                                        <select class="form-control" id="plan" name="plan" required>
                                                                            <option value="">No Selected</option>
                                                                            <?php

                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Target Plan Kompetensi</td>
                                                                    <td>
                                                                        <select class="form-control" id="pk_level" name="pk_level" required>
                                                                            <option value="">No Selected</option>
                                                                            <?php

                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jabatan</td>
                                                                    <td><select name="lvl_jab" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH JABATAN--</option>
                                                                            <option value="Skilled" <?= $data->lvl_jab == "Skilled" ? 'selected=selected' : ''; ?>>Skilled</option>
                                                                            <option value="Foreman" <?= $data->lvl_jab == "Foreman" ? 'selected=selected' : ''; ?>>Foreman</option>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Nilai Level</td>
                                                                    <td><input type="number" name="nilai_lp" value="<?= $data->nilai_lp ?>" class="form-control" required placeholder="Nilai Level"></td>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#opt_kom').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: '<?= base_url(); ?>admin/get_plan',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#plan').html(data)
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#plan').change(function() {
                var sub_id = $(this).val();
                $.ajax({
                    url: '<?= base_url(); ?>admin/get_plan_kom',
                    method: 'POST',
                    data: {
                        sub_id: sub_id
                    },
                    success: function(data) {
                        $('#pk_level').html(data)
                    }
                });
            });
        });
    </script>
</body>