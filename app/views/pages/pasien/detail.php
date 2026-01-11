<section>
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <?= $data['pasien']['nama'];?>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $data['pasien']['nik'];?></li>
            <li class="list-group-item"><?= $data['pasien']['jenis_kelamin'];?></li>
            <li class="list-group-item"><?= $data['pasien']['umur'];?></li>
        </ul>
    </div>
</section>