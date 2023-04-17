<div class="content-body">
    <div class="container-fluid">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <!-- Page Heading -->
                                        <div class="card">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Tambah Kompetensi</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_task_kompetensi')  ?>" method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Karyawan</td>
                                                                    <td><select name="xp" id="xp" class="form-control  selectpicker" data-live-search="true">
                                                                            <option value="">--PILIH karyawan--</option>
                                                                            <?php foreach ($kar as $karyawan) { ?>
                                                                                <option value="<?= $karyawan->nik ?>"><?= $karyawan->nama ?> | <?= $karyawan->nik ?></option>
                                                                            <?php } ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jabatan Level</td>
                                                                    <td><select name="xjab" id="xjab" class="form-control" disabled>
                                                                            <?php
                                                                             ?>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width=20%>Tanggal</td>
                                                                    <td><input type="date" name="tanggal" class="form-control" required placeholder="Tanggal"></td>
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
                        $('#opt_plan').html(data)
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#opt_plan').change(function() {
                var sub_id = $(this).val();
                $.ajax({
                    url: '<?= base_url(); ?>admin/get_plan_kom',
                    method: 'POST',
                    data: {
                        sub_id: sub_id
                    },
                    success: function(data) {
                        $('#tpk').html(data)
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#xp').change(function() {
                var nik = $(this).val();
                $.ajax({
                    url: '<?= base_url(); ?>admin/get_jabatan',
                    method: 'POST',
                    data: {
                        nik: nik
                    },
                    success: function(data) {
                        $('#xjab').html(data)
                    }
                });
            });
        });
    </script>
</body>