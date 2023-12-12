<?php
    include '../config.php';

    $id_kriteria = isset($_POST['id_kriteria']) ? $_POST['id_kriteria'] : ' ';
    $updated_cpl = isset($_POST['updated_cpl']) ? $_POST['updated_cpl'] : ' ';
    $updated_ik = isset($_POST['updated_ik']) ? $_POST['updated_ik'] : ' ';
    $updated_desc_ik = isset($_POST['updated_desc_ik']) ? $_POST['updated_desc_ik'] : ' ';
    $updated_bab = isset($_POST['updated_bab']) ? $_POST['updated_bab'] : ' ';
    $updated_bobot = isset($_POST['updated_bobot']) ? $_POST['updated_bobot'] : ' ';
    $updated_penilaian = isset($_POST['updated_penilaian']) ? $_POST['updated_penilaian'] : ' ';

    $sql_update = "UPDATE `kriteria_penilaian` 
            SET
            `cpl`='$updated_cpl',
            `ik`='$updated_ik',
            `deskripsi_ik`='$updated_desc_ik',
            `bab`='$updated_bab',
            `penilaian`='$updated_penilaian',
            `bobot`='$updated_bobot' WHERE id_kriteria = '$id_kriteria'";
    $result_update = mysqli_query($conn, $sql_update);

    if ($result){
        echo "berhasil";
    }
    else{
        echo "gagal";
    }
?>