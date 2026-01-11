<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASEURL;?> /css/bootstrap.min.css" rel="stylesheet">
    <title><?= $data['judul'];?></title>
</head>
<body>
   <!-- Header -->
<section class="text-center bg-primary py-2">
    <h5 class="text-white mb-0">SIM Histopatologi</h5>
</section>

<!-- Navbar -->
<section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4 d-flex align-items-center">
            <div class="d-flex align-items-center">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURLPETUGAS;?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURLPETUGAS;?>/sampel">Sampel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURLPETUGAS;?>/sampel">Sampel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURLPETUGAS;?>/pemeriksaan">Pemeriksaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURLPETUGAS;?>/laporan">Data Laporan</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <a href="#" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>
</section>

