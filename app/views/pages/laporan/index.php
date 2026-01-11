<div class="container mt-4">
    <h3 class="text-center mb-4">Data Laporan Pemeriksaan</h3>
    <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary tombolTambahDataLaporan" data-bs-toggle="modal" data-bs-target="#formInput">+ Tambah Laporan</button>
         <form action="<?= BASEURL;?>/admin/laporan/cari" method="post" class="d-flex align-items-center">
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
                    <th>No Registrasi Lab</th>
                    <th>Nama Pasien</th>
                    <th>Diagnosis</th>
                    <th>Dokter Pemeriksa</th>
                    <th>Tanggal Selesai</th>
                    <th>Lihat Laporan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['laporan'])) :?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['laporan'] as $laporan) :?>
                        <tr>
                            <td><?= $i++;?></td>
                            <td><?= $laporan['no_lab'];?></td>
                            <td><?= $laporan['nama_pasien'];?></td>
                            <td><?= $laporan['anatomi'];?></td>
                            <td><?= $laporan['nama_dokter'];?></td>
                            <td><?= date('Y-m-d', strtotime($laporan['created_at'])); ?></td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Lihat</a>
                                <a href="#" class="btn btn-primary btn-sm">PDF</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else :?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data akun</td>
                    </tr>
                <?php endif; ?>
                
                <!-- Laporan 2 -->
                <!-- <tr>
                    <td>2</td>
                    <td>LAB-2025-002</td>
                    <td>Saffa</td>
                    <td>Fibroadenoma Mammae</td>
                    <td>dr. Taufik Ardi, Sp.PA</td>
                    <td>08 Desember 2025</td>
                    <td>
                        <a href="#" class="btn btn-success btn-sm">Lihat</a>
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
        <h5 class="modal-title" id="formModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="<?= BASEURL;?>/admin/laporan/tambah" method="POST" id="formImput">
          <input type="hidden" name="id" id="id">
          <div class="mb-3 row">
            <label for="id_sampel" class="col-sm-4 col-form-label">Nomor Lab</label>
            <div class="col-sm-8">
              <?php if (!empty ($data['sampel'])) :?>
                <select name="id_sampel" id="id_sampel" class="form-select" required>
                  <?php foreach ($data['sampel'] as $sampel) :?>
                    <option value="<?= $sampel['id'];?>"><?= $sampel['no_lab'];?></option>
                    <?php endforeach; ?>
                </select>
              <?php else :?>
                <p>Tidak ada data, Mohon untuk ditambahkan di sampel lebih dahulu</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Pasien</label>
            <div class="col-sm-8">
              <?php if (!empty ($data['pasien'])) :?>
                <select name="id_pasien" id="id_pasien" class="form-select" required>
                  <?php foreach ($data['pasien'] as $pasien) :?>
                    <option value="<?= $pasien['id'];?>"><?= $pasien['nama'];?></option>
                  <?php endforeach; ?>
                </select>
              <?php else :?>
                <p>Tidak ada data pasien</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-4 col-form-label">Dokter Pengirim</label>
            <div class="col-sm-8">
              <?php if (!empty ($data['dokter'])) :?>
                <select name="id_dokter" id="id_dokter" class="form-select" required>
                  <?php foreach ($data['dokter'] as $dokter) :?>
                    <option value="<?= $dokter['id'];?>"><?= $dokter['nama'];?></option>
                  <?php endforeach; ?>
                </select>
              <?php else :?>
                <p>Tidak ada data dokter</p>
              <?php endif; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="id_users" class="col-sm-4 col-form-label">Petugas</label>
            <div class="col-sm-8">
              <?php foreach ($data['user'] as $user) :?>
                <input type="text" name="id_users" class="form-control" id="id_users" placeholder="<?= $user['nama'];?>" readonly>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="makroskopis" class="col-sm-4 col-form-label">Makroskopis</label>
            <div class="col-sm-8">
              <textarea type="text" name="makroskopis" class="form-control" id="makroskopis" rows="3" required> </textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="mikroskopis" class="col-sm-4 col-form-label">Mikroskopis</label>
            <div class="col-sm-8">
              <textarea type="text" name="mikroskopis" class="form-control" id="mikroskopis" rows="3" required></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="kesimpulan" class="col-sm-4 col-form-label">kesimpulan</label>
            <div class="col-sm-8">
              <textarea type="text" name="kesimpulan" class="form-control" id="kesimpulan" rows="3" required></textarea>
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