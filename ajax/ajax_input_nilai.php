<?php
include '../config.php';

$tanda = $_POST['tanda'];

if ($tanda == 'status_dosen') {
    $nama_mhs = $_POST['nama_mhs'];
    $nama_dosen = $_POST['nama_dosen'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$nama_mhs%' AND ketua_penguji LIKE '%$nama_dosen%'";
    $result = mysqli_query($conn, $sql);
    $status = '';

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0){
        $status = "Ketua Penguji";
        //echo $status;
    }
    else{
        $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$nama_mhs%' AND anggota_penguji LIKE '%$nama_dosen%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            $status = "Anggota Penguji";
            //echo $status;
        }
        else{
            $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$nama_mhs%' AND pembimbing_1 LIKE '%$nama_dosen%'";
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) > 0){
                $status = "Pembimbing 1";
                //echo $status;
            }
            else{
                $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$nama_mhs%' AND pembimbing_2 LIKE '%$nama_dosen%'";
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) > 0){
                    $status = "Pembimbing 2";
                    //echo $status;
                }
            }
        }
    }

    $response = array(
        'status' => $status
    );

    // Send the response as JSON
    echo json_encode($response);
    exit;
}

elseif($tanda == 'hitungNilai'){
    $judul_dan_abstrakValue = floatval($_POST['judul_dan_abstrakValue']);
    $bab_1_2 = floatval($_POST['bab_1_2']);
    $bab_3_4_sibValue = floatval($_POST['bab_3_4_sibValue']);
    $bab_3_4_inforValue = floatval($_POST['bab_3_4_inforValue']);
    $bukuValue = floatval($_POST['bukuValue']);
    $bab_5_kesimpulanValue = floatval($_POST['bab_5_kesimpulanValue']);
    $programValue = floatval($_POST['programValue']);

    $totalSum = floatval(($judul_dan_abstrakValue * 0.05) + ($bab_1_2 * 0.1) + ($bab_3_4_sibValue * 0.25) + ($bab_3_4_inforValue * 0.25) + ($bukuValue * 0.1) + 
    ($bab_5_kesimpulanValue * 0.25) + ($programValue * 0.25));


    $response = array(
        'totalSum' => $totalSum
    );

    // Send the response as JSON
    echo json_encode($response);
    exit;
}

elseif($tanda == 'inputNilai'){
    $nama_mhs = $_POST['nama_mhs'];
    $nama_dosen = $_POST['nama_dosen'];
    $judul_dan_abstrakValue = floatval($_POST['judul_dan_abstrakValue']);
    $bab_1_2 = floatval($_POST['bab_1_2']);
    $bab_3_4_sibValue = floatval($_POST['bab_3_4_sibValue']);
    $bab_3_4_inforValue = floatval($_POST['bab_3_4_inforValue']);
    $bukuValue = floatval($_POST['bukuValue']);
    $bab_5_kesimpulanValue = floatval($_POST['bab_5_kesimpulanValue']);
    $programValue = floatval($_POST['programValue']);

    $nilai_akhir = floatval(($judul_dan_abstrakValue * 0.05) + ($bab_1_2 * 0.1) + ($bab_3_4_sibValue * 0.25) + ($bab_3_4_inforValue * 0.25) + ($bukuValue * 0.1) + 
    ($bab_5_kesimpulanValue * 0.25) + ($programValue * 0.25));

    $already_input = "SELECT * FROM penilaian WHERE mahasiswa LIKE '%$nama_mhs%' AND dosen LIKE '%$nama_dosen%'";
    $check = mysqli_query($conn, $already_input);

   if (mysqli_num_rows($check) >= 1){
        echo "Sudah pernah input";
   }
   else{
        echo "Belum input";
        $sql = "INSERT INTO `penilaian` (`id_penilaian`, `mahasiswa`, `judul_abstrak`, `bab_1_2`, `bab_3_4_sib`,`bab_3_4_infor`, `buku`, `kesimpulan`, `program`, `nilai_akhir`, `dosen`) VALUES 
        (' ', '$nama_mhs', '$judul_dan_abstrakValue', '$bab_1_2', '$bab_3_4_sibValue', '$bab_3_4_inforValue', '$bukuValue', '$bab_5_kesimpulanValue', '$programValue', '$nilai_akhir', '$nama_dosen')";
        $result = mysqli_query($conn, $sql);
    }
}

?>