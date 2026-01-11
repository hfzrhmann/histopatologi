// sampel
$('.tombolTambahDataSampelsa').on('click', function () {
    $('#formModalLabel').html('Tambah Data Sampel');
    $('.modal-footer button[type=submit]').html('Tambah Data');
});

$('.tampilModalUbahSampel').on('click', function () {

    $('#formModalLabel').html('Ubah Data Sampel');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.modal-body form').attr('action', 'http://localhost/histopatologi/public/admin/sampel/ubah');

    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/histopatologi/public/admin/sampel/getubah',
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