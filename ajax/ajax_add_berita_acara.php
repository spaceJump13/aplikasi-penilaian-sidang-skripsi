<?php
include '../config.php';

$tanda = $_POST['tanda'];

if ($tanda == 'Judul'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    if ($row = mysqli_fetch_assoc($result)){
        $judul_skripsi = trim($row['judul_skripsi']);
        //echo $judul_skripsi;
    }

    $response = array(
        'judul' => $judul_skripsi
    );
    echo json_encode($response);
    exit;
}
elseif ($tanda == 'Penguji'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    if ($row = mysqli_fetch_assoc($result)){
        $dosen_penguji = trim($row['anggota_penguji']);
        //echo $dosen_penguji;
    }

    $response = array(
        'dosen_penguji' => $dosen_penguji
    );
    echo json_encode($response);
    exit;
}
elseif ($tanda == 'Pembimbing_1'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    if ($row = mysqli_fetch_assoc($result)){
        $dosen_pembimbing_1 = trim($row['pembimbing_1']);
        //echo trim($dosen_pembimbing_1);
    }

    $response = array(
        'dosen_pembimbing_1' => $dosen_pembimbing_1
    );
    echo json_encode($response);
    exit;
}
elseif ($tanda == 'Pembimbing_2'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    if ($row = mysqli_fetch_assoc($result)){
        $dosen_pembimbing_2 = trim($row['pembimbing_2']);
        if (empty($dosen_pembimbing_2)){
            $dosen_pembimbing_2 = "-";
        }
    }

    $response = array(
        'dosen_pembimbing_2' => $dosen_pembimbing_2
    );
    echo json_encode($response);
    exit;
}
elseif ($tanda == 'Mahasiswa'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE ketua_penguji LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    echo '<option>Pilih Mahasiswa</option>';
    while ($row = mysqli_fetch_assoc($result)){
        echo '<option value="' . $row['mahasiswa'] . '">' . $row['mahasiswa'] . '</option>';
    }
}

elseif ($tanda == 'nilai dan status'){
    $nama_mhs = $_POST['nama_mhs'];
    $nilai_alphabet = '-';
    $hasil_sidang = '-';
    $msg = '';
    $sql = "SELECT * FROM penilaian WHERE mahasiswa LIKE '%$nama_mhs%'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0){
        $total_nilai_akhir = 0;
        $count = 0;

        while($row = mysqli_fetch_assoc($result)){
            $nilai_akhir = $row['nilai_akhir'];
            $total_nilai_akhir += $nilai_akhir;
            $count++;
        }

        $avg_nilai_akhir = floatval($total_nilai_akhir / $count);

        switch ($avg_nilai_akhir) {
            case ($avg_nilai_akhir >= 85.5):
                $nilai_alphabet = "A";
                $hasil_sidang = "Lulus";
                break;
        
            case ($avg_nilai_akhir >= 75.5):
                $nilai_alphabet = "B+";
                $hasil_sidang = "Lulus";
                break;
        
            case ($avg_nilai_akhir >= 68.5):
                $nilai_alphabet = "B";
                $hasil_sidang = "Lulus";
                break;
        
            case ($avg_nilai_akhir >= 60.5):
                $nilai_alphabet = "C+";
                $hasil_sidang = "Lulus";
                break;
        
            case ($avg_nilai_akhir >= 55.5):
                $nilai_alphabet = "C";
                $hasil_sidang = "Lulus";
                break;
        
            case ($avg_nilai_akhir >= 40.5):
                $nilai_alphabet = "D";
                $hasil_sidang = "Tidak Lulus";
                break;
        
            default:
                $nilai_alphabet = "E";
                $hasil_sidang = "Tidak Lulus";
                break;
        }
    }
    else{
       $msg =  "Nilai belum di input";
    }

    $response = array(
        'msg' => $msg,
        'nilai_alphabet' => $nilai_alphabet,
        'hasil_sidang' => $hasil_sidang
    );

    // Send the response as JSON
    echo json_encode($response);
    exit;
}

