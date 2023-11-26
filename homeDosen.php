<?php
    include 'config.php';
    
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }

    if(isset($_SESSION['login'])){
        if ($_SESSION['usertype'] === 'admin'){
            header("Location: homeAdmin.php");
            exit();
        }
    }

    $username = $_SESSION['username'];
    $sql = "SELECT * FROM data_dosen WHERE nama LIKE '%$username%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $nama_dosen = $row['nama'];
    }
    else{
        $nama_dosen = "?";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="navbar.css">
        <title>Home Ketua Penguji</title>
    </head>

    <style type="text/css">
        h1 {
        color: #FFF;
        text-align: center;
        font-size: 3rem;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        }

        #header1 {
        color: #ffffff;
        text-align: center;
        line-height: normal;
        height: 17vh;
        }

        #content{
        background-color: white;
        border-radius: 40px;
        padding: 35px 0 35px 0;
        max-width: 1000px;
        width: 100%;
        margin: auto;
        margin-top: 20px;
        /* top right bottom left */
        }

        .grid-dashboard {
        background-color:#FFD600B2;
        border: 1px solid #ddd;
        border-radius: 15px;
        position: relative;
        font-size: 30px;
        font-weight: bold;
        height: 300px;
        max-width: 300px;
        width: 100%;
        margin: 0 10px;
        color: white;
        line-height: normal;
        text-align: center;
        text-shadow: 2px 2px grey ;
        }

        .grid-dashboard:hover{
        background-color:white;
        color: #FFD600;
        text-shadow: 2px 2px black ;
        border-color: #FFD600;
        border-width: 3px;
        }

        #score>img{
        max-width: 200px;
        width: 100%;
        }

        #news>img{
        max-width: 170px;
        width: 100%; 
        align-items: center;
        }

        #file>img{
        max-width: 200px;
        width: 100%;
        margin-left: 20px;
        }
    </style>

    <body style="background-color:#0B6977;">

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

        <div class="container" style="margin-top: 3em">
            <div id="header1">
                <p><h1>Welcome,</h1></p>
                <p><h3><?php echo $nama_dosen;?></h3></p>
            </div>

            <div class="container">
                <div id="content">
                    <div class="row align-items-center justify-content-center">

                        <div class="col-4 grid-dashboard">
                            <div id="score" onclick="window.location.href = 'input_penilaian.php';">
                                <p>INPUT NILAI</p>                                 
                                <img src="asset/image/score.png">                          
                            </div>
                        </div>

                        <div class="col-md-4 grid-dashboard">
                            <div id="news" class="row-lg-3" onclick="window.location.href = 'addBeritaAcara.php';">
                                <p>TAMBAH BERITA ACARA</p> 
                                <img src="asset/image/news.png">
                            </div>
                        </div>

                        <div class="col-md-4 grid-dashboard">
                            <div id="file" onclick="window.location.href = 'historySidang.php';">
                                <p>RIWAYAT SIDANG</p>                                 
                                <img src="asset/image/file.png">                             
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>