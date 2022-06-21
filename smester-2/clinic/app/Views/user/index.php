<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <?php
    $db = \Config\Database::connect();

    $users = $db->table('tb_user')->countAllResults();
    $pasien = $db->table('tb_pasien')->countAllResults();
    $dokter = $db->table('tb_dokter')->countAllResults();
    $obat = $db->table('tb_obat')->countAllResults();
    ?>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-pills"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Stok Obat</span>
                    <span class="info-box-number"><?= $obat; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Dokter</span>
                    <span class="info-box-number"><?= $dokter; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="far fa-address-book"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pasien</span>
                    <span class="info-box-number"><?= $pasien; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Members</span>
                    <span class="info-box-number"><?= $users; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="card m-3">
        <div class="card-body">
            <p>Selamat Datang <strong><?= $user->nama; ?></strong> di halaman <strong><?= $user->level; ?></strong> anda login sebagai <strong><?= $user->level; ?></strong>.</p>
        </div>
        <!-- /.card-body -->
    </div>

    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<?= $this->endSection(); ?>