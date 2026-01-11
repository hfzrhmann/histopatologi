$(function () {

    // akun
    $('.tombolTambahDataAkun').on('click', function () {
        $('#formModalLabel').html('Tambah Data Akun');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    $('.tampilModalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data akun');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/admin/manajemenakun/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/histopatologi/public/admin/manajemenakun/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#username').val(data.username);
                $('#password').val('');
                $('#role').val(data.role);
                $('#email').val(data.email);

            }
        });
    });
});