<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Data Continues Improvement
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>pembuat</th>
                            <th>Tanggal Implementasi</th>
                            <th>Tim Terlibat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($continuesimprovement as $x) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $x->judul; ?></td>
                                <td><?= $x->nama; ?></td>
                                <td><?= $x->t_implementasi; ?></td>
                                <?php
                                $model = $this->load->model('ci_m');
                                $citt = $this->ci_m->get_tim_ci($x->tim);
                                ?>
                                <td> <?php
                                        foreach ($citt as $ok) {
                                            echo $ok->nama_tim;
                                            echo "
                                    <hr>";
                                        }
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