<div class="container mt-4">
    <h3 class="text-center mb-4">Data Pasien</h3>

    <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formInput">+ Tambah Pasien</button>
        <form action="<?= BASEURL;?>/admin/pasien/cari" method="post" class="d-flex align-items-center">
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
                    <th>NIK</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php if(!empty($data['pasien'])) :?>
                <?php $i = 1 ?>
                <?php foreach($data['pasien'] as $pasien) :?>
                  <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $pasien['nama'];?></td>
                      <td><?= $pasien['nik'];?></td>
                      <td><?= $pasien['jenis_kelamin'];?></td>
                      <td><?= $pasien['umur'];?></td>
                      <td><?= $pasien['no_hp'];?></td>
                      <td><?= $pasien['alamat'];?></td>
                      <td>
                          <a href="<?= BASEURL;?>/admin/pasien/ubah/<?= $pasien['id'];?>" class="btn btn-warning btn-sm tampilModalUbahPasien" data-bs-toggle="modal" data-bs-target="#formInput" data-id="<?= $pasien['id'];?>">Edit</a>
                          <a href="<?= BASEURL;?>/admin/pasien/hapus/<?= $pasien['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin anda hapus data pasien?')">Hapus</a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <tr>
                      <td colspan="8" class="text-center">Tidak ada data pasien</td>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/admin/pasien/tambah" method="POST" id="formTambahPasien">
          <input type="hidden" name="id" id="id">
          <div class="mb-3 row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
              <input type="number" name="nik" class="form-control" id="nik" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-9">
              <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="umur" class="col-sm-3 col-form-label">Umur</label>
            <div class="col-sm-9">
              <input type="number" name="umur" class="form-control" id="umur" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
            <div class="col-sm-9">
              <input type="number" name="no_hp" class="form-control" id="no_hp" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formTambahPasien" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
