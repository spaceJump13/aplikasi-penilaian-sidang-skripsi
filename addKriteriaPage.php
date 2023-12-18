<?php
include 'config.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

$fetch_kriteria = "SELECT * FROM kriteria_penilaian";
$result_kriteria = mysqli_query($conn, $fetch_kriteria);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="navbar.css">
    <title>Add Kriteria</title>
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
    padding-bottom: 200px;
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

    .btn.btn-outline-green {
    color: #fff; 
    background-color: #1B4242; 
    border: 3px solid #1B4242; 
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
   
    .btn.btn-outline-green:hover {
    color: #1B4242; 
    background-color: #fff; 
    border-color: #1B4242; 
    }

    .btn.btn-outline-red {
    color: #fff; 
    background-color: #B31312; 
    border: 3px solid #B31312; 
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
   
    .btn.btn-outline-red:hover {
    color: #B31312; 
    background-color: #fff; 
    border-color: #B31312; 
    }

    .listMhs{
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    background-color: #fff;
    }

    .error-message {
            color: red;
    }

    .is-invalid {
        border: 1px solid red !important;
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
                    <a class="text-decoration-none" href="vakasi.php">Vakasi</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="dataMahasiswa.php">Data Mahasiswa</a>
                </li>
                <li class="nav-link">
                    <a class="text-decoration-none" href="beritaAcara.php">Berita Acara</a>
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
        <div class="container-lg">
            <div class="row mt-5 mb-4">
                <div class="col-sm-12" style="background-color: #0B6977; border:5px solid #427D9D;">
                    <h1 style="text-align: center; color: #fff" class="text-uppercase">add kriteria penilaian</h1>
                </div>
            </div>
    
            <form action="" method="post">

                <div class="row mt-3">

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="cpl"><h5>CPL</h5></label>
                                <input type="text" name="cpl" id="cpl" class="form-control" placeholder="CPL">
                                <div class="error-message" id="emptyCpl"></div>
                            </div>
                        </div>
    
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label for="ik"><h5>IK</h5></label>
                                <input type="number" step="0.1" name="ik" id="ik" class="form-control" placeholder="0,1">
                                <div class="error-message" id="emptyIK"></div>
                            </div>
                        </div>
    
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label for="desc_ik"><h5>Deskripsi IK</h5></label>
                                <textarea class="form-control" name="desc_ik" id="desc_ik" rows="3" placeholder="Deskripsi"></textarea>
                                <div class="error-message" id="emptyDescIK"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="cpl"><h5>Bab</h5></label>
                                <input type="text" name="bab" id="bab" class="form-control" placeholder="Bab">
                                <div class="error-message" id="emptyBab"></div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label for="bobot"><h5>Bobot</h5></label>
                                <input type="number" step="0.01" name="bobot" id="bobot" class="form-control" placeholder="0,01">
                                <div class="error-message" id="emptyBobot"></div>
                            </div>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <label for="penilaian"><h5>Penilaian</h5></label>
                                <textarea class="form-control" name="penilaian" id="penilaian" rows="3" placeholder="Penilaian"></textarea>
                                <div class="error-message" id="emptyPenilaian"></div>
                            </div>
                        </div>                       
                    </div>

                </div>
                
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <a href="aturBobot.php" class="btn btn-outline-ocean">Back</a>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-end">
                        <button class="btn btn-outline-red mr-3">Reset</button>
                        <button class="btn btn-outline-ocean" id="tambah" name="tambah">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){

        var cplFilled = false;
        var ikFilled = false;
        var desc_ikFilled = false;
        var babFilled = false;
        var bobotFilled = false;
        var penilaianFilled = false;

        $("#cpl").on("input", function() {
            if ($(this).val() !== "") {
                $("#emptyCpl").text('');
                $(this).removeClass('is-invalid');
                cplFilled = true;
            }
            else{
                cplFilled = false;
            }
        });

        $("#ik").on("input", function() {
            if ($(this).val() !== "") {
                $("#emptyIK").text('');
                $(this).removeClass('is-invalid');
                ikFilled = true;
            }
            else{
                ikFilled = false;
            }
        });


        $("#desc_ik").on("input", function() {
            if ($(this).val() !== "") {
                $("#emptyDescIK").text('');
                $(this).removeClass('is-invalid');
                desc_ikFilled = true;
            }
            else{
                desc_ikFilled = false;
            }
        });

        $("#bab").on("input", function() {
            if ($(this).val() !== "") {
                $("#emptyBab").text('');
                $(this).removeClass('is-invalid');
                babFilled = true;
            }
            else{
                babFilled = false;
            }
        });

        $("#bobot").on("input", function() {
            if ($(this).val() !== "") {
                $("#emptyBobot").text('');
                $(this).removeClass('is-invalid');
                bobotFilled = true;
            }
            else{
                bobotFilled = false;
            }
        });

        $("#penilaian").on("input", function() {
            if ($(this).val() !== "") {
                $("#emptyPenilaian").text('');
                $(this).removeClass('is-invalid');
                penilaianFilled = true;
            }
            else{
                penilaianFilled = false;
            }
        });

        $('#tambah').on('click', function(){
            var cpl = $('#cpl').val();
            var ik = $('#ik').val();
            var desc_ik = $('#desc_ik').val();
            var bab = $('#bab').val();
            var bobot = $('#bobot').val();
            var penilaian = $('#penilaian').val();

            event.preventDefault();

            if (!cplFilled || !ikFilled || !desc_ikFilled || !babFilled || !bobotFilled || !penilaianFilled){
                    if(cpl == ""){
                        $("#emptyCpl").text('CPL harus diisi.');
                        $("#cpl").addClass('is-invalid');
                    }
    
                    if(ik == ""){
                        $("#emptyIK").text('IK harus diisi.');
                        $("#ik").addClass('is-invalid');
                    }

                    if(desc_ik == ""){
                        $("#emptyDescIK").text('Deskripsi harus diisi.');
                        $("#desc_ik").addClass('is-invalid');
                    }

                    if(bab == ""){
                        $("#emptyBab").text('Bab harus diisi.');
                        $("#bab").addClass('is-invalid');
                    }

                    if(bobot == ""){
                        $("#emptyBobot").text('Bobot harus diisi.');
                        $("#bobot").addClass('is-invalid');
                    }

                    if(penilaian == ""){
                        $("#emptyPenilaian").text('Penilaian harus diisi.');
                        $("#penilaian").addClass('is-invalid');
                    }
                    Swal.fire({
                        title: "Masih ada field yang kosong!",
                        text: "Silakan isi field yang kosong!",
                        icon: "error"
                    });
            }

            else{
                $.ajax({
                    url: "ajax/ajax_addKriteria.php",
                    type: "POST",
                    data: {
                        cpl: cpl,
                        ik: ik,
                        desc_ik: desc_ik,
                        bab: bab,
                        bobot: bobot,
                        penilaian: penilaian
                    },
                    success: function(respond) {
                        console.log(respond)
                        var trim_respond = respond.trim();
    
                        if(trim_respond == "berhasil"){
                            Swal.fire({
                                icon: "success",
                                title: "Kriteria Ditambah!",
                                text: "Berhasil menambahkan kriteria penilaian!",
                            }).then((result) => {
                                // Check if the user clicked "OK"
                                if (result.isConfirmed) {
                                    // Refresh the page
                                    location.reload();
                                }
                            });
                        }
                        else{
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Failed to add data",
                            });
                        }
                    },
                    error: function() {
                        alert("gagal");
                    }
                });
            }
        })
    })
</script>
</html>