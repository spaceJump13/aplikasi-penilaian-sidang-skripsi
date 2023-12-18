<?php
    include 'config.php';
    
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

    if(isset($_SESSION['login'])){
        if ($_SESSION['usertype'] === 'dosen'){
            header("Location: homeDosen.php");
            exit();
        }
    }

    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="navbar.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Home Admin</title>
    </head>
    <style>
        .container-lg {
            width: 3000px;
            box-sizing: border-box;
            overflow: hidden; /* prevent content overflow */
        }

    </style>
    <body style="background-color:#0B6977">

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 10px;">
            <img class="logopcu" src="Asset\image\pcu logo.png" alt="" style="margin-right: 20px;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" style="margin-right: 50px;">
                <ul class="navbar-nav mynav" style="margin-right: 10px;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="Asset\image\user.png" alt="" id="profileUserImg">
                            <span style="font-size: large;"><?php echo $username;?></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    <span style="font-size: large;">Logout</span>
                                    <img src="Asset\image\logout.png" alt="" id="logoutImg" style="float: right;">
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <div style="position: fixed; top: 50%; left: 50%;  transform: translate(-50%, -50%);">
            <div class="head" style="margin-bottom: 20px;">
                <h1>WELCOME, <?php echo $username;?>!</h1>
            </div>
            
            <div class="container-lg">
                <div class="row" style="margin: 2px;">
                    <div class="col-lg-3 bg-warning" style="margin-right: 10px;">
                       <div class="row">
                            <p>Vakasi</p>
                       </div>

                       <div class="row">
                            <p>Data Mahasiswa</p>
                       </div>
                    </div>

                    <div class="col-lg-3 bg-warning" style="margin-right: 10px;">
                        <h5>Atur Bobot Nilai</h5>
                        <img  src="asset/image/percent.png" id="percent">
                    </div>

                    <div class="col-lg-3 bg-warning" style="margin-right: 10px;">
                        <h5>Atur Bobot Nilai</h5>
                        <img  src="asset/image/percent.png" id="percent">
                    </div>

                    <div class="col-lg-3 bg-warning" style="margin-right: 10px;">
                        <h5>Atur Bobot Nilai</h5>
                        <img  src="asset/image/percent.png" id="percent">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>