<?php
include 'config.php';

$sql = "SELECT * FROM kriteria_penilaian";
$result_kriteria = mysqli_query($conn, $sql);

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
    <link rel="stylesheet" href="navbar.css">
    <title>Atur Bobot Nilai</title>
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

    .btn.btn-outline-sage {
        color: #fff; 
        background-color: #527853; 
        border: 3px solid #527853; 
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
   
    .btn.btn-outline-sage:hover {
        color: #527853; 
        background-color: #fff; 
        border-color: #527853; 
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
                    <h1 style="text-align: center; color: #0B6977" class="text-uppercase">kriteria penilaian</h1>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <div id="searchResult">
                    <table class="mx-auto table table-striped">
                        <thead style="background-color:#0B6977; color: whitesmoke; text-align: center;">
                            <tr>
                                <th style="width: 70px;">CPL</th>
                                <th>IK</th>
                                <th>Deskripsi IK</th>
                                <th>Bab</th>
                                <th>Penilaian</th>
                                <th>Bobot</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                    
                        <tbody style="text-align: center;">
                            <?php if (mysqli_num_rows($result_kriteria) > 0): ?>
                                <?php while($row = mysqli_fetch_assoc($result_kriteria)): ?>
                                <tr>
                                    <td><?php echo $row['cpl'];?></td>
                                    <td><?php echo $row['ik'];?></td>
                                    <td><?php echo $row['deskripsi_ik'];?></td>
                                    <td><?php echo $row['bab'];?></td>
                                    <td><?php echo $row['penilaian'];?></td>
                                    <td><?php echo $row['bobot'];?></td>
                                    <td>
                                    <button class="btn btn-outline-sage edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" 
                                        data-id="<?php echo $row['id_kriteria']; ?>" 
                                        data-cpl="<?php echo $row['cpl']; ?>" 
                                        data-ik="<?php echo $row['ik']; ?>" 
                                        data-desc_ik="<?php echo $row['deskripsi_ik']; ?>" 
                                        data-bab="<?php echo $row['bab']; ?>" 
                                        data-bobot="<?php echo $row['bobot']; ?>" 
                                        data-penilaian="<?php echo $row['penilaian']; ?>">
                                        Edit
                                    </button>

                                    </td>
                                    <td>
                                        <button class="btn btn-outline-red delete-btn" data-id="<?php echo $row['id_kriteria']; ?>" >Delete</button>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="9"><h4 style="color: #0B6977;">Tidak ada data.</h4></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 40%;">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria Penilaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">

                        <label for="modal-cpl"><h5>CPL</h5></label>
                        <input type="text" name="modal-cpl" id="modal-cpl" class="form-control" placeholder="CPL">
                        
                        <div style="display: none;">
                            <label for="modal-id"><h5>ID</h5></label>
                            <input type="text" name="modal-id" id="modal-id" class="form-control" placeholder="id">
                        </div>
                        
                        <div class="mt-3">
                            <label for="modal-ik"><h5>IK</h5></label>
                            <input type="number" step="0.1" name="modal-ik" id="modal-ik" class="form-control" placeholder="0,1">
                        </div>
                        
                        <div class="mt-3">
                            <label for="modal-desc_ik"><h5>Deskripsi IK</h5></label>
                            <textarea class="form-control" name="modal-desc_ik" id="modal-desc_ik" rows="3" placeholder="Deskripsi"></textarea>
                        </div>
                        
                        <div class="mt-3">
                            <label for="modal-cpl"><h5>Bab</h5></label>
                            <input type="text" name="modal-bab" id="modal-bab" class="form-control" placeholder="Bab">
                        </div>
                        
                        <div class="mt-3">
                            <label for="modal-bobot"><h5>Bobot</h5></label>
                            <input type="number" step="0.01" name="modal-bobot" id="modal-bobot" class="form-control" placeholder="0,01">
                        </div>
                        
                        <div class="mt-3 mb-3">
                            <label for="modal-penilaian"><h5>Penilaian</h5></label>
                            <textarea class="form-control" name="penilaian" id="modal-penilaian" rows="3" placeholder="Penilaian"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-red" data-bs-dismiss="modal">Close</button>
                    <!-- <a href="editKriteria.php?id="data-id" class="btn btn-outline-sage" id="saveEditButton">Save Edit</a> -->
                    <!-- <a href="ajax_editKriteria.php?id=" data-id="" id="saveEditButton" class="btn btn-outline-sage">Save Edit</a> -->
                    <button class="btn btn-outline-sage" id="saveEditButton">Save Edit</button>
                </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-12 d-flex justify-content-end">
                <a href="addKriteriaPage.php" class="text-decoration-none"><button class="btn btn-outline-ocean">Add Kriteria</button></a>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('.delete-btn').on('click', function(){
            var recordId = $(this).data("id");
            console.log(recordId)
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#B31312",
                cancelButtonColor: "#31304D",
                confirmButtonText: "Delete!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to delete script or make an AJAX call to delete the record
                    window.location.href = "deleteKriteria.php?id=" + recordId;
                }
            });
        })

        $('.edit-btn').on('click', function() {
            var modal = $('#editModal');
            var id = $(this).data('id');
            var cpl = $(this).data('cpl');
            var ik = $(this).data('ik');
            var desc_ik = $(this).data('desc_ik');
            var bab = $(this).data('bab');
            var bobot = $(this).data('bobot');
            var penilaian = $(this).data('penilaian');

            // Update modal content
            modal.find('#modal-id').val(id);
            modal.find('#modal-cpl').val(cpl);
            modal.find('#modal-ik').val(ik);
            modal.find('#modal-desc_ik').val(desc_ik);
            modal.find('#modal-bab').val(bab);
            modal.find('#modal-bobot').val(bobot);
            modal.find('#modal-penilaian').val(penilaian);

            console.log(cpl)
            console.log(id)

            // var saveEditButton = $('#saveEditButton');
            // saveEditButton.attr('href', 'editKriteria.php?id=' + id);
        });

        $('#saveEditButton').on('click', function() {
            var modal_id = $('#modal-id').val();
            var updated_cpl = $('#modal-cpl').val();
            var updated_ik = $('#modal-ik').val();
            var updated_desc_ik = $('#modal-desc_ik').val();
            var updated_bab = $('#modal-bab').val();
            var updated_bobot = $('#modal-bobot').val();
            var updated_penilaian = $('#modal-penilaian').val();
            console.log(modal_id);

            $.ajax({
                url: "ajax/ajax_editKriteria.php",
                method: "POST",
                data: {
                    id_kriteria: modal_id,
                    updated_cpl: updated_cpl,
                    updated_ik: updated_ik,
                    updated_desc_ik: updated_desc_ik,
                    updated_bab: updated_bab,
                    updated_bobot: updated_bobot,
                    updated_penilaian: updated_penilaian
                },
                success: function(respond) {
                    var trim_respond = respond.trim();

                    if(trim_respond == "berhasil"){
                        Swal.fire({
                            title: "Berhasil",
                            text: "Perubahan telah disimpan!",
                            icon: "success"
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
                            title: "Gagal",
                            text: "Terjadi kesalahan!",
                            icon: "error"
                        });
                    }
                },
                error: function() {
                    alert("gagal");
                }
            })
        });
    })
</script>
</html>