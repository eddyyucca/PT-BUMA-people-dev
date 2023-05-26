<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/kompetensi_grade') ?>">Grade Kompetensi</a></li>
            <li class="breadcrumb-item active" aria-current="">Nilai Grade Kompetensi</a></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Grade Kompetensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if ($this->session->flashdata('pesan') == "hapus") { ?>
                <div class="alert alert-danger" role="alert">Data Berhasil Di Hapus !
                </div>
                <?php   } elseif ($this->session->flashdata('pesan') == "buat") { ?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil Di Tambah !
                </div>
                <?php    } elseif ($this->session->flashdata('pesan') == "ubah") { ?>
                <div class="alert alert-warning" role="alert">
                    Data Berhasil Di Ubah !
                </div>
                <?php    }  elseif ($this->session->flashdata('pesan') == "sudahada") { ?>
                <div class="alert alert-warning" role="alert">
                    Data Sudah Di Buat !
                </div>
                <?php    } ?>
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Grade</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function tgl_indo($tanggal){
                            $bulan = array (
                                1 =>   'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            );
                            $pecahkan = explode('-', $tanggal); 
                            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                        }
                        $nomor = 1;
                        foreach ($data as $x) { 
                            // if ($x->tanggal_grade == true) { ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $x->nama_grade ?></td>
                            <td align="center">
                                <?php 
                                foreach ($data_sc as $sc) { 
                                        if ($x->id_grade == $sc->grade) {
                                        echo "Lulus";
                                        }
                                    }
                                      ?> </td>
                        </tr>
                        <?php   } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('flash_message')) : ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('flash_message'); ?>",
        timer: 1500,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<?php endif; ?>