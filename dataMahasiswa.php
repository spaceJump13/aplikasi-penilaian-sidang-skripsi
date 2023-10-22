<?php
include 'config.php';

if (isset($_POST["import"])) {
    $file_name = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($file_name, "r");
        
        while (($column = fgetcsv($file, 10000, ";")) !== FALSE) {
            $sql_checkNRP = "SELECT * from data_mahasiswa WHERE nrp = \"$column[0]\"";
            $result = mysqli_query($conn, $sql_checkNRP);

            if(mysqli_num_rows($result) == 0){
                $sql_fetch = "SELECT * from data_mahasiswa";
                $result_date = mysqli_query($conn, $sql_fetch);
                $convert_date = date('Y-m-d', strtotime($column[6]));

                    $sql_insert = "INSERT into data_mahasiswa (nrp, nama, pembimbing1, pembimbing2, penguji, ketuaPenguji, tanggal_sidang)
                     values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "', 
                    '" . $convert_date . "')";
                
                    $result = mysqli_query($conn, $sql_insert);
                    
                    if (!empty($result)) {
                        echo "CSV data Imported ";
                    } else {
                        echo "Problem in importing csv";
                    }
                }
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Data Mahasiswa</title>

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

        /* Primary Button Styles */
        .btn-ocean {
        color: white;
        font-weight: 500;
        background-color: #0B6977;
        border-color: #0B6977;
        }

        .btn-ocean:hover {
        background-color: #0B6977;
        border-color: #fff;
        border: 3px solid;
        color: white;
        box-shadow: 2px 2px 5px rgba(215, 24, 123, 0.20);
        }

        .btn-ocean:focus {
        box-shadow: 0 0 0 0.2rem rgba(11, 105, 119, 0.5);
        }
    </style>
</head>
<body style="background-color: #0B6977;">
    <div id="rectangle">
        
        <div class="container"> <!--<div class="container my-5">-->
            <div class="row">
                <div class="col-lg">
                    <div>
                        <h1 style="text-align: center; color: #0B6977">DATA MAHASISWA</h1>
                    </div>
                </div>
            </div>
    
            <form action="" method="GET">
                <div class="row mt-4">
                    <div class="col-lg-3">
                        <div class="input-group mb-3" style="margin-top: 20px;">
                            <input type="text" name="nama" value="<?= isset($_GET['nama']) == true ? $_GET['nama']: '' ?>" 
                            class="form-control" placeholder="Search">
                        </div>
                    </div>
        
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-ocean" style="margin-top: 20px;">Search</button>
                    </div>
    
                    <div class="col-lg-6">
                        <div style="float: right;">
                        <select class="form-select" name="periode" class="Default select example" style="margin-top: 30px;">
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
                <div class="col-lg">
                    <?php
                       // Initialize the SQL query
                        $sql_select = "SELECT * FROM data_mahasiswa";
    
                        if (isset($_GET['nama']) && $_GET['nama'] != '') {
                            $nama = $_GET['nama'];
                            $sql_select .= " WHERE REPLACE(nama, ' ', '') LIKE ?";
                            // If searching by name and periode
                            if (isset($_GET['periode']) && $_GET['periode'] != 'Semua'){
                                $selectedYear = $_GET['periode'];
                                $sql_select .= " AND YEAR(tanggal_sidang) = ?";
                                $stmt = mysqli_prepare($conn, $sql_select);
                                $searchTerm = '%' . str_replace(' ', '', $nama) . '%';
                                mysqli_stmt_bind_param($stmt, "ss", $searchTerm, $selectedYear);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                            }
                            else{
                                // If searching by name
                                $stmt = mysqli_prepare($conn, $sql_select);
                                $searchTerm = '%' . str_replace(' ', '', $nama) . '%';
                                mysqli_stmt_bind_param($stmt, "s", $searchTerm);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                            }
                        } 
                        elseif (isset($_GET['periode']) && $_GET['periode'] != 'Semua') {
                            $selectedYear = $_GET['periode'];
                            $sql_select .= " WHERE YEAR(tanggal_sidang) = ?";
                            // If searching by name and periode
                            if (isset($_GET['nama']) && $_GET['nama'] != ''){
                                $nama = $_GET['nama'];
                                $sql_select .= " AND REPLACE(nama, ' ', '') LIKE ?";
                                $stmt = mysqli_prepare($conn, $sql_select);
                                $searchTerm = '%' . str_replace(' ', '', $nama) . '%';
                                mysqli_stmt_bind_param($stmt, "ss", $selectedYear, $searchTerm);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                            }
                            else{
                                // If searching by period
                                $stmt = mysqli_prepare($conn, $sql_select);
                                mysqli_stmt_bind_param($stmt, "s", $selectedYear);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                            }
                        } 
                        else 
                        {
                            // If not searching by name or period, retrieve all data
                            $result = mysqli_query($conn, $sql_select);
                        }
    
                        if(mysqli_num_rows($result) > 0){
                            ?>
                            <table class="mx-auto table table-striped">
                                <thead style="background-color:#0B6977; color: whitesmoke;">
                                    <tr>
                                        <th>Tanggal Sidang</th>
                                        <th>NRP</th>
                                        <th>Nama</th>
                                        <th>Pembimbing 1</th>
                                        <th>Pembimbing 2</th>
                                        <th>Penguji</th>
                                        <th>Ketua Penguji</th>
                                    </tr>
                                </thead>
                            <?php   
                            while ($row = mysqli_fetch_array($result)){
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo date('d-m-Y', strtotime($row['tanggal_sidang']));?></td>
                                        <td><?php echo $row['nrp'];?></td>
                                        <td><?php echo $row['nama'];?></td>
                                        <td><?php echo $row['pembimbing1'];?></td>
                                        <td><?php echo $row['pembimbing2'];?></td>
                                        <td><?php echo $row['penguji'];?></td>
                                        <td><?php echo $row['ketuaPenguji'];?></td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                            <?php }
                        else{
                            echo '<h3 style="text-align: center;" >Tidak ada data</h3>';
                        }
    
                    ?>
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-lg-6">
                <a href="dataMahasiswa.php" style="color: white; text-decoration: none;"><button type="button" class="btn btn-ocean">Back</button></a>
                </div>
                <div class="col-lg-6">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-ocean" style="float: right;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Import
                    </button>
    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Import CSV</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="modal-body ">
                                    <div class="custom-file">
                                        <label for="file"><h5>Pilih File CSV</h5></label>
                                        <br>
                                        <input type="file" class="custom-file-input" name="file" accept=".csv">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-ocean" data-bs-dismiss="modal" onclick="location.href='#'">Back</button>
                                    <button type="submit" class="btn btn-ocean" name="import">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
