<div class="container mt-4">
    <h3 class="text-center mb-4">Update Proses Pemeriksaan</h3>
    
    <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary tombolTambahDataPemeriksaan" data-bs-toggle="modal" data-bs-target="#formInput">+ Tambah Pemeriksaan</button>
        <form action="<?= BASEURL;?>/petugas/pemeriksaan/cari" method="post" class="d-flex align-items-center">
          <div class="input-group mb-3 mx-1">
            <input type="text" name="keyword" id="keyword" class="form-control form-control-sm"
                placeholder="Cari status....."aria-describedby="cari" style="width: 200px;" autocomplete="off">
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
                    <th>Status Saat Ini</th>
                    <th>Tanggal Masuk</th>
                    <th>Update Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php if (!empty ($data['pemeriksaan'])) : ?>
                    <?php foreach ($data['pemeriksaan'] as $pemeriksaan) :?>
                        <tr>
                            <td><?= $i++;?></td>
                            <td><?= $pemeriksaan['noLab'];?></td>
                            <td><?= $pemeriksaan['namaPasien'];?></td>
                            <td><?= $pemeriksaan['status'];?></td>
                            <td><?= date('Y-m-d', strtotime($pemeriksaan['tanggalMasuk'])); ?></td>
                            <td>
                                <a href="<?= BASEURL;?>/petugas/pemeriksaan/ubah/<?= $pemeriksaan['id'];?>" class="btn btn-warning btn-sm tampilModalUbahPemeriksaan" data-bs-toggle="modal" data-bs-target="#formInput" data-id="<?= $pemeriksaan['id'];?>">Edit</a>
                                <a href="<?= BASEURL;?>/petugas/pemeriksaan/hapus/<?= $pemeriksaan['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin anda hapus data pemeriksan?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else :?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pemeriksaan</td>
                     </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Form Input -->
<div class="modal fade" id="formInput" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="formModalLabel">Tambah Pemeriksaan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/petugas/pemeriksaan/tambah" method="POST" id="formTambahPemeriksaan">
          <input type="hidden" name="id" id="id">
          <div class="mb-3 row">
            <label for="id_sampel" class="col-sm-3 col-form-label">Registrasi Lab</label>
            <div class="col-sm-9">
                <?php if (!empty ($data['sampel'])) : ?>
                    <select class="form-select" id="id_sampel" name="id_sampel" required>
                        <?php foreach ($data['sampel'] as $sampel) : ?>
                            <option value="<?= $sampel['id'];?>"><?= $sampel['no_lab'];?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <p>Tidak ada data no lab</p>
                <?php endif; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="gambar" class="col-sm-3 col-form-label">gambar Analisa</label>
            <div class="col-sm-9">
                <input type="file" name="gambar" class="form-control" id="gambar">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="id_pasien" class="col-sm-3 col-form-label">Nama Pasien</label>
            <div class="col-sm-9">
                <?php if (!empty ($data['pasien'])) :?>
                    <select class="form-select" id="id_pasien" name="id_pasien" required>
                        <?php foreach ($data['pasien'] as $pasien) : ?>
                            <option value="<?= $pasien['id'];?>"><?= $pasien['nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php else : ?>
                        <p>Tidak ada data pasien</p>
                    <?php endif; ?>
            </div>
          </div>
         <div class="mb-3 row">
            <label for="id_dokter" class="col-sm-3 col-form-label">Nama Dokter</label>
            <div class="col-sm-9">
                <?php if (!empty ($data['dokter'])) : ?>
                    <select class="form-select" id="id_dokter" name="id_dokter" required>
                        <?php foreach ($data['dokter'] as $dokter) :?>
                            <option value="<?= $dokter['id'];?>"><?= $dokter['nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <p>Tidak ada data dokter</p>
                <?php endif; ?>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="status" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-9">
              <select class="form-select" id="status" name="status" required>
                <option value="Sampel Diterima">Sampel Diterima</option>
                <option value="Menunggu Makroskopik">Menunggu Makroskopik</option>
                <option value="Pemeriksaan Mikroskopis">Pemeriksaan Mikroskopis</option>
                <option value="Pemrosesan Jaringan">Pemrosesan Jaringan</option>
                <option value="Embedding">Embedding</option>
                <option value="Microtomy">Microtomy</option>
                <option value="Pewarnaan">Pewarnaan</option>
                <option value="Penyusunan Hasil">Penyusunan Hasil</option>
                <option value="Selesai">Selesai</option>
              </select>
            </div>
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formTambahPemeriksaan" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>