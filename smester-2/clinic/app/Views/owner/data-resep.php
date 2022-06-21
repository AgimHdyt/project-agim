<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="" class="btn btn-warning add-new-resep" data-toggle="modal" data-target="#add-new-resep">Add New Resep</a>
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
                        <th>Keluhan</th>
                        <th>Obat</th>
                        <th>Nama Obat</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Dokter Fee</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = \Config\Database::connect();
                    $i = 1;
                    foreach ($reseps as $r) : ?>
                        <?php
                        $berobat = $db->table('tb_berobat')->getWhere(['id' => $r->id_berobat])->getRowObject();
                        $obat = $db->table('tb_obat')->getWhere(['id' => $r->id_obat])->getRowObject();
                        ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $berobat->keluhan; ?></td>
                            <td><?= $obat->nama; ?></td>
                            <td><?= $r->nama_obat; ?></td>
                            <td><?= $r->qty; ?></td>
                            <td><?= 'Rp.' . number_format($r->harga, 2, ',', '.'); ?></td>
                            <td><?= 'Rp.' . number_format($r->docter_fee, 2, ',', '.'); ?></td>
                            <td>
                                <a href="" class="btn btn-success edit-resep" data-toggle="modal" data-target="#add-new-resep" data-id="<?= $r->id; ?>"><i class="far fa-edit"></i></a>
                                <form method="post" action="<?= base_url('/del-resep') . '/' . $r->id; ?>" class="d-inline">
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

<div class="modal fade" id="add-new-resep" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Resep</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('/add-resep'); ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="id_berobat">Keluhan Berobat</label>
                        <select class="form-control <?= $validation->hasError('id_berobat') ? 'is-invalid' : ''; ?>" id="id_berobat" name="id_berobat">
                            <option value="">--pilih--</option>
                            <?php foreach ($berobats as $b) : ?>
                                <option value="<?= $b->id; ?>"><?= $b->keluhan; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_berobat'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_obat">Obat</label>
                        <select class="form-control <?= $validation->hasError('id_obat') ? 'is-invalid' : ''; ?>" id="id_obat" name="id_obat">
                            <option value="">--pilih--</option>
                            <?php foreach ($obats as $o) : ?>
                                <option value="<?= $o->id; ?>"><?= $o->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_obat'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control <?= $validation->hasError('nama_obat') ? 'is-invalid' : ''; ?>" id="nama_obat" name="nama_obat" placeholder="Nama Obat">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_obat'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="number" class="form-control <?= $validation->hasError('qty') ? 'is-invalid' : ''; ?>" id="qty" name="qty" placeholder="Qty">
                        <div class="invalid-feedback">
                            <?= $validation->getError('qty'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : ''; ?>" id="harga" name="harga" placeholder="Harga">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dokter_fee">Dokter Fee</label>
                        <input type="number" class="form-control <?= $validation->hasError('dokter_fee') ? 'is-invalid' : ''; ?>" id="dokter_fee" name="dokter_fee" placeholder="Dokter Fee">
                        <div class="invalid-feedback">
                            <?= $validation->getError('dokter_fee'); ?>
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