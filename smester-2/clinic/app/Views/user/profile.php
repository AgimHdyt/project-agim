<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('/assets/dist/img') . '/' . $user->image; ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $user->username; ?></h3>

                        <p class="text-muted text-center"><?= $user->nama; ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="#edit-password" data-toggle="tab">Edit Password</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="edit-password">

                                <form class="form-horizontal" action="<?= base_url('/edit-password'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" id="id" value="<?= $user->id; ?>">
                                    <div class="form-group row">
                                        <label for="now_password" class="col-sm-3 col-form-label">Now password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control <?= $validation->hasError('now_password') ? 'is-invalid' : ''; ?>" id="now_password" name="now_password" placeholder="Now Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('now_password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-sm-3 col-form-label">New password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control <?= $validation->hasError('new_password') ? 'is-invalid' : ''; ?>" id="new_password" name="new_password" placeholder="Now Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('new_password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="current_password" class="col-sm-3 col-form-label">Current password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control <?= $validation->hasError('current_password') ? 'is-invalid' : ''; ?>" id="current_password" name="current_password" placeholder="Current Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('current_password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-warning">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane active" id="settings">
                                <form method="post" action="<?= base_url('/edit-profile'); ?>" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" id="id" value="<?= $user->id; ?>">
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->nama; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2">Picture</div>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <img src="<?= base_url('/assets/dist/img') . '/' . $user->image; ?>" class="img-thumbnail">
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image" name="image">
                                                        <label class="custom-file-label" for="image"><?= $user->image; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-10">
                                            <a href="<?= base_url('/profile'); ?>" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>