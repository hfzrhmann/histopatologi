<div class="container mt-4">

    <!-- Judul -->
    <h3 class="text-center mb-4">Data Sampel Histopatologi</h3>

    <!-- Aksi Tambah & Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <!-- Tombol Tambah -->
        <a href="<?= BASEURLPETUGAS;?>/sampel" class="btn btn-primary btn-sm">Kembali</a>

        <!-- Form Pencarian -->
        <form action="" class="d-flex align-items-center">
            <label for="keyword" class="me-2 fw-semibold">Cari:</label>
            <input type="text" name="keyword" id="keyword" class="form-control form-control-sm"
                placeholder="Cari kode / nama pasien..." style="width: 220px;">
        </form>

    </div>

    <!-- Tabel Data Sampel -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Sampel</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Sampel</th>
                    <th>Tanggal Masuk</th>
                    <th>Dokter Pengirim</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>1</td>
                    <td>SP-001</td>
                    <td>Ahmad Fauzi</td>
                    <td>Jaringan Tumor</td>
                    <td>06-12-2025</td>
                    <td>dr. Siti Rahma</td>
                    <td><span class="badge bg-warning">Proses</span></td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>SP-002</td>
                    <td>Siti Aisyah</td>
                    <td>Biopsi Kulit</td>
                    <td>06-12-2025</td>
                    <td>dr. Budi Pratama</td>
                    <td><span class="badge bg-success">Selesai</span></td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>SP-003</td>
                    <td>Dewi Anggraini</td>
                    <td>Aspirat Jarum Halus</td>
                    <td>05-12-2025</td>
                    <td>dr. Intan Permata</td>
                    <td><span class="badge bg-secondary">Menunggu</span></td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
