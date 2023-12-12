<?php
    include '../config.php';

    $cpl = $_POST['cpl'];
    $ik = $_POST['ik'];
    $desc_ik = $_POST['desc_ik'];
    $bab = $_POST['bab'];
    $bobot = $_POST['bobot'];
    $penilaian = $_POST['penilaian'];

    $insert_query = "INSERT INTO kriteria_penilaian (cpl, ik, deskripsi_ik, bab, penilaian, bobot) VALUES ('$cpl', '$ik', '$desc_ik', '$bab', '$penilaian', '$bobot')";
    $result = mysqli_query($conn, $insert_query);
    
    if($result){
        echo "berhasil";
    }
    else{
        echo "gagal";
    }
?>