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
                    <form action="<?= base_url('asesor/nilai_grade_kompetensi')  ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Karyawan</label>
                            <select name="nik_kar" id="xp" class="form-control  selectpicker" data-live-search="true">
                                <option value="">--PILIH karyawan--</option>
                                <?php foreach ($kar as $karyawan) { ?>
                                <option value="<?= $karyawan->nik ?>">
                                    <?= $karyawan->nama ?> |
                                    <?= $karyawan->nik ?></option>
                                <?php } ?>
                            </select>
                            <div class="form-group">
                                <label>Jabatan Level</label>
                                <select name="xjab" id="xjab" class="form-control">
                                    <?php
                                                                             ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Section</label>
                                <select name="section" id="section" class="form-control">
                                    <?php
                                                                             ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required placeholder="Tanggal">
                            </div>
                            <div class="form-group">

                                <button class="btn btn-success">Selanjutnya</button>
                            </div>
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
                url: '<?= base_url(); ?>asesor/get_plan',
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
                url: '<?= base_url(); ?>asesor/get_plan_kom',
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
                url: '<?= base_url(); ?>asesor/get_jabatan',
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
        $('#xp').change(function () {
            var nik = $(this).val();
            $.ajax({
                url: '<?= base_url(); ?>asesor/get_sec',
                method: 'POST',
                data: {
                    nik: nik
                },
                success: function (data) {
                    $('#section').html(data)
                }
            });
        });
    });
</script>