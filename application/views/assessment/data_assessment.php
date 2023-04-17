<div class="content-body">
    <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
            <h6 class="m-0 font-weight-bold ">Data Assessment</h6>
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
                <table id="example" class="display" style="min-width: 845px">
                    <thead>
                            <th>No</th>
                            <th>Asesor</th>
                            <th>Karyawan</th>
                            <th>Jabatan</th>
                            <th>Section</th>
                            <th>Tanggal</th>
                            <th>View</th>
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
                        $nomor = 1;
                        foreach ($data as $x) { 
                            if ($x->date_kom == true) { ?>
                                <tr>
                                <td><?= $nomor++; ?></td>
                                <td>
                                <?php  
                                $model = $this->load->model('karyawan_m');
                                $asesor = $this->karyawan_m->get_row_nik($x->asesor);
                                 ?>      
                                <?= $asesor->nama ?>
                                <footer class="blockquote-footer">NIK - <?= $x->nik ?></footer>
                                 
                            </td>
                                <td><?= $x->nama; ?>
                                <footer class="blockquote-footer">NIK - <?= $x->nik ?></footer>
                            </td>
                                <td><?= $x->nama_jab; ?></td>
                                <td><?= $x->nama_sec; ?></td>
                                <td><?= tgl_indo($x->date_kom); ?></td>
                                <td align="center">
                                    <a href="<?= base_url('admin/create_assessment/') . $x->id_jab ."/".$x->nik ?>" class="btn btn-success">View Assessment</a>
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