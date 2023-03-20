<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Kompetensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="container">
                    <a href="<?= base_url('admin/create_task_kompetensi') ?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Kompetensi</a>
                    <hr>
                </div>
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
                            <th>Nik</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Section</th>
                            <th>Tanggal</th>
                            <th>View Kompetensi</th>
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
                            
                            // variabel pecahkan 0 = tanggal
                            // variabel pecahkan 1 = bulan
                            // variabel pecahkan 2 = tahun
                         
                            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                        }
                         
                        echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017
                         
                        echo "<br/>";
                        echo "<br/>";
                         
                      
                        $nomor = 1;
                        foreach ($data as $x) { 
                            if ($x->date_kom == true) { ?>
                                <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nik; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->nama_jab; ?></td>
                                <td><?= $x->nama_sec; ?></td>
                                <td><?= tgl_indo($x->date_kom); ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/view_kompetensi/') . $x->nik; ?>" class="btn btn-success">View Kompetensi</a>
                                </td>
                            </tr>
                         <?php   }else{

                            }
                            ?>
                          
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