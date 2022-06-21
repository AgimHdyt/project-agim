<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="" class="btn btn-warning add-new-berobat" data-toggle="modal" data-target="#add-new-berobat">Add New Berobat</a>
    </div>

    <div class="card m-3">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Nama Pasien</th>
                        <th>Tanngal Berobat</th>
                        <th>Keluhan</th>
                        <th>Hasil Diagnosa</th>
                        <th>Jenis Berobat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = \Config\Database::connect();
                    $i = 1;
                    foreach ($berobats as $b) : ?>
                        <?php
                        $dokter = $db->table('tb_dokter')->getWhere(['id' => $b->id_dokter])->getRowObject();
                        $pasien = $db->table('tb_pasien')->getWhere(['id' => $b->id_pasien])->getRowObject();
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <?= $dokter->nama; ?>
                            </td>
                            <td>
                                <?= $pasien->nama; ?>
                            </td>
                            <td><?= $b->tgl_berobat; ?></td>
                            <td><?= $b->keluhan; ?></td>
                            <td><?= $b->hasil_diagnosa; ?></td>
                            <td><?= $b->jenis_berobat; ?></td>
                            <td>
                                <a href="" class="btn btn-success edit-berobat" data-toggle="modal" data-target="#add-new-berobat" data-id="<?= $b->id; ?>"><i class="far fa-edit"></i></a>
                                <form method="post" action="<?= base_url('/del-resep') . '/' . $b->id; ?>" class="d-inline">
                                    <input type="hidden" name="_method" id="delete" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="add-new-berobat" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Berobat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('/add-berobat'); ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="id_dokter">Nama Dokter</label>
                        <select class="form-control <?= $validation->hasError('id_doktor') ? 'is-invalid' : ''; ?>" id="id_dokter" name="id_dokter">
                            <option value="">--pilih--</option>
                            <?php foreach ($dokters as $d) : ?>
                                <option value="<?= $d->id; ?>"><?= $d->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_dokter'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_pasien">Nama Pasien</label>
                        <select class="form-control <?= $validation->hasError('id_pasien') ? 'is-invalid' : ''; ?>" id="id_pasien" name="id_pasien">
                            <option value="">--pilih--</option>
                            <?php foreach ($pasiens as $p) : ?>
                                <option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_pasien'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_berobat">Tanggal Berobat</label>
                        <input type="date" class="form-control <?= $validation->hasError('tgl_masuk') ? 'is-invalid' : ''; ?>" id="tgl_berobat" name="tgl_berobat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_berobat'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea type="text" class="form-control <?= $validation->hasError('keluhan') ? 'is-invalid' : ''; ?>" id="keluhan" name="keluhan" placeholder="Keluhan"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('keluhan'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hasil_diagnosa">Hasil Diagnosa</label>
                        <textarea type="text" class="form-control <?= $validation->hasError('hasil_diagnosa') ? 'is-invalid' : ''; ?>" id="hasil_diagnosa" name="hasil_diagnosa" placeholder="Hasil Diagnosa"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hasil_diagnosa'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_berobat">Jenis Berobat</label>
                        <select class="form-control <?= $validation->hasError('jenis_berobat') ? 'is-invalid' : ''; ?>" id="jenis_berobat" name="jenis_berobat">
                            <option value="">--pilih--</option>
                            <option value="Rawat Jalan">Rawat Jalan</option>
                            <option value="Rawat Inap">Rawat Inap</option>
                            <option value="Rujuk">Rujuk</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_berobat'); ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?= $this->endSection(); ?>