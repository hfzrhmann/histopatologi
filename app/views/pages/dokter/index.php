<div class="container mt-4">
    <h3 class="text-center mb-4">Data Dokter</h3>
     <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary tombolTambahDataDokter" data-bs-toggle="modal" data-bs-target="#formInput">+ Tambah Dokter</button>

        <form action="<?= BASEURL;?>/admin/dokter/cari" method="post" class="d-flex align-items-center">
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
                    <th>NIP / ID Dokter</th>
                    <th>Nama Dokter</th>
                    <th>Jenis Kelamin</th>
                    <th>Spesialis</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($data['dokter'])) : ?>
                  <?php $i = 1 ?>
                  <?php foreach($data['dokter'] as $dokter) :?>
                    <tr>
                        <td><?= $i++;?></td>
                        <td><?= $dokter['nip'];?></td>
                        <td><?= $dokter['nama'];?></td>
                        <td><?= $dokter['jenis_kelamin'];?></td>
                        <td><?= $dokter['spesialis'];?></td>
                        <td><?= $dokter['no_hp'];?></td>
                        <td><?= $dokter['email'];?></td>
                        <td>
                            <a href="<?= BASEURL;?>/admin/dokter/ubah/<?= $dokter['id'];?>" class="btn btn-warning btn-sm tampilModalUbahDokter" data-bs-toggle="modal" data-bs-target="#formInput" data-id="<?= $dokter['id']; ?>">Edit</a>
                            <a href="<?= BASEURL;?>/admin/dokter/hapus/<?= $dokter['id'];?>" onclick="return confirm('yakin anda hapus data dokter?')" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else :?>
                  <tr>
                      <td colspan="8" class="text-center">Tidak ada data dokter</td>
                  </tr>
                <?php endif; ?>  

                <!-- Dokter 2 -->
                <!-- <tr>
                    <td>2</td>
                    <td>DK-2025-002</td>
                    <td>dr. Saffa, Sp.PA</td>
                    <td>Perempuan</td>
                    <td>Patologi Anatomi</td>
                    <td>0899-1234-5678</td>
                    <td>saffa@example.com</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr> -->

                <!-- Jika data kosong -->
                <!--
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data dokter</td>
                </tr>
                -->

            </tbody>
        </table>
    </div>

</div>

<!-- Form Input -->
<div class="modal fade" id="formInput" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Dokter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/admin/dokter/tambah" method="POST" id="formDokter">
          <div class="mb-3 row">
            <input type="hidden" name="id" id="id">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nip" class="col-sm-3 col-form-label">NIP</label>
            <div class="col-sm-9">
              <input type="number" name="nip" class="form-control" id="nip" required>
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
            <label for="spesialis" class="col-sm-3 col-form-label">Spesialis</label>
            <div class="col-sm-9">
              <input type="text" name="spesialis" class="form-control" id="spesialis" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
            <div class="col-sm-9">
              <input type="number" name="no_hp" class="form-control" id="no_hp" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formDokter" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
