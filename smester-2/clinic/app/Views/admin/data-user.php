<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="" class="btn btn-warning add-new-user" data-toggle="modal" data-target="#add-new-user">Add New User</a>
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
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($users as $u) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $u->username; ?></td>
                            <td><?= $u->nama; ?></td>
                            <td><?= $u->alamat; ?></td>
                            <td><?= $u->level; ?></td>
                            <td>
                                <a href="" class="btn btn-success edit-user" data-toggle="modal" data-target="#add-new-user" data-id="<?= $u->id; ?>"><i class="far fa-edit"></i></a>
                                <form method="post" action="<?= base_url('/del-user') . '/' . $u->id; ?>" class="d-inline">
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

<div class="modal fade" id="add-new-user" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url('/add-user'); ?>">
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
                        <label for="username">Username</label>
                        <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select class="form-control <?= $validation->hasError('level') ? 'is-invalid' : ''; ?>" id="level" name="level">
                            <option value="">--pilih--</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                            <option value="Owner">Owner</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('level'); ?>
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