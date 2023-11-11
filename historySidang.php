<?php
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

$nama_dosen = $_SESSION['username'];
echo $nama_dosen;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
        padding-bottom: 2rem;
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
    <div id="rectangle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h1 style="text-align: center; color: #0B6977">RIWAYAT SIDANG</h1>
                    </div>
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="col-lg-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Masukkan NRP atau nama" aria-label="Masukkan NRP atau nama" aria-describedby="basic-addon2">
                        <button class="btn btn-outline-ocean" type="button">Search</button>
                    </div>
                </div>
            </div>
    
            <div class="row mt-4">
                <div class="col-lg-12">
                <table class="table table-striped">
                    <thead style="background-color:#0B6977; color: white">
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Mahasiswa</th>
                        <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210226</td>
                            <td>Kevin Sadino</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210086</td>
                            <td>Richard Aditya</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210091</td>
                            <td>Bowen Victorius</td>
                            <td>Ketua Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210226</td>
                            <td>Kevin Sadino</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210086</td>
                            <td>Richard Aditya</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210091</td>
                            <td>Bowen Victorius</td>
                            <td>Ketua Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210226</td>
                            <td>Kevin Sadino</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210086</td>
                            <td>Richard Aditya</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210091</td>
                            <td>Bowen Victorius</td>
                            <td>Ketua Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210226</td>
                            <td>Kevin Sadino</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210086</td>
                            <td>Richard Aditya</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210091</td>
                            <td>Bowen Victorius</td>
                            <td>Ketua Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210226</td>
                            <td>Kevin Sadino</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210086</td>
                            <td>Richard Aditya</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210091</td>
                            <td>Bowen Victorius</td>
                            <td>Ketua Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210226</td>
                            <td>Kevin Sadino</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210086</td>
                            <td>Richard Aditya</td>
                            <td>Anggota Penguji</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>C14210091</td>
                            <td>Bowen Victorius</td>
                            <td>Ketua Penguji</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <button class="btn btn-outline-ocean" onclick="location.href='#'">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>