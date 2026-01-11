<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['is_login']) ||$_SESSION['is_login'] !== true || $_SESSION['role'] !== 'petugas') {
    header("Location: " . BASEURL);
    exit;
}
?>

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
    <h5 class="text-white mb-0">Sistem Informasi Laboratorium Histopatologi</h5>
</section>

<!-- Navbar -->
<section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4 d-flex align-items-center">
            <div class="d-flex align-items-center">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL;?>/petugas">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL;?>/petugas/pasien">Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL;?>/petugas/sampel">Sampel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL;?>/petugas/pemeriksaan">Pemeriksaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL;?>/petugas/laporan">Data Laporan</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <form action="<?= BASEURL;?>/home/logout" method="post">
                    <button class="btn btn-danger" type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>
</section>

