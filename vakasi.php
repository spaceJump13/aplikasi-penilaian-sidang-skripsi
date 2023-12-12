<?php
include 'config.php';

$sql = "SELECT * FROM vakasi";
$result_vakasi = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="navbar.css">
    <title>Vakasi Dosen</title>
</head>
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
<body style="background-color: #0B6977;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 10px;">
        <img class="logopcu" src="Asset\image\pcu logo.png" alt="" style="margin-right: 20px;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mynav">
                <li class="nav-link">
                    <a class="text-decoration-none" aria-current="page" href="homeAdmin.php">Home</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="beritaAcara.php">Berita Acara</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="dataMahasiswa.php">Data Mahasiswa</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="aturBobot.php">Atur Kriteria Penilaian</a>
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
                                <span style="font-size: large; color:#0B6977">Logout</span>
                                <img src="Asset\image\logout.png" alt="" id="logoutImg" style="float: right;">
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="rectangle">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align: center; color: #0B6977" class="text-uppercase">vakasi dosen</h1>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <div class="row mt-4">
                <div class="col-lg-3">
                    <div class="input-group mb-3" style="margin-top: 30px;">
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Masukkan Nama atau NIP dosen">
                    </div>
                </div>

                <div class="col-lg-4">
                    <button type="button" class="btn btn-outline-ocean" style="margin-top: 28px;" id="hitung_vakasi">Hitung Vakasi</button>
                    <span id="result1" style="display: none;" class="d-inline-block">
                        <h5 id="sum_result"></h5>
                    </span>
                </div>


                <div class="col-lg-5">
                        <div style="float: right;">
                        <select class="form-select" name="periode" id="periode" class="Default select example" style="margin-top: 30px;">
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
        </form>
        
        <div class="row">
            <div class="col-lg-12 mt-4">
                <?php
                    $rowsPerPage = 10;
                    $totalPages = ceil(mysqli_num_rows($result_vakasi) / $rowsPerPage);
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($current_page - 1) * $rowsPerPage;
                    $query = "SELECT * FROM vakasi LIMIT $offset, $rowsPerPage";
                    $result_vakasi = mysqli_query($conn, $query);
                ?>
                <div id="searchResult">
                    <table class="mx-auto table table-striped">
                        <thead style="background-color:#0B6977; color: whitesmoke; text-align: center;">
                            <tr>
                                <th>Nomor Vakasi</th>
                                <th>NIP</th>
                                <th>Dosen</th>
                                <th>Tanggal Sidang</th>
                                <th>Ruang Sidang</th>
                                <th>Nama Mahasiswa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php if (mysqli_num_rows($result_vakasi) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($result_vakasi)): ?>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td><?php echo $row['nomor_vakasi']; ?>
                                    <td><?php echo $row['nip']; ?></td>
                                    <td><?php echo $row['dosen']; ?></td>
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
                                    <td colspan="7"><h3 style="text-align: center; color:#0B6977;">Tidak ada data.</h3></td>
                                </tr>
                            </tbody>
                        <?php endif ?>
                    </table>
                </div>
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php echo ($current_page == $i ? 'active' : ''); ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function(){
        $('#keyword').on('keyup', function(){
            var keyword = $('#keyword').val();
            var periode = $('#periode').val();
            console.log(keyword);
            $.ajax({
                url: "ajax/ajax_vakasi.php",
                type: "POST",
                data: {
                    keyword: keyword,
                    periode: periode,
                    tanda: "cari dosen"
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
            console.log(periode);
            $.ajax({
                url: "ajax/ajax_vakasi.php",
                type: "POST",
                data: {
                    periode: periode,
                    keyword: keyword,
                    tanda: "cari dosen"
                },
                success: function(respond) {
                    $("#searchResult").html(respond);
                },
                error: function() {
                    alert("gagal");
                }
            });
        })

        $('#hitung_vakasi').on('click', function(){
             var keyword = $('#keyword').val();
             $.ajax({
                url: "ajax/ajax_vakasi.php",
                type: "POST",
                data: {
                    keyword: keyword,
                    tanda: "hitung vakasi"
                },
                success: function(respond) {
                    var jumlah_vakasi = respond;
                    console.log(jumlah_vakasi)
                    $("#sum_result").html("Jumlah vakasi: " + jumlah_vakasi);
                    $("#result1").show();
                },
                error: function() {
                    alert("gagal");
                }
            });
        })
    })

</script>
</html>