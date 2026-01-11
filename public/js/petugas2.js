$(function () {

    // pasien
    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Pasien');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/pasien/tambah');
    });

    $('.tampilModalUbahPasien').on('click', function () {

        $('#formModalLabel').html('Ubah Data Pasien');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/pasien/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/petugas/pasien/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nik').val(data.nik);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#umur').val(data.umur);
                $('#no_hp').val(data.no_hp);
                $('#alamat').val(data.alamat);

            }
        });
    });

    // Dokter
    $('.tombolTambahDataDokter').on('click', function () {
        $('#formModalLabel').html('Tambah Data Dokter');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/dokter/tambah');
    });

    $('.tampilModalUbahDokter').on('click', function () {
        $('#formModalLabel').html('Ubah Data Dokter');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/dokter/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/petugas/dokter/getubah',
            method: 'post',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nip').val(data.nip);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#spesialis').val(data.spesialis);
                $('#no_hp').val(data.no_hp);
                $('#email').val(data.email);
            }
        });
    });

    // sampel
    $('.tombolTambahDataSampelsa').on('click', function () {
        $('#formModalLabel').html('Tambah Data Sampel');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/sampel/tambah');
    });

    $('.tampilModalUbahSampel').on('click', function () {

        $('#formModalLabel').html('Ubah Data Sampel');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/sampel/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/petugas/sampel/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#no_lab').val(data.no_lab);
                $('#id_pasien').val(data.id_pasien);
                $('#id_dokter').val(data.id_dokter);
                $('#jenis_sampel').val(data.jenis_sampel);
                $('#anatomi').val(data.anatomi);
                $('#tanggal_masuk').val(data.tanggal_masuk);
                $('#kondisi_sampel').val(data.kondisi_sampel);
            }
        });
    });

    // Pemeriksaan
    $('.tombolTambahDataPemeriksaan').on('click', function () {
        $('#formModalLabel').html('Tambah Data Pemeriksaan');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.tampilModalUbahPemeriksaan').on('click', function () {

        $('#formModalLabel').html('Ubah Data Pemeriksaan');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/petugas/pemeriksaan/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/petugas/pemeriksaan/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#gambar').val('');
                $('#id_pasien').val(data.id_pasien);
                $('#id_dokter').val(data.id_dokter);
                $('#id_sampel').val(data.id_sampel);
                $('#role').val(data.role);
                $('#email').val(data.email);

            }
        });
    });
});