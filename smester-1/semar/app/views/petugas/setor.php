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
                    <h6 class="m-0 font-weight-bold text-primary">Total Penyetoran</h6>
                </div>
                <!-- Card Content - Collapse -->
                <div class="card-body">
                    <h1>
                        <?php $jSt =  $this->model('Petugas_model')->getTotalSetor('Setor');
                        echo $this->rupiah($jSt['total']); ?>
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
                <button type="button" class="btn btn-primary tambahsetor" data-toggle="modal" data-target="#tambahsetor">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
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
                            <th>Petugas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data['setor'] as $st) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $st['nisn']; ?></td>
                                <td>
                                    <?php $siswa =  $this->model('Petugas_model')->getSiswa($st['nisn']); ?>
                                    <?= $siswa['nama']; ?>
                                </td>
                                <td><?= date("D, j M Y", $st['tgl']); ?></td>
                                <td>
                                    <?= $this->rupiah($st['setor']); ?>
                                </td>
                                <td>
                                    <?= $st['nama_petugas']; ?>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success editsetor" data-toggle="modal" data-target="#tambahsetor" data-id_tabungan="<?= $st['id_tabungan']; ?>"><i class="fas fa-user-edit"></i></a>
                                    <a href="<?= BASEURL; ?>/petugas/deleteSetor/<?= $st['id_tabungan']; ?>" onclick="return confirm('Apakah anda ingin menghapus data ini?');" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="tambahsetor" tabindex="-1" role="dialog" aria-labelledby="tambahsetorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsetorLabel">Tambah Data Penyetoran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= BASEURL; ?>/petugas/TSetor">
                    <input type="hidden" name="id_tabungan" id="id_tabungan">
                    <div class="form-group">
                        <label for="siswa">Siswa</label>
                        <select class="form-control" name="nisn" id="siswa">
                            <option>Siswa</option>
                            <?php foreach ($data['siswa'] as $s) : ?>
                                <option value="<?= $s['nisn']; ?>"><?= $s['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="saldo">Saldo Tabungan</label>
                        <input type="text" class="form-control" name="saldo" id="saldo" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="setor">Setoran</label>
                        <input type="text" class="form-control" name="setor" id="setor" placeholder="Jumlah setoran">
                    </div>
                    <input type="hidden" name="nama_petugas" id="nama_petugas" value="<?= $data['petugas']['nama']; ?>">
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>