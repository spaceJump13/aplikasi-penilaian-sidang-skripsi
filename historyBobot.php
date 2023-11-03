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
    <title>History Bobot Nilai</title>

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
<body style="background-color: #0B6977;">
    <div id="rectangle">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <h1 style="text-align: center; color: #0B6977" class="text-uppercase">history bobot nilai</h1>
                    </div>
                </div>
            </div>
    
            <div class="row mt-5">
                <div class="col-lg-12">
                <table class="table table-striped">
                    <thead style="background-color:#0B6977; color: white">
                        <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">CPL</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Bab</th>
                        <th scope="col">Penilaian</th>
                        <th scope="col">Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Date</th>
                            <td>
                                CP 4
                                <br>
                                CP 5
                            </td>
                            <td style="word-wrap: break-word;">Sudah memenuhi nilai</td>
                            <td>
                                Bab 4
                                <br>
                                Bab 5
                            </td>
                            <td>75</td>
                            <td>50%</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>CP 9</td>
                            <td style="word-wrap: break-word;">Belum memenuhi nilai</td>
                            <td>
                                Bab 5
                                <br>
                                Bab 6
                                <br>
                                Bab 7
                            </td>
                            <td>54</td>
                            <td>15%</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>CP 9</td>
                            <td style="word-wrap: break-word;">Sudah memenuhi nilai</td>
                            <td>Bab 5</td>
                            <td>76</td>
                            <td>30%</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>CP 9</td>
                            <td style="word-wrap: break-word;">Sudah memenuhi nilai</td>
                            <td>
                                Bab 5
                                <br>
                                Bab 6
                                <br>
                                Bab 7
                                <br>
                                Bab 8
                                <br>
                                Bab 9
                            </td>
                            <td>76</td>
                            <td>30%</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>
                                CP 9
                                <br>
                                CP 5
                                <br>
                                CP 4
                            </td>
                            <td style="word-wrap: break-word;">Sudah memenuhi nilai</td>
                            <td>
                                Bab 5
                                <br>
                                Bab 6
                                <br>
                                Bab 7
                            </td>
                            <td>76</td>
                            <td>30%</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>
                                CP 9
                                <br>
                                CP 5
                                <br>
                                CP 4
                            </td>
                            <td style="word-wrap: break-word;">Sudah memenuhi nilai</td>
                            <td>
                                Bab 5
                                <br>
                                Bab 6
                                <br>
                                Bab 7
                            </td>
                            <td>76</td>
                            <td>30%</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
    
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <button class="btn-outline-ocean" onclick="location.href='#'">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>