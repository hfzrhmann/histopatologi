$(function () {

    // pasien
    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Pasien');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.tampilModalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data Pasien');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/admin/pasien/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/admin/pasien/getubah',
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
    });

    $('.tampilModalUbahDokter').on('click', function () {
        $('#formModalLabel').html('Ubah Data Dokter');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/admin/dokter/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/admin/dokter/getubah',
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
});