<?php
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

$nama_dosen = $_SESSION['username'];
$sql = "SELECT * FROM vakasi WHERE dosen LIKE '%$nama_dosen%'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $nama_dosen2 = $row['dosen'];
}

$sql2 = "SELECT * FROM vakasi WHERE dosen LIKE '%$nama_dosen%'";
$stmt2 = $conn->prepare($sql);
$stmt2->execute();
$result2 = $stmt2->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="navbar.css">
    <title>History Sidang</title>

    <style>
        #rectangle {
        width: 100%;
        height: 100%;
        flex-shrink: 0;
        border-radius: 6.25rem 6.25rem 0rem 0rem;
        background: white;
        margin-top:100px;
        margin-bottom: 0px;
        padding-left: 5rem;
        padding-right: 5rem;
        padding-top: 2rem;
        padding-bottom: 500px;
        }
        .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn.btn-outline-ocean {
        color: #fff; 
        background-color: #0B6977; 
        border: 3px solid #0B6977; 
        padding: 8px 16px; 
        font-weight: 500;
        border-radius: 5px; 
        text-decoration: none; 
        display: inline-block; 
        font-size: 16px; 
        text-align: center; 
        cursor: pointer; 
        transition: background-color 0.3s, color 0.3s, border-color 0.3s; 
        }
   
        .btn.btn-outline-ocean:hover {
            color: #0B6977; 
            background-color: #fff; 
            border-color: #0B6977; 
        }
    </style>
</head>
<body style="background-color: #0B6977; height: 100%;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 10px;">
        <img class="logopcu" src="Asset\image\pcu logo.png" alt="" style="margin-right: 20px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mynav">
                <li class="nav-link">
                    <a class="text-decoration-none" aria-current="page" href="homeDosen.php">Home</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="addBeritaAcara.php">Add Berita Acara</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="input_penilaian.php">Input Nilai</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-end" style="margin-right: 50px;">
            <ul class="navbar-nav mynav" style="margin-right: 10px;">
                <li class="nav-item dropdown">
                    <a class="nav-item dropdown-toggle text-decoration-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Asset\image\user.png" alt="" id="profileUserImg">
                        <span style="font-size: large; font-weight:500;"><?php echo $_SESSION['username'];?></span>
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

    <div id="rectangle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center; color: #0B6977;">
                        <h1>RIWAYAT SIDANG</h1>
                        <h4 style="margin-top: 10px;" id="nama_dosen"><i><?php echo $nama_dosen2;?></i></h4>
                    </div>
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="input-group">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Masukkan Nama atau NRP mahasiswa">
                        <button class="btn btn-outline-ocean" type="button">Search</button>
                    </div>
                </div>

                <div class="col-lg-8">
                        <div style="float: right;">
                        <select class="form-select" name="periode" id="periode" class="Default select example" style="margin-top: 5px;">
                            <option selected value="Semua">Semua</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                        </select>
                        </div>
                </div>
            </div>
    
            <div class="row mt-4">
                <div class="col-lg-12">
                    <div id="searchResult">
                        <table class="mx-auto table table-striped">
                            <thead style="text-align: center; background-color:#0B6977; color:whitesmoke">
                                <tr>
                                    <th>Tanggal Sidang</th>
                                    <th>Ruang Sidang</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php if (mysqli_num_rows($result2) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result2)): ?>
                                <tbody style="text-align: center;">
                                    <tr>
                                        <td><?php echo date('Y-m-d H:i', strtotime($row['tanggal_sidang'])); ?></td>
                                        <td><?php echo $row['ruang_sidang']; ?></td>
                                        <td><?php echo $row['nama_mhs']; ?></td>
                                        <td><?php echo $row['anggota_penguji']; ?></td>
                                    </tr>
                                </tbody>
                                <?php endwhile ?>
                            <?php else: ?>
                                <tbody style="text-align: center;">
                                    <tr>
                                        <td colspan="4"><h3 style="text-align: center; color:#0B6977;">Tidak ada data.</h3></td>
                                    </tr>
                                </tbody>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#keyword').on('keyup', function(){
            var keyword = $('#keyword').val();
            var periode = $('#periode').val();
            var nama_dosen = $('#nama_dosen').text();
            console.log(keyword);
            console.log(nama_dosen)
            $.ajax({
                url: "ajax/ajax_riwayat_sidang.php",
                type: "POST",
                data: {
                    keyword: keyword,
                    periode: periode,
                    nama_dosen: nama_dosen
                },
                success: function(respond) {
                    $("#searchResult").html(respond);
                },
                error: function() {
                    alert("gagal");
                }
            });
        })

        $('#periode').on('change', function(){
            var periode = $('#periode').val();
            var keyword = $('#keyword').val();
            var nama_dosen = $('#nama_dosen').text();
            console.log(periode);
            $.ajax({
                url: "ajax/ajax_riwayat_sidang.php",
                type: "POST",
                data: {
                    periode: periode,
                    keyword: keyword,
                    nama_dosen: nama_dosen
                },
                success: function(respond) {
                    $("#searchResult").html(respond);
                },
                error: function() {
                    alert("gagal");
                }
            });
        })
    })
</script>
</html>