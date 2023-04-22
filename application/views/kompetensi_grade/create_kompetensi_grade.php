<body class="bg-gradient-success">
    <div class="mbr-slider slide carousel" data-keyboard="false" data-ride="carousel" data-interval="2000"
        data-pause="true">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <!-- Page Heading -->
                                    <div class="card">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold ">Create Grade Kompetensi</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <?= validation_errors() ?>
                                                    <form
                                                        action="<?= base_url('admin/proses_tambah_grade_kompetensi')  ?>"
                                                        method="POST" enctype="multipart/form-data">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Karyawan</td>
                                                                <td><select name="nik" id="xp"
                                                                        class="form-control  selectpicker"
                                                                        data-live-search="true">
                                                                        <option value="">--PILIH karyawan--</option>
                                                                        <?php foreach ($kar as $karyawan) { ?>
                                                                        <option value="<?= $karyawan->nik ?>">
                                                                            <?= $karyawan->nama ?> |
                                                                            <?= $karyawan->nik ?></option>
                                                                        <?php } ?>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Jabatan Level</td>
                                                                <td><select name="xjab" id="xjab" class="form-control"
                                                                        disabled>
                                                                        <?php
                                                                             ?>
                                                                    </select></td>
                                                            </tr>
                                                            <tr>
                                                                <td width=20%>Tanggal</td>
                                                                <td><input type="date" name="tanggal"
                                                                        class="form-control" required
                                                                        placeholder="Tanggal"></td>    
                                                            </tr>
                                                        </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped-columns" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Grade</th>
                                                                <th>Level Grade</th>
                                                                <th>Nama Section</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $nomor = 1;
                                                                foreach ($data as $x) { ?>
                                                            <tr>
                                                                <td><?= $nomor++; ?></td>
                                                                <td><?= $x->nama_grade; ?></td>
                                                                <td align="center"><?= $x->level_grade; ?></td>
                                                                <td align="center"><?= $x->nama_dep; ?></td>
                                                                <td align="center">
                                                                    <input type="checkbox" name="nilai[]"
                                                                        value="<?= $x->id_grade; ?>"> Lulus
                                                                </td>
                                                            </tr>
                                                            <?php   } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-success">Simpan</button>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </div>
                                        </form>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#opt_kom').change(function () {
                                                    var id = $(this).val();
                                                    $.ajax({
                                                        url: '<?= base_url(); ?>admin/get_plan',
                                                        method: 'POST',
                                                        data: {
                                                            id: id
                                                        },
                                                        success: function (data) {
                                                            $('#opt_plan').html(data)
                                                        }
                                                    });
                                                });
                                            });
                                            $(document).ready(function () {
                                                $('#opt_plan').change(function () {
                                                    var sub_id = $(this).val();
                                                    $.ajax({
                                                        url: '<?= base_url(); ?>admin/get_plan_kom',
                                                        method: 'POST',
                                                        data: {
                                                            sub_id: sub_id
                                                        },
                                                        success: function (data) {
                                                            $('#tpk').html(data)
                                                        }
                                                    });
                                                });
                                            });
                                            $(document).ready(function () {
                                                $('#xp').change(function () {
                                                    var nik = $(this).val();
                                                    $.ajax({
                                                        url: '<?= base_url(); ?>admin/get_jabatan',
                                                        method: 'POST',
                                                        data: {
                                                            nik: nik
                                                        },
                                                        success: function (data) {
                                                            $('#xjab').html(data)
                                                        }
                                                    });
                                                });
                                            });

                                            $$(document).ready(function () {
                                                var table = $('#example').DataTable({
                                                    'ajax': 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json',
                                                    'columnDefs': [{
                                                        'targets': 0,
                                                        'render': function (data, type, row,
                                                            meta) {
                                                            if (type === 'display') {
                                                                data =
                                                                    '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                                                            }

                                                            return data;
                                                        },
                                                        'checkboxes': {
                                                            'selectRow': true,
                                                            'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                                                        }
                                                    }],
                                                    'select': 'multi',
                                                    'order': [
                                                        [1, 'asc']
                                                    ]
                                                });
                                            });
                                        </script>
