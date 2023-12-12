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

    $criteriaList = [
        'judul' => '%judul%',
        'bab_1_2' => 'bab 1-2',
        'bab_3_4_infor' => '%infor%',
        'bab_3_4_sib' => '%sib%',
        'buku' => '%buku%',
        'kesimpulan' => '%kesimpulan%',
        'program' => '%program%',
    ];
    
    $bobotValues = [];
    
    foreach ($criteriaList as $key => $value) {
        $sql = "SELECT * FROM kriteria_penilaian WHERE bab LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $value);
            mysqli_stmt_execute($stmt);
    
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
    
            $bobotValues[$key] = $row['bobot'];
    
            mysqli_stmt_close($stmt);
        }
    }

    $totalSum = floatval(($judul_dan_abstrakValue * $bobotValues['judul']) + 
    ($bab_1_2 * $bobotValues['bab_1_2']) + 
    ($bab_3_4_sibValue * $bobotValues['bab_3_4_sib']) + 
    ($bab_3_4_inforValue * $bobotValues['bab_3_4_infor']) + 
    ($bukuValue * $bobotValues['buku']) + 
    ($bab_5_kesimpulanValue * $bobotValues['kesimpulan']) + 
    ($programValue * $bobotValues['program']));

    $formatted = number_format($totalSum, 2);


    $response = array(
        'totalSum' => $formatted
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

    $criteriaList = [
        'judul' => '%judul%',
        'bab_1_2' => 'bab 1-2',
        'bab_3_4_infor' => '%infor%',
        'bab_3_4_sib' => '%sib%',
        'buku' => '%buku%',
        'kesimpulan' => '%kesimpulan%',
        'program' => '%program%',
    ];
    
    $bobotValues = [];
    
    foreach ($criteriaList as $key => $value) {
        $sql = "SELECT * FROM kriteria_penilaian WHERE bab LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 's', $value);
            mysqli_stmt_execute($stmt);
    
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
    
            $bobotValues[$key] = $row['bobot'];
    
            mysqli_stmt_close($stmt);
        }
    }

    $nilai_akhir = floatval(($judul_dan_abstrakValue * $bobotValues['judul']) + 
    ($bab_1_2 * $bobotValues['bab_1_2']) + 
    ($bab_3_4_sibValue * $bobotValues['bab_3_4_sib']) + 
    ($bab_3_4_inforValue * $bobotValues['bab_3_4_infor']) + 
    ($bukuValue * $bobotValues['buku']) + 
    ($bab_5_kesimpulanValue * $bobotValues['kesimpulan']) + 
    ($programValue * $bobotValues['program']));

    $already_input = "SELECT * FROM penilaian WHERE mahasiswa LIKE '%$nama_mhs%' AND dosen LIKE '%$nama_dosen%'";
    $check = mysqli_query($conn, $already_input);

//    if (mysqli_num_rows($check) >= 1){
//         echo "Sudah pernah input";
//    }
//    else{
        echo "Belum input";
        $sql = "INSERT INTO `penilaian` (`id_penilaian`, `mahasiswa`, `judul_abstrak`, `bab_1_2`, `bab_3_4_sib`,`bab_3_4_infor`, `buku`, `kesimpulan`, `program`, `nilai_akhir`, `dosen`) VALUES 
        (' ', '$nama_mhs', '$judul_dan_abstrakValue', '$bab_1_2', '$bab_3_4_sibValue', '$bab_3_4_inforValue', '$bukuValue', '$bab_5_kesimpulanValue', '$programValue', '$nilai_akhir', '$nama_dosen')";
        $result = mysqli_query($conn, $sql);
    //}
}

?>