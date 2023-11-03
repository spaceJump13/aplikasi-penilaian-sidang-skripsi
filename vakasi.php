<?php
include 'config.php';

$sql = "SELECT * FROM vakasi";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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
        padding-bottom: 2rem;
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
        <div id="rectangle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 style="text-align: center; color: #0B6977" class="text-uppercase">vakasi dosen</h1>
                    </div>

                    <div class="col-lg-12 mt-5">
                        <table class="mx-auto table table-striped">
                            <thead style="background-color:#0B6977; color: whitesmoke; text-align: center;">
                                <tr>
                                    <th>Nomor Vakasi</th>
                                    <th>NIP</th>
                                    <th>Dosen</th>
                                    <th>Tanggal Sidang</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Team Penguji</th>
                                </tr>
                            </thead>
                            <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tbody style="text-align: center;">
                                    <tr>
                                        <td><?php echo $row['nomor_vakasi']; ?></td>
                                        <td><?php echo $row['nip']; ?></td>
                                        <td><?php echo $row['dosen']; ?></td>
                                        <td><?php echo $row['tanggal_sidang']; ?></td>
                                        <td><?php echo $row['nama_mhs']; ?></td>
                                        <td><?php echo $row['anggota_penguji']; ?></td>
                                    </tr>
                                </tbody>
                                <?php endwhile ?>
                            <?php else: ?>
                                <tbody style="text-align: center;">
                                    <tr>
                                        <td colspan="5"><h3 style="text-align: center; color:#0B6977;">Tidak ada data.</h3></td>
                                    </tr>
                                </tbody>
                            <?php endif ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>