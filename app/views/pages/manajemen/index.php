<div class="container mt-4">
    <h3 class="text-center mb-4">Manajemen Akun</h3>
    <div class="row">
      <div class="col-12">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary tombolTambahDataAkun" data-bs-toggle="modal" data-bs-target="#formInput">+ Tambah Akun</button>
         <form action="<?= BASEURL;?>/admin/manajemenakun/cari" method="post" class="d-flex align-items-center">
          <div class="input-group mb-3 mx-1">
            <input type="text" name="keyword" id="keyword" class="form-control form-control-sm"
                placeholder="Cari nama....."aria-describedby="cari" style="width: 200px;" autocomplete="off">
              <button class="btn btn-primary" type="submit" id="cari">Cari</button>
          </div> 
        </form>
    </div>

    <!-- Tabel Data Akun -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
              <?php if (!empty($data['akun'])) :?>
                <?php $i = 1; ?>
                <?php foreach ($data['akun'] as $akun) :?>
                  <tr>
                      <td><?= $i++;?></td>
                      <td><?= $akun['nama'];?></td>
                      <td><?= $akun['username'];?></td>
                      <td><?= $akun['role'];?></td>
                      <td><?= $akun['email'];?></td>
                      <td>
                          <a href="<?= BASEURL;?>/admin/akun/ubah/<?= $akun['id'];?>" class="btn btn-warning btn-sm tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formInput" data-id="<?= $akun['id'];?>">Edit</a>
                          <a href="<?= BASEURL;?>/admin/manajemenAkun/hapus/<?= $akun['id'];?>" onclick="return confirm('yakin anda hapus data akun?')" class="btn btn-danger btn-sm">Hapus</a>
                      </td>
                  </tr>
                <?php endforeach; ?>
              <?php else :?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data akun</td>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/admin/manajemenAkun/tambah" method="POST" id="formAkun">
          <div class="mb-3 row">
            <input type="hidden" name="id" id="id">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control" id="username" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" id="password" autocomplete="new-password">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="role" class="col-sm-3 col-form-label">Role</label>
            <div class="col-sm-9">
              <select class="form-select" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" form="formAkun" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>