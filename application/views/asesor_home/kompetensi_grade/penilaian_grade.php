<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('asesor') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('asesor/kompetensi_grade') ?>">Grade Kompetensi</a></li>
            <li class="breadcrumb-item active" aria-current="">Create Grade Kompetensi</a></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Create Grade Kompetensi</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <?= validation_errors() ?>
                    <form action="<?= base_url('asesor/penilaian_grade')  ?>" method="POST"
                        enctype="multipart/form-data">
                        <input type="hidden" name="nik_kar" value="<?= $nik_kar ?>">
                        <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
                        <input type="hidden" name="section" value="<?= $section ?>">
                        <table class="table table-bordered" width="100%" cellspacing="0">
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
                                        <input type="checkbox" id="subscribeNews" name="nilai[]"
                                            value="<?= $x->id_grade ?>" />
                                    </td>
                                </tr>
                                <?php   } ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <?php 
                            if ($data == false) {
                                
                            }else{ ?>

                            <button class="btn btn-success">Simpan</button>
                            <?php }
                            ?>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
    $(document).ready(function () {
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