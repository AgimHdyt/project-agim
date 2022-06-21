<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['title']; ?></h1>

    <!-- Alert flash message -->
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <!-- end alert flash message -->

    <div class="row alert alert-dismissible fade show" role="alert">
        <div class="col-lg">
            <!-- Collapsable Card Example -->
            <div class="card shadow">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- Card Header - Accordion -->
                <div class="d-block card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Total Saldo</h6>
                </div>
                <!-- Card Content - Collapse -->
                <div class="card-body">
                    <h1>
                        <?= $this->rupiah($data['total']['ts']); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <!-- <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6> -->
            <div class="dropdown no-arrow">
                <a href="<?= BASEURL; ?>/petugas/tabungan" class="btn btn-primary">
                    <i class="fas fa-long-arrow-alt-left"></i> Kembali
                </a>
                <!-- <button type="button" class="btn btn-outline-dark">
                    <i class="fas fa-print"></i> Cetak
                </button> -->
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Setoran</th>
                            <th>Penarikan</th>
                            <th>Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data['tabungan'] as $tb) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $tb['nisn']; ?></td>
                                <td>
                                    <?php $siswa =  $this->model('Petugas_model')->getSiswa($tb['nisn']); ?>
                                    <?= $siswa['nama']; ?>
                                </td>
                                <td><?= date("D, j M Y", $tb['tgl']); ?></td>
                                <td>
                                    <?= $this->rupiah($tb['setor']); ?>
                                </td>
                                <td>
                                    <?= $this->rupiah($tb['tarik']); ?>
                                </td>
                                <td>
                                    <?= $tb['nama_petugas']; ?>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->