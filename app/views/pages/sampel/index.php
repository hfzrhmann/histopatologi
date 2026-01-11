<div class="container mt-4">
    <h3 class="text-center mb-4">Input Sampel Baru</h3>
    <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary tombolTambahDataSampelsa" data-bs-toggle="modal" data-bs-target="#formInput">+ Registrasi</button>
        <form action="<?= BASEURL;?>/admin/sampel/cari" method="post" class="d-flex align-items-center">
          <div class="input-group mb-3 mx-1">
            <input type="text" name="keyword" id="keyword" class="form-control form-control-sm"
                placeholder="Cari nama....."aria-describedby="cari" style="width: 200px;" autocomplete="off">
              <button class="btn btn-primary" type="submit" id="cari">Cari</button>
          </div> 
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nama Dokter</th>
                    <th>Jenis Sampel</th>
                    <th>Lokasi Anatomi</th>
                    <th>Tanggal Masuk</th>
                    <th>Kondisi Sampel</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php if (!empty ($data['sampel'])) :?>
                <?php $i =1; ?>
                <?php foreach ($data['sampel'] as $sampel) :?>
                  <tr>
                      <td><?= $i++;?></td>
                      <td><?= $sampel['nama_pasien'];?></td>
                      <td><?= $sampel['nama_dokter'];?></td>
                      <td><?= $sampel['jenis_sampel'];?></td>
                      <td><?= $sampel['anatomi'];?></td>
                      <td><?= $sampel['tanggal_masuk'];?></td>
                      <td><?= $sampel['kondisi_sampel'];?></td>
                      <td>
                          <a href="<?= BASEURL;?>/admin/sampel/ubah/<?= $sampel['id'];?>" class="btn btn-warning btn-sm tampilModalUbahSampel" data-bs-toggle="modal" data-bs-target="#formInput" data-id="<?= $sampel['id'];?>" >Edit</a>
                          <a href="<?= BASEURL;?>/admin/sampel/hapus/<?= $sampel['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin anda hapus data sampel?')">Hapus</a>
                      </td>
                  </tr>
                <?php endforeach; ?>
              <?php else :?>
                <tr>
                      <td colspan="8" class="text-center">Tidak ada data sampel</td>
                  </tr>
              <?php endif; ?>

                <!-- Pasien 2 -->
                <!-- <tr>
                    <td>2</td>
                    <td>Saffa</td>
                    <td>dr. Rahman, Sp.PA</td>
                     <td>Jaringan</td>
                    <td>paru</td>
                    <td>08-10-2025</td>
                    <td>baik</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<!-- Form Input -->
<div class="modal fade" id="formInput" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Input Sampel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL;?>/admin/sampel/tambah" method="POST" id="formImput">
          <input type="hidden" name="id" id="id">
          <div class="mb-3 row">
            <label for="no_lab" class="col-sm-4 col-form-label">Nomor Lab</label>
            <div class="col-sm-8">
              <input type="text" name="no_lab" class="form-control" id="no_lab" placeholder="LAB-2025-001" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Pasien</label>
            <div class="col-sm-8">
              <?php if (!empty($data['pasien'])) :?>
                <select name="id_pasien" id="id_pasien" class="form-select" required>
                <option value="">-- Pilih Pasien --</option>
                <?php foreach ($data['pasien'] as $pasien) :?>
                    <option value="<?= $pasien['id'];?>"><?= $pasien['nama'];?></option>
                <?php endforeach; ?>
                </select>
              <?php endif; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Dokter Pengirim</label>
            <div class="col-sm-8">
              <select name="id_dokter" id="id_dokter" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
                <?php foreach ($data['dokter'] as $dokter) :?>
                  <option value="<?= $dokter['id'];?>"><?= $dokter['nama'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jenis_sampel" class="col-sm-4 col-form-label">Jenis Sampel</label>
            <div class="col-sm-8">
              <input type="text" name="jenis_sampel" class="form-control" id="jenis_sampel" placeholder="air liur, dahak (sputum), cairan tubuh, jaringan tubuh, dll" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="anatomi" class="col-sm-4 col-form-label">Lokasi Anatomi</label>
            <div class="col-sm-8">
              <input type="text" name="anatomi" class="form-control" id="anatomi" placeholder="berdiri tegak, menghadap ke depan, dengan mata lurus ke depan, kaki sejajar, lengan di sisi tubuh, dan telapak tangan menghadap ke depan" required>
            </div>
          </div>

          <!-- Tanggal Masuk -->
          <div class="mb-3 row">
            <label for="tanggal_masuk" class="col-sm-4 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-8">
              <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" required>
            </div>
          </div>

          <!-- Kondisi Sampel (opsional) -->
          <div class="mb-3 row">
            <label for="kondisi_sampel" class="col-sm-4 col-form-label">Kondisi Sampel</label>
            <div class="col-sm-8">
              <input type="text" name="kondisi_sampel" class="form-control" id="kondisi_sampel" placeholder="contoh: baik, rusak, dll">
            </div>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formImput" class="btn btn-primary">Simpan</button>
      </div>

    </div>
  </div>
</div>
