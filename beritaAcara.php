<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Berita Acara</title>
</head>
<style>
    .checkbox-lg .form-check-input{
    top: .8rem;
    scale: 1.4;
    margin-right: 0.7rem;
    }

    .checkbox-lg .form-check-label {
    padding-top: 13px;
    }

    .checkbox-xl .form-check-input {
    top: 1.2rem;
    scale: 1.7;
    margin-right: 0.8rem;
    }

    .checkbox-xl .form-check-label {
    padding-top: 19px;
    }

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
        /* Primary Button Styles */
        .btn-ocean {
    color: white;
    font-weight: 500;
    background-color: #0B6977;
    border-color: #0B6977;
    }

    .btn-ocean:hover {
    background-color: #fff;
    /*border-color: #fff;*/
    border: 3px solid;
    color: #0B6977;
    /*box-shadow: 2px 2px 5px rgba(215, 24, 123, 0.20);*/
    }

    .btn-ocean:focus {
    box-shadow: 0 0 0 0.2rem rgba(11, 105, 119, 0.5);
    }
</style>
<body style="background-color: #0B6977;">
    <div id="rectangle">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align: center; color: #0B6977" class="text-uppercase">berita acara</h1>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <div class="row mt-4">
                <div class="col-lg-3">
                    <div class="input-group mb-3" style="margin-top: 30px;">
                        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Masukkan Nama atau NRP">
                    </div>
                </div>
    
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-ocean" style="margin-top: 30px;">Search</button>
                </div>

                <div class="col-lg-6">
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

        <div class="row mt-4">
            <div class="col-lg-12">
                <div id="searchResult">
                    <table class="mx-auto table table-striped">
                        <thead style="background-color:#0B6977; color: whitesmoke; text-align: center;">
                            <tr>
                                <th>ID</th>
                                <th>Mahasiswa</th>
                                <th>Judul Skripsi</th>
                                <th>Konsentrasi</th>
                                <th>Tanggal Sidang</th>
                                <th>Ruang Sidang</th>
                                <th>Ketua Penguji</th>
                                <th>Anggota Penguji</th>
                                <th>Pembimbing 1</th>
                                <th>Pembimbing 2</th>
                                <th>Catatan</th>
                                <th>Nilai Akhir</th>
                                <th>Hasil Sidang</th>
                            </tr>
                        </thead>
                    
                        <tbody style="text-align: center;">
                            <?php if (mysqli_num_rows($result_berita_acara) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($result_berita_acara)): ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['nama_nrp'];?></td>
                                    <td><?php echo $row['judul_skripsi'];?></td>
                                    <td><?php echo $row['konsentrasi'];?></td>
                                    <td><?php echo $row['tanggal_sidang'];?></td>
                                    <td><?php echo $row['ruang_sidang'];?></td>
                                    <td><?php echo $row['ketua_penguji'];?></td>
                                    <td><?php echo $row['anggota_penguji'];?></td>
                                    <td><?php echo $row['pembimbing_1'];?></td>
                                    <td><?php echo $row['pembimbing_2'];?></td>
                                    <td><?php echo $row['catatan'];?></td>
                                    <td><?php echo $row['nilai_akhir'];?></td>
                                    <td><?php echo $row['hasil_sidang'];?></td>
                                </tr>
                                <?php endwhile ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="13"><h4 style="color: #0B6977;">Tidak ada data.</h4></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>