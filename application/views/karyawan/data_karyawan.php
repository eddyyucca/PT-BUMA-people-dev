<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header">
                <b>Data Karyawan</b>
            </div>
            <div class="card-body">

                <div class="row">
                    <!-- foreach data karyawan -->
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

                    <div class="container">
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Upload Data Karyawan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <nav class="navbar ">
                            <form class="form-inline" action="<?= base_url('asesor/search_data_karyawan')  ?>" method="POST">
                                <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </nav>
                        <hr>
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-8 col-lg-6">
                                <!-- Section Heading-->

                            </div>
                        </div>
                        <div class="row">
                            <!-- Single Advisor-->
                            <?php foreach ($data as $kar) : ?>

                                <div class="col-12 col-sm-6 col-lg-3">
                                    <a href="<?= base_url('admin/view_karyawan/') . $kar->nik ?>">
                                        <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                            <!-- Team Thumb-->
                                            <div class="advisor_thumb">
                                                <?php if ($kar->foto == false) { ?>
                                                    <img src="<?= base_url('assets') ?>/profil_default.png" class="rounded" width="185" height="183" alt="Foto Profil">
                                                <?php  } elseif ($kar->foto == true) { ?>

                                                    <img src="<?= base_url('assets/foto_profil/') . $kar->foto ?>" class="rounded" width="200" height="200" alt="Foto Profil">
                                                <?php  } ?>
                                            </div>
                                            <!-- Team Details-->
                                            <div class=" text-secondary single_advisor_details_info">
                                                <h6><?= $kar->nama ?></h6>

                                                <p class="designation"><?= $kar->nama_jab  ?> - <?= $kar->nama_dep ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                            endforeach; ?>
                            <!-- Single Advisor-->
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <div class="row">
                    <div class="col">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>