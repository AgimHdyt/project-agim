<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="" class="btn btn-warning add-new-pasien" data-toggle="modal" data-target="#add-new-pasien">Add New Pasien</a>
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
                        <th>Tangga Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Phone</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($pasiens as $p) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p->nama; ?></td>
                            <td><?= $p->tgl_lahir; ?></td>
                            <td><?= $p->jenis_kelamin; ?></td>
                            <td><?= $p->phone; ?></td>
                            <td><?= $p->umur; ?></td>
                            <td><?= $p->alamat; ?></td>
                            <td>
                                <a href="" class="btn btn-success edit-pasien" data-toggle="modal" data-target="#add-new-pasien" data-id="<?= $p->id; ?>"><i class="far fa-edit"></i></a>
                                <form method="post" action="<?= base_url('/del-pasien') . '/' . $p->id; ?>" class="d-inline">
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

<div class="modal fade" id="add-new-pasien" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('/add-pasien'); ?>">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Nama Lengkap">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control <?= $validation->hasError('tgl_lahir') ? 'is-invalid' : ''; ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telephon</label>
                        <input type="text" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="Nomor Telephon">
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select type="text" class="form-control <?= $validation->hasError('jenis_kelamin') ? 'is-invalid' : ''; ?>" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">--pilih--</option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" class="form-control <?= $validation->hasError('umur') ? 'is-invalid' : ''; ?>" name="umur" id="umur" placeholder="Umur">
                        <div class="invalid-feedback">
                            <?= $validation->getError('umur'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
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