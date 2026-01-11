<div class="container-fluid mt-3">
    <p class="fs-5">
        Selamat Datang <span class="fw-bold">Petugas</span> di SIM Histopatologi
    </p>

    <div class="row mt-3 g-3">

        <div class="col-md-3">
            <div class="card text-white bg-primary shadow-sm h-100">
                <div class="card-body text-center">
                    <p class="fs-3 fw-bold mb-1"><?= $data['jumlahPasien'];?></p>
                    <p class="mb-0">Data Pasien</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-white bg-info shadow-sm h-100">
                <div class="card-body text-center">
                    <p class="fs-3 fw-bold mb-1"><?= $data['jumlahSampel'];?></p>
                    <p class="mb-0">Sampel Masuk Hari Ini</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning shadow-sm h-100">
                <div class="card-body text-center">
                    <p class="fs-3 fw-bold mb-1">0</p>
                    <p class="mb-0">Proses Pemeriksaan</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success shadow-sm h-100">
                <div class="card-body text-center">
                    <p class="fs-3 fw-bold mb-1"><?= $data['jumlahLaporan'];?></p>
                    <p class="mb-0">Selesai & Siap Laporan</p>
                </div>
            </div>
        </div>

    </div>
</div>
