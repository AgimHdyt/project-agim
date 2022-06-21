<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="" class="btn btn-warning add-new-obat" data-toggle="modal" data-target="#add-new-obat">Add New Obat</a>
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
                        <th>Nama</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($obats as $o) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $o->nama; ?></td>
                            <td><?= $o->satuan; ?></td>
                            <td><?= $o->harga; ?></td>
                            <td><?= $o->keterangan; ?></td>
                            <td>
                                <a href="" class="btn btn-success edit-obat" data-toggle="modal" data-target="#add-new-obat" data-id="<?= $o->id; ?>"><i class="far fa-edit"></i></a>
                                <form method="post" action="<?= base_url('/del-obat') . '/' . $o->id; ?>" class="d-inline">
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

<div class="modal fade" id="add-new-obat" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('/add-obat'); ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama Obat</label>
                        <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama Lengkap">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control <?= $validation->hasError('satuan') ? 'is-invalid' : ''; ?>" name="satuan" id="satuan" placeholder="Satuan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('satuan'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control <?= $validation->hasError('harga') ? 'is-invalid' : ''; ?>" name="harga" id="harga" placeholder="Harga">
                        <div class="invalid-feedback">
                            <?= $validation->getError('harga'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
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