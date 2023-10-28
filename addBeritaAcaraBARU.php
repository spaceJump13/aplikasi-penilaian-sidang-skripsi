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
    <title>Add Berita Acara</title>
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

        /* Style the time input field */
        .form-control[type="time"] {
        width: 100%; /* Set the width to 100% of its container (adjust as needed) */
        padding: 10px; /* Add padding to the input */
        font-size: 16px; /* Set the font size (adjust as needed) */
        border: 1px solid #ccc; /* Add a border */
        border-radius: 5px; /* Add rounded corners */
        background-color: #fff; /* Background color of the input */
        color: #333; /* Text color */
        /* Add more styles as needed */
        }

        /* Style the input when it's in focus (clicked or selected) */
        .form-control[type="time"]:focus {
        border-color: #007bff; /* Change the border color on focus */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Add a shadow on focus */
        /* Add more focus styles as needed */
        }
    </style>
</head>
<body style="background-color: #0B6977;">
    <div id="rectangle">
        <div class="container"> <!--<div class="container my-5">-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align: center; color: #0B6977" class="text-uppercase">Tambah Berita</h1>
                </div>
            </div>
    
            <form action="" method="POST">   
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama_mhs"><h5>Mahasiswa</h5></label>
                                <select class="form-select" aria-label="Default select example" name="nama_mhs" id="nama_mhs">
                                    <option>Pilih Mahasiswa</option>
                                </select>
                
                            <br>
        
                            <label for="judul_skripsi"><h5>Judul Skripsi</h5></label>
                            <input type="text" name="judul_skripsi" id="judul_skripsi" class="form-control" placeholder="Judul Skripsi">
        
                            <br>
        
                            <label for="konsentrasi"><h5>Konsenstrasi Skripsi</h5></label>
                            <select class="form-select" aria-label="Default select example" name="konsentrasi" id="konsentrasi">
                                <option selected>Konsentrasi Skripsi</option>
                                <option value="1">AI</option>
                                <option value="2">Cyber Security</option>
                                <option value="3">Game Development</option>
                                <option value="4">Mobile Application Development</option>
                                <option value="5">Enterprise Information System</option>
                                <option value="6">Business Intelligence</option>
                            </select>
        
                            <br>
                            
                            <label for="tanggalSidang"><h5>Tanggal Sidang</h5></label>
                            <input type="datetime-local" name="tanggalSidang" id="tanggalSidang" class="form-control">
        
                            <br>

                            <label for="ruangSidang"><h5>Ruang Sidang</h5></label>
                            <br>
                                <select class="form-select" aria-label="Default select example" name="ruangSidang" id="ruangSidang">
                                    <option selected>Select</option>
                                    <option value="1">P308</option>
                                    <option value="2">P309</option>
                                    <option value="3">P307</option>
                                    <option value="4">P318</option>
                                    <option value="5">Lab MM</option>
                                    <option value="6">Lab PG</option>
                                    <option value="7">Lab Studio</option>
                                </select>
                            
                            <br>
                            
                            <label><h5>Nilai Sidang</h5></label>
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="cpmk1">CPMK 1</label>
                                        </div>
                                        <input type="number" name="cpmk1" id="cpmk1" class="form-control" placeholder="Nilai">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="cpmk2">CPMK 2</label>
                                        </div>
                                        <input type="number" name="cpmk2" id="cpmk2" class="form-control" placeholder="Nilai">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="cpmk3">CPMK 3</label>
                                        </div>
                                        <input type="number" name="cpmk3" id="cpmk3" class="form-control" placeholder="Nilai">
                                    </div>
                                </div>
                            </div>
                            <label for="catatanSidang" style="margin-top: 5px;"><h5>Catatan Sidang</h5></label>
                            <textarea class="form-control" id="catatanSidang" rows="6" placeholder="Catatan"></textarea>
                            
                        </div>
                    </div>
                    
                    </select>
                    <!-- table kanan -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="ketuaPenguji"><h5>Ketua Penguji</h5></label>
                                    <select class="form-select" aria-label="Default select example" name="ketuaPenguji" id="ketuaPenguji">
                                        <option selected>Select</option>
                                        <?php
                                            $sql_dosen = "SELECT * FROM data_dosen ORDER BY nip;";
                                            $result_dosen = mysqli_query($conn, $sql_dosen);
                                            while ($row = mysqli_fetch_assoc($result_dosen)){
                                        ?>
                                            <option value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                
    
                                <div class="col-lg-2">
                                    <div class="form-check checkbox-lg" style="margin-top: 40px;">
                                        <input class="form-check-input" type="checkbox" value="" id="kehadiranKetuaPenguji" name="kehadiranKetuaPenguji">
                                        <label class="form-check-label" for="flexCheckDefault" style="margin-top: -40px;">Hadir</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" style="margin-top: 24px;">
                                <div class="col-lg-10">
                                    <label  for="dosenPenguji"><h5>Dosen Penguji</h5></label>
                                    <input type="text" name="dosenPenguji" id="dosenPenguji" class="form-control" placeholder="Dosen Penguji">
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="form-check checkbox-lg" style="margin-top: 40px;">
                                        <input class="form-check-input" type="checkbox" value="" id="kehadiranDosenPenguji" name="kehadiranDosenPenguji">
                                        <label class="form-check-label" for="flexCheckDefault" style="margin-top: -40px;">Hadir</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row" style="margin-top: 24px;">
                                <div class="col-lg-10">
                                    <label for="dosenPembimbing1"><h5>Dosen Pembimbing 1</h5></label>
                                    <select class="form-select" aria-label="Default select example" name="dosenPembimbing1">
                                        <option selected>Select</option>
                                        <option value="1">Silvia</option>
                                        <option value="2">Henry</option>
                                        <option value="3">Agus</option>
                                        <option value="4">Stephanus</option>
                                        <option value="5">Adi</option>
                                        <option value="6">Djoni</option>
                                        <option value="7">Liliana</option>
                                    </select>
                                </div>
    
                                <div class="col-lg-2">
                                    <div class="form-check checkbox-lg" style="margin-top: 40px;">
                                        <input class="form-check-input" type="checkbox" value="" id="kehadiranPembimbing1" name="kehadiranPembimbing1">
                                        <label class="form-check-label" for="flexCheckDefault" style="margin-top: -40px;">Hadir</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row" style="margin-top: 24px;">
                                <div class="col-lg-10">
                                    <label for="dosenPembimbing2"><h5>Dosen Pembimbing 2</h5></label>
                                    <select class="form-select" aria-label="Default select example" name="dosenPembimbing2">
                                        <option selected>Select</option>
                                        <option value="1">Silvia</option>
                                        <option value="2">Henry</option>
                                        <option value="3">Agus</option>
                                        <option value="4">Stephanus</option>
                                        <option value="5">Adi</option>
                                        <option value="6">Djoni</option>
                                        <option value="7">Liliana</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check checkbox-lg" style="margin-top: 40px;">
                                        <input class="form-check-input" type="checkbox" value="" id="kehadiranPembimbing2" name="kehadiranPembimbing2">
                                        <label class="form-check-label" for="flexCheckDefault" style="margin-top: -40px;">Hadir</label>
                                    </div>
                                </div>
                            </div>
                    
                            <br>
                            
                            <label for="" style="margin-top: -1px;"><h5>Tugas Tambahan</h5></label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="poster" value="option1">
                                <label class="form-check-label" for="poster">Poster</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="video" value="option2">
                                <label class="form-check-label" for="video">Video</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="penelitian" value="option3">
                                <label class="form-check-label" for="penelitian">Laporan Penelitian</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="jurnal" value="option4">
                                <label class="form-check-label" for="jurnal">Jurnal</label>
                            </div>
    
                            <br>
    
                            <label class="form-label" for="customFile" style="margin-top: 15px;"><h5>Input Tugas</h5></label>
                            <input type="file" class="form-control" id="customFile">
    
                            <br>
                            <label for=""><h5>Nilai CPL (Averaged)</h5></label>
                            <div class="col-sm-12">
                                <div class="table-responsive" id="tabel_cpl">
                                    <table class="table table-bordered">
                                        <thead style="width: 10px;">
                                            <tr>
                                                <th scope="col" style="width: 5px;">1</th>
                                                <th scope="col">2</th>
                                                <th scope="col">3</th>
                                                <th scope="col">4</th>
                                                <th scope="col">5</th>
                                                <th scope="col">6</th>
                                                <th scope="col">7</th>
                                                <th scope="col">8</th>
                                                <th scope="col">9</th>
                                                <th scope="col">10</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-outline w-25">
                                                        <input type="number" name="cpl1" id="cpl1">
                                                    </div>
                                                </td>
                                                <td><input type="number" name="cpl2" id="cpl2"></td>
                                                <td><input type="number" name="cpl3" id="cpl3"></td>
                                                <td><input type="number" name="cpl4" id="cpl4"></td>
                                                <td><input type="number" name="cpl5" id="cpl5"></td>
                                                <td><input type="number" name="cpl6" id="cpl6"></td>
                                                <td><input type="number" name="cpl7" id="cpl7"></td>
                                                <td><input type="number" name="cpl8" id="cpl8"></td>
                                                <td><input type="number" name="cpl9" id="cpl9"></td>
                                                <td><input type="number" name="cpl10" id="cpl10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
    
                            <br>
    
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5>Nilai Akhir: A</h5>
                                </div>
                                <div class="col-lg-6">
                                    <h5 style="margin-left: 40px" >Hasil Sidang: Lulus</h5>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
    
                <div class="row" style="margin-top: 5px;">
                    <div class="col-lg-6">
                        <button class="btn btn-danger" style="float: right;">Discard</button>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-dark" name="add" id="add">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $('#ketuaPenguji').on('change', function(){
                var ketuaPenguji = $(this).val();
                console.log(ketuaPenguji);
                $.ajax({
                    url: "ajax_berita_acara.php",
                    type: "POST",
                    data:{
                        tanda: "Mahasiswa",
                        id:ketuaPenguji
                    },
                    success:function(respond){
                        $("#nama_mhs").html(respond);
                    },
                    error:function(){
                        alert("gagal");
                    }
                })
            })

            $('#nama_mhs').on('change', function(){
                var nama_mhs = $(this).val();
                console.log(nama_mhs);
                $.ajax({
                    url: "ajax_berita_acara.php",
                    type: "POST",
                    data:{
                        tanda: "Judul",
                        id:nama_mhs               
                    },
                    success:function(respond){
                        console.log(respond);
                        $("#judul_skripsi").val(respond);
                    },
                    error:function(){
                        alert("gagal");
                    }
                })
            })

            $('#nama_mhs').on('change', function(){
                var nama_mhs = $(this).val();
                console.log(nama_mhs);
                $.ajax({
                    url: "ajax_berita_acara.php",
                    type: "POST",
                    data:{
                        tanda: "Penguji",
                        id:nama_mhs               
                    },
                    success:function(respond){
                        console.log(respond);
                        $("#dosenPenguji").val(respond);
                    },
                    error:function(){
                        alert("gagal");
                    }
                })
            })

            $("#add").on("click", function() {
                var judulSkripsi = $("#judul_skripsi").val();
                var namaMhs = $("#nama_mhs").val();
                var ketuaPenguji = $("#ketuaPenguji").val();
                var tanggalSidang = $("#tanggalSidang").val();
                var ruangSidang = $("#ruangSidang").val();
                var konsentrasi = $("#konsentrasi").val();
                var status_ketua = ""

                if ($('#kehadiranKetuaPenguji').is(':checked')) {
                    status_ketua = "Ketua Penguji";
                    // console.log(status_ketua);
                    alert('Checkbox is checked');
                }
                if ($('#kehadiranDosenPenguji').is(':checked')) {
                    var status_penguji = "Anggota Penguji";
                    // alert('Checkbox is checked');
                }
                // if ($('#kehadiranPembimbing1').is(':checked')) {
                //     var status_pembimbing1 = "Pembimbing 1";
                //     // alert('Checkbox is checked');
                // }
                // if ($('#kehadiranPembimbing2').is(':checked')) {
                //     var status_pembimbing2 = "Pembimbing 2";
                //     // alert('Checkbox is checked');
                // }

                
                $.ajax({
                    url: "ajax_berita_acara.php",
                    method: "POST",
                    data: {
                        judulSkripsi: judulSkripsi,
                        namaMhs: namaMhs,
                        ketuaPenguji: ketuaPenguji,
                        tanggalSidang: tanggalSidang,
                        ruangSidang: ruangSidang,
                        status_ketua: status_ketua,
                        statusPenguji: status_penguji,
                        konsentrasi: konsentrasi,
                        // statusPembimbing1: status_pembimbing1,
                        // statusPembimbing2: status_pembimbing2,
                        tanda: "Insert"
                    },
                    success: function(respond) {
                        $("#add").html(respond)
                        alert("Berhasil add!");
                    },
                    error: function() {
                        alert("An error occurred during the insertion.");
                    }
                });
            });
        });
    </script>
</body>
</html>