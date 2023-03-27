<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">View Assessment</h6>
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
                            <th>Plan</th>
                            <th>Level Kompetensi</th>
                            <th>Nilai Level</th>
                            <th>Nilai Karyawan</th>
                            <th>Tambah Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->nama_plan; ?></td>
                                <td><?= $x->target_p; ?></td>
                                <td align="center"><?= $x->nilai_lp; ?></td>
                               
                                <?php  
                                $model = $this->load->model('Assessment_m');
                                $x_assessment = $this->assessment_m->get_assessment($nik,$x->id_plan_t);
                                 ?>  
                                <td align="center"> 
                                    <?php
                                    if ($x_assessment == true) {
                                        echo $x_assessment->h_kom;
                                    }elseif($x_assessment == false){
                                        echo "Nilai Kosong";
                                    }
                                        ?>
                                </td>
                                <td align="center">
                                    <a href="<?= base_url('admin/nilai_assessment/') . $x->id_plan_t."/".$nik ?>" class="btn btn-danger">Hapus</a>
                                    <a href="<?= base_url('admin/edit_plan/') . $x->id_plan_t; ?>" class="btn btn-primary">Edit</a>
                                    <?php
                                    if ($x_assessment == true) {
                                      
                                    }elseif($x_assessment == false){?>
                                        <a href="<?= base_url('admin/create_nilaiassessment/') . $nik ."/". $x->id_plan_t; ?>" class="btn btn-primary">Tambah Nilai</a>
 
                                  <?php  }
                                        ?>
                               </td>
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