<script>
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        // Edit Data User
        $('.add-new-user').on('click', function() {
            $('.modal-title').html('Add New User');
            $('.modal-footer button[type=submit]').html('Add');
            $('.modal-body form').attr('action', '<?= base_url('/add-user'); ?>');

            $('#id').val('');
            $('#nama').val('');
            $('#username').val('');
            $('#password').val('');
            $('#alamat').val('');
            $('#level').val('');

        });

        $('.edit-user').on('click', function() {
            $('.modal-title').html('Edit Data User');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('/edit-user'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('/get-user') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#username').val(data.username);
                    $('#alamat').val(data.alamat);
                    $('#level').val(data.level);
                }
            });

        });
        // ./Edit Data User

        // Edit Data Dokter
        $('.add-new-dokter').on('click', function() {
            $('.modal-title').html('Add New Dokter');
            $('.modal-footer button[type=submit]').html('Add');
            $('.modal-body form').attr('action', '<?= base_url('/add-dokter'); ?>');

            $('#id').val('');
            $('#nama').val('');
            $('#jenis').val('');
            $('#alamat').val('');

        });

        $('.edit-dokter').on('click', function() {
            $('.modal-title').html('Edit Data Dokter');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('/edit-dokter'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('/get-dokter') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#jenis').val(data.jenis);
                    $('#alamat').val(data.alamat);
                }
            });
        });
        // ./Edit Data Dokter

        // Edit Data Pasien
        $('.add-new-pasien').on('click', function() {
            $('.modal-title').html('Add New Pasien');
            $('.modal-footer button[type=submit]').html('Add');
            $('.modal-body form').attr('action', '<?= base_url('/add-pasien'); ?>');

            $('#id').val('');
            $('#nama').val('');
            $('#tgl_lahir').val('');
            $('#jenis_kelamin').val('');
            $('#phone').val('');
            $('#umur').val('');
            $('#alamat').val('');

        });

        $('.edit-pasien').on('click', function() {
            $('.modal-title').html('Edit Data Pasien');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('/edit-pasien'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('/get-pasien') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#tgl_lahir').val(data.tgl_lahir);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#phone').val(data.phone);
                    $('#umur').val(data.umur);
                    $('#alamat').val(data.alamat);
                }
            });
        });
        // ./Edit Data Dokter

        // Edit Data Obat
        $('.add-new-obat').on('click', function() {
            $('.modal-title').html('Add New Obat');
            $('.modal-footer button[type=submit]').html('Add');
            $('.modal-body form').attr('action', '<?= base_url('/add-obat'); ?>');

            $('#id').val('');
            $('#nama').val('');
            $('#satuan').val('');
            $('#harga').val('');
            $('#keterangan').val('');

        });

        $('.edit-obat').on('click', function() {
            $('.modal-title').html('Edit Data Obat');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('/edit-obat'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('/get-obat') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#satuan').val(data.satuan);
                    $('#harga').val(data.harga);
                    $('#keterangan').val(data.keterangan);
                }
            });
        });
        // ./Edit Data Obat

        // Edit Data Resep
        $('.add-new-resep').on('click', function() {
            $('.modal-title').html('Add New Resep');
            $('.modal-footer button[type=submit]').html('Add');
            $('.modal-body form').attr('action', '<?= base_url('/add-resep'); ?>');

            $('#id').val('');
            $('#id_berobat').val('');
            $('#id_obat').val('');
            $('#nama_obat').val('');
            $('#qty').val('');
            $('#harga').val('');
            $('#dokter_fee').val('');

        });

        $('.edit-resep').on('click', function() {
            $('.modal-title').html('Edit Data Resep');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('/edit-resep'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('/get-resep') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#id_berobat').val(data.id_berobat);
                    $('#id_obat').val(data.id_obat);
                    $('#nama_obat').val(data.nama_obat);
                    $('#qty').val(data.qty);
                    $('#harga').val(data.harga);
                    $('#dokter_fee').val(data.docter_fee);
                }
            });
        });
        // ./Edit Data Obat

        // Edit Data Berobat
        $('.add-new-berobat').on('click', function() {
            $('.modal-title').html('Add New Berobat');
            $('.modal-footer button[type=submit]').html('Add');
            $('.modal-body form').attr('action', '<?= base_url('/add-berobat'); ?>');

            $('#id').val('');
            $('#id_dokter').val('');
            $('#id_pasien').val('');
            $('#tgl_berobat').val('');
            $('#keluhan').val('');
            $('#hasil_diagnosa').val('');
            $('#jenis_berobat').val('');

        });

        $('.edit-berobat').on('click', function() {
            $('.modal-title').html('Edit Data Resep');
            $('.modal-footer button[type=submit]').html('Edit');
            $('.modal-body form').attr('action', '<?= base_url('/edit-berobat'); ?>');

            const id = $(this).data('id');

            $.ajax({
                url: "<?= base_url('/get-berobat') ?>",
                data: {
                    id: id
                },
                method: "post",
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.id);
                    $('#id_dokter').val(data.id_dokter);
                    $('#id_pasien').val(data.id_pasien);
                    $('#tgl_berobat').val(data.tgl_berobat);
                    $('#keluhan').val(data.keluhan);
                    $('#hasil_diagnosa').val(data.hasil_diagnosa);
                    $('#jenis_berobat').val(data.jenis_berobat);
                }
            });
        });
        // ./Edit Data Obat
    });
</script>