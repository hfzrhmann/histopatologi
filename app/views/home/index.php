<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!empty ($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
        if ($_SESSION['role'] === 'admin') {
            header('Location:'. BASEURL . '/admin');
        }elseif ($_SESSION['role'] === 'petugas') {
            header('Location:'. BASEURL .'/petugas');
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASEURL;?> /css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title><?= $data['judul'];?></title>
    <style>
        .bodyku {
        background-image:url('img/lab.jpg');
        background-size:cover;
        background-repeat:norepeat;
    }
    </style>
</head>
<body class="bodyku">
    <section>
        <div class="mt-2 text-center ">
            <h1>SIM Histopatologi</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <?php Flasher::flash(); ?>
            </div>
        </div>
        <div class="container mt-5">
            <form method="post" action="<?= BASEURL;?>/home/prosesLogin" class="bg-info p-5 rounded-5">
                <h2 class="text-center text-primary fs-1"><i class="bi bi-hospital"></i></h2>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Ketik email anda" name="email" autofocus >
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Ketik password anda" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="<?= BASEURL;?>/js/bootstrap.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</html>