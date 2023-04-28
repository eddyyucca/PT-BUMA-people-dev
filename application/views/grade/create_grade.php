<div class="container-fluid">
    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/data_grade') ?>">Grade</a></li>
            <li class="breadcrumb-item active" aria-current="">Create Grade</li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold ">Create Grade</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="container-fluid">
                                                        <?= validation_errors() ?>
                                                        <form action="<?= base_url('admin/proses_tambah_grade')  ?>"
                                                            method="POST" enctype="multipart/form-data">
                                                            <table class="table">
                                                                <tr>
                                                                    <td width=20%>Nama Grade</td>
                                                                    <td><input type="text" name="nama_grade"
                                                                            aria-describedby="basic-addon1"
                                                                            class="form-control" required
                                                                            placeholder="Nama Grade"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Yang Melakukan</td>
                                                                    <td><select name="level_grade"
                                                                            class="form-control  selectpicker"
                                                                            data-live-search="true">
                                                                            <option value="">--PILIH Level--</option>
                                                                            <option value="G1">G1</option>
                                                                            <option value="G2">G2</option>
                                                                            <option value="G3">G3</option>
                                                                            <option value="G4">G4</option>
                                                                            <option value="G5">G5</option>
                                                                            <option value="G6">G6</option>
                                                                            <option value="G7">G7</option>
                                                                            <option value="G8">G8</option>
                                                                            <option value="G9">G9</option>
                                                                            <option value="G10">G10</option>
                                                                        </select></td>
                                                                </tr>
                                                                <tr>
                                                                    <div class="mb-3 col-md-9">
                                                                        <td>Section</td>
                                                                        <td><select name="grade_section"
                                                                                class="form-control selectpicker"
                                                                                data-live-search="true">
                                                                                <option value="">--Pilih Section--
                                                                                </option>
                                                                                <?php foreach ($dep as $departement) { ?>
                                                                                <option
                                                                                    value="<?= $departement->id_dep ?>">
                                                                                    <?= $departement->nama_dep ?>
                                                                                </option>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </td>
                                                                    </div>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <button class="btn btn-success">Simpan</button>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>