elseif ($tanda == 'Insert'){
    $judulSkripsi = trim($_POST['judulSkripsi']);
    $namaMhs = $_POST['namaMhs'];
    $ketuaPenguji = trim($_POST['ketuaPenguji']);
    $dosenPenguji = trim($_POST['dosenPenguji']);
    $tanggalSidang = $_POST['tanggalSidang'];
    $waktuSidang = $_POST['waktuSidang'];
    $pembimbing1 = trim($_POST['pembimbing1']);
    $pembimbing2 = trim($_POST['pembimbing2']);
    $concateTime = $tanggalSidang . ' ' . $waktuSidang;
    $formattedTime = date('Y-m-d H:i', strtotime($concateTime));
    $ruangSidang = $_POST['ruangSidang'];
    $konsentrasi = $_POST['konsentrasi'];
    $catatanSidang = $_POST['catatanSidang'];
    $nilai_akhir = $_POST['nilai_akhir'];
    $hasil_sidang = trim($_POST['hasil_sidang']);

    switch($ruangSidang){
        case 1:
            $ruangSidang = "P308";
            break;
        case 2:
            $ruangSidang = "P309";
            break;
        case 3:
            $ruangSidang = "P307";
            break;
        case 4:
            $ruangSidang = "P318";
            break;
        case 5:
            $ruangSidang = "Lab MM";
            break;
        case 6:
            $ruangSidang = "Lab PG";
            break;
        case 7:
            $ruangSidang = "Lab Studio";
            break;
    }

    switch($konsentrasi){
        case 1:
            $konsentrasi = "AI";
            break;
        case 2:
            $konsentrasi = "Cyber Security";
            break;
        case 3:
            $konsentrasi = "Game Development";
            break;
        case 4:
            $konsentrasi = "Mobile Application Development";
            break;
        case 5:
            $konsentrasi = "Enterprise Information System";
            break;
        case 6:
            $konsentrasi = "Business Intelligence";
            break;
    }

    // cek apa sudah ada mahasiswa yang sama dengan tanggal sidang yang sama dan ruang yang sama(asumsi 1 mahasiswa bisa sidang 2 kali) di tabel berita acara
    $check_kejadian = "SELECT * FROM berita_acara WHERE tanggal_sidang = '$formattedTime' AND ruang_sidang = '$ruangSidang'";
    $result_kejadian = mysqli_query($conn, $check_kejadian);

    if (mysqli_num_rows($result_kejadian) == 0) {
        // Tambahkan data jika tidak ada data yang sama
        $sql = "INSERT INTO berita_acara (id, nama_nrp, judul_skripsi, konsentrasi, tanggal_sidang, ruang_sidang, ketua_penguji, anggota_penguji, pembimbing_1, pembimbing_2, catatan, nilai_akhir, hasil_sidang) 
        VALUES (' ', '$namaMhs', '$judulSkripsi', '$konsentrasi', '$formattedTime', '$ruangSidang', '$ketuaPenguji', '$dosenPenguji', '$pembimbing1', '$pembimbing2', '$catatanSidang', '$nilai_akhir', '$hasil_sidang')";
        $result = mysqli_query($conn, $sql);

        $status_ketua = $_POST['status_ketua'];
        $status_penguji = $_POST['status_penguji'];
        $status_pembimbing1 = $_POST['status_pembimbing1'];
        $status_pembimbing2 = $_POST['status_pembimbing2'];

        if (isset($status_ketua) && $status_ketua == "Ketua Penguji") {
            $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$ketuaPenguji%'";
            $result_id = mysqli_query($conn, $sql_get_id);
            $row = mysqli_fetch_assoc($result_id);
            $nip_ketua = $row['nip'];

            $sql = "INSERT INTO vakasi (nomor_vakasi, nip, dosen, tanggal_sidang, ruang_sidang, nama_mhs, anggota_penguji) VALUES (' ', '$nip_ketua', '$ketuaPenguji', '$formattedTime', '$ruangSidang', '$namaMhs', '$status_ketua')";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($status_penguji) && $status_penguji == "Anggota Penguji") {
            $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$dosenPenguji%'";
            $result_id = mysqli_query($conn, $sql_get_id);
            $row = mysqli_fetch_assoc($result_id);
            $nip_penguji = $row['nip'];

            $sql = "INSERT INTO vakasi (nomor_vakasi, nip, dosen, tanggal_sidang, ruang_sidang, nama_mhs, anggota_penguji) VALUES (' ', '$nip_penguji', '$dosenPenguji', '$formattedTime', '$ruangSidang', '$namaMhs', '$status_penguji')";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($status_pembimbing1) && $status_pembimbing1 == "Pembimbing 1") {
            $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$pembimbing1%'";
            $result_id = mysqli_query($conn, $sql_get_id);
            $row = mysqli_fetch_assoc($result_id);
            $nip_pembimbing1 = $row['nip'];

            $sql = "INSERT INTO vakasi (nomor_vakasi, nip, dosen, tanggal_sidang, ruang_sidang, nama_mhs, anggota_penguji) VALUES (' ', '$nip_pembimbing1', '$pembimbing1', '$formattedTime', '$ruangSidang', '$namaMhs', '$status_pembimbing1')";
            $result = mysqli_query($conn, $sql);
        }
        if ($pembimbing2 != '-'){
            if (isset($status_pembimbing2) && $status_pembimbing2 == "Pembimbing 2") {
                $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$pembimbing2%'";
                $result_id = mysqli_query($conn, $sql_get_id);
                $row = mysqli_fetch_assoc($result_id);
                $nip_pembimbing2 = $row['nip'];
    
                $sql = "INSERT INTO vakasi (nomor_vakasi, nip, dosen, tanggal_sidang, ruang_sidang, nama_mhs, anggota_penguji) VALUES (' ', '$nip_pembimbing2', '$pembimbing2', '$formattedTime', '$ruangSidang', '$namaMhs', '$status_pembimbing2')";
                $result = mysqli_query($conn, $sql);
            }
        }
        echo "Berhasil Add!";
    } 
    else {
        echo "bentrok";
    }
}
?>