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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            Data Tabungan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Id Kelas</th>
                            <th>Saldo</th>
                            <th>Tahun Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data['siswa'] as $s) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $s['nisn']; ?></td>
                                <td><?= $s['nama']; ?></td>
                                <td><?= $s['jk']; ?></td>
                                <td><?= $s['id_kelas']; ?></td>
                                <td>
                                    <?php $total = $this->model('Petugas_model')->getTotalSaldoNisn($s['nisn']);
                                    echo $this->rupiah($total['ts']);
                                    ?>
                                </td>
                                <td><?= date("D, j M Y", $s['th_masuk']); ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/petugas/detailtabungan/<?= $s['nisn']; ?>" class="btn btn-primary"><i class="fas fa-clipboard-list"></i></a>
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