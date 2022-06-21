<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="<?= BASEURL; ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= BASEURL; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= BASEURL; ?>/js/sb-admin-2.min.js"></script>


<script>
    $(document).ready(function() {
        $('#siswa').change(function() {
            var nisn = $(this).val();
            $.ajax({
                url: "<?= BASEURL; ?>/petugas/getSaldo",
                data: {
                    nisn: nisn
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#saldo').val(formatsetorsaldo(data.st, 'Rp.'));
                    // console.log(data);
                }
            });
        });
    });

    $(function() {
        $('.tambahSiswa').on('click', function() {
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/petugas/tambahSiswa');
            $('#nisn').removeAttr('readonly');
            $('#nisn').val('');
            $('#nama').val('');
            $('#jk').val('Jenis Kelamin');
            $('#id_kelas').val('');
            $('#status').val('Status');
            $('#tambahDataSiswaLabel').html('Tambah Data Siswa');
            $('.modal-footer button[type=submit]').html('Tambah');
        });

        $('.editSiswa').on('click', function() {
            $('#tambahDataSiswaLabel').html('Edit Data Siswa');
            $('#nisn').attr('readonly', 'on');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/petugas/editSiswa');

            const nisn = $(this).data('nisn');

            $.ajax({
                url: "<?= BASEURL; ?>/petugas/getSiswa",
                data: {
                    nisn: nisn
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#nisn').val(data.nisn);
                    $('#nama').val(data.nama);
                    $('#jk').val(data.jk);
                    $('#id_kelas').val(data.id_kelas);
                    $('#status').val(data.status);
                }

            });

        });
    });

    $(function() {
        $('.tambahPetugas').on('click', function() {
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/admin/tambahPetugas');
            $('#id_petugas').val('');
            $('#username').removeAttr('readonly');
            $('.form-group label[for=password]').removeClass('d-none');
            $('#password').removeClass('d-none');
            $('#username').val('');
            $('#nama').val('');
            $('#jk').val('Jenis Kelamin');
            $('#status').val('Status');
            $('#tambahDataPetugasLabel').html('Tambah Data Petugas');
            $('.modal-footer button[type=submit]').html('Tambah');
        });

        $('.editPetugas').on('click', function() {
            $('#tambahDataPetugasLabel').html('Edit Data Petugas');
            $('.form-group label[for=password]').addClass('d-none');
            $('#password').addClass('d-none');
            $('#username').attr('readonly', 'on');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/admin/editPetugas');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= BASEURL; ?>/admin/getPetugas",
                data: {
                    id_petugas: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#username').val(data.username);
                    $('#id_petugas').val(data.id_petugas);
                    $('#nama').val(data.nama);
                    $('#jk').val(data.jk);
                    $('#level').val(data.level);
                    $('#status').val(data.status);
                }

            });

        });
    });

    $(function() {
        $('.tambahsetor').on('click', function() {
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/petugas/TSetor');
            $('#tambahsetorLabel').html('Tambah Data Penyetoran');
            $('.modal-footer button[type=submit]').html('Tambah');
            $('#id_tabungan').val('');
            $('#siswa').val('Siswa');
            $('#saldo').val('');
            $('#setor').val('');
        });

        $('.editsetor').on('click', function() {
            $('#tambahsetorLabel').html('Edit Data Penyetoran');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/petugas/ESetor');



            const id_tabungan = $(this).data('id_tabungan');

            $.ajax({
                url: "<?= BASEURL; ?>/petugas/getSetor",
                data: {
                    id_tabungan: id_tabungan
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id_tabungan').val(data.id_tabungan);
                    $('#siswa').val(data.nisn);


                    var nisn = $('#siswa').val();

                    $.ajax({
                        url: "<?= BASEURL; ?>/petugas/getSaldo",
                        data: {
                            nisn: nisn
                        },
                        method: "post",
                        dataType: "json",
                        success: function(data) {
                            $('#saldo').val(formatsetor(data.st, 'Rp.'));
                            // console.log(data);
                        }
                    });
                    $('#setor').val(formatsetor(data.setor, 'Rp.'));

                }

            });

        });
    });

    $(function() {
        $('.tariksetor').on('click', function() {
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/petugas/TTarik');
            $('#tariksetorLabel').html('Tambah Data Penarikan');
            $('.modal-footer button[type=submit]').html('Tambah');
            $('#id_tabungan').val('');
            $('#siswa').val('Siswa');
            $('#saldo').val('');
            $('#tarik').val('');
        });

        $('.edittariksetor').on('click', function() {
            $('#tariksetorLabel').html('Edit Data Penarikan');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= BASEURL; ?>/petugas/ETarik');



            const id_tabungan = $(this).data('id_tabungan');

            $.ajax({
                url: "<?= BASEURL; ?>/petugas/getSetor",
                data: {
                    id_tabungan: id_tabungan
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id_tabungan').val(data.id_tabungan);
                    $('#siswa').val(data.nisn);


                    var nisn = $('#siswa').val();

                    $.ajax({
                        url: "<?= BASEURL; ?>/petugas/getSaldo",
                        data: {
                            nisn: nisn
                        },
                        method: "post",
                        dataType: "json",
                        success: function(data) {
                            $('#saldo').val(formatsetor(data.st, 'Rp.'));
                            // console.log(data);
                        }
                    });
                    $('#setor').val(formatsetor(data.tarik, 'Rp.'));

                }

            });

        });
    });

    var setor = document.getElementById('setor');
    setor.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatsetor() untuk mengubah angka yang di ketik menjadi format angka
        setor.value = formatsetor(this.value, 'Rp ');
    });

    /* Fungsi formatsetor */
    function formatsetor(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            setor = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            setor += separator + ribuan.join('.');
        }

        setor = split[1] != undefined ? setor + ',' + split[1] : setor;
        return prefix == undefined ? setor : (setor ? 'Rp ' + setor : '');
    }

    /* Fungsi formatsetor */
    function formatsetorsaldo(angka, prefix) {
        var number_string = angka.replace(/^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            setor = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            setor += separator + ribuan.join('.');
        }

        setor = split[1] != undefined ? setor + ',' + split[1] : setor;
        return prefix == undefined ? setor : (setor ? 'Rp ' + setor : '');
    }
</script>

</body>

</html>