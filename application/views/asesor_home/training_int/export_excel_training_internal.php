<?php
header("Content-type: application/vnd-ms-excel");
$date = date('Y-m-d');
header("Content-Disposition: attachment; filename=Data Training Internal.xls");
?>

<?php
function tanggal_indonesia($tanggal)
{
    $bulan = array(
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

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th>Nik</th>
                            <th>Training</th>
                            <th>Tanggal/Bulan/Tahun</th>
                            <th>Pemberi Materi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor = 1;
                        foreach ($data as $x) { ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $x->nama; ?></td>
                            <td><?= $x->nik; ?></td>
                            <td>
                                <?= $x->nama_training_opt; ?>
                            </td>
                            <td><?= tanggal_indonesia($x->mulai_t) . " - " . tanggal_indonesia($x->akhir_t) ?></td>
                            <?php
                                $model = $this->load->model('karyawan_m');
                                $pm = $this->karyawan_m->get_row_nik($x->p_materi);
                                ?>
                            <td>
                                <?php
                                            echo $pm->nama;
                                        ?>
                            </td>
                            </td>
                          
                        </tr>
                        <?php   } ?>
                    </tbody>
                </table>