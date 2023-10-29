<?php
include 'config.php';

$tanda = $_POST['tanda'];

if ($tanda == 'Judul'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)){
        // echo 'Debug: ' . $row['judul_skripsi'];
        $judul_skripsi = trim($row['judul_skripsi']);
        echo $judul_skripsi;
    }
}
elseif ($tanda == 'Penguji'){
    $id = $_POST['id'];
    $sql = "SELECT * FROM data_mahasiswa WHERE mahasiswa LIKE '%$id%'";
    $result = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($result)){
        $dosen_penguji = trim($row['anggota_penguji']);
        echo $dosen_penguji;
    }
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

elseif ($tanda == 'Insert'){
    $judulSkripsi = trim($_POST['judulSkripsi']);
    $namaMhs = $_POST['namaMhs'];
    $ketuaPenguji = $_POST['ketuaPenguji'];
    $dosenPenguji = trim($_POST['dosenPenguji']);
    $tanggalSidang = $_POST['tanggalSidang'];
    $timestamp = strtotime(str_replace('/', '-', $tanggalSidang));
    $newTime = date('Y-m-d H:i', $timestamp);
    $ruangSidang = $_POST['ruangSidang'];
    $konsentrasi = $_POST['konsentrasi'];
    $catatanSidang = $_POST['catatanSidang'];

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
    $check_kejadian = "SELECT * FROM berita_acara WHERE tanggal_sidang = '$tanggalSidang' AND ruang_sidang = '$ruangSidang'";
    $result_kejadian = mysqli_query($conn, $check_kejadian);

    if (mysqli_num_rows($result_kejadian) == 0) {
        // Tambahkan data jika tidak ada data yang sama
        $sql = "INSERT INTO berita_acara (id, nama_nrp, judul_skripsi, konsentrasi, tanggal_sidang, ruang_sidang, ketua_penguji, anggota_penguji, catatan) VALUES (' ', '$namaMhs', '$judulSkripsi', '$konsentrasi', '$newTime', '$ruangSidang', '$ketuaPenguji', '$dosenPenguji', '$catatanSidang')";
        $result = mysqli_query($conn, $sql);

        $status_ketua = $_POST['status_ketua'];
        $status_penguji = $_POST['status_penguji'];

        if (isset($status_ketua) && $status_ketua == "Ketua Penguji") {
            $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$ketuaPenguji%'";
            $result_id = mysqli_query($conn, $sql_get_id);
            $row = mysqli_fetch_assoc($result_id);
            $nip_ketua = $row['nip'];

            $sql = "INSERT INTO vakasi (nomor_vakasi, nip, dosen, tanggal_sidang, nama_mhs, anggota_penguji) VALUES (' ', '$nip_ketua', '$ketuaPenguji', '$tanggalSidang', '$namaMhs', '$status_ketua')";
            $result = mysqli_query($conn, $sql);
        }
        if (isset($status_penguji) && $status_penguji == "Anggota Penguji") {
            $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$dosenPenguji%'";
            $result_id = mysqli_query($conn, $sql_get_id);
            $row = mysqli_fetch_assoc($result_id);
            $nip_penguji = $row['nip'];

            $sql = "INSERT INTO vakasi (nomor_vakasi, nip, dosen, tanggal_sidang, nama_mhs, anggota_penguji) VALUES (' ', '$nip_penguji', '$dosenPenguji', '$tanggalSidang', '$namaMhs', '$status_penguji')";
            $result = mysqli_query($conn, $sql);
        }
        
    } else {
        echo "Data dengan tanggal sidang dan ruang sidang yang sama sudah ada dalam database.";
    }





    


}

// elseif ($tanda == 'hadir_ketua_penguji'){
//     $status = $_POST['status'];
//     $namaMhs = $_POST['namaMhs'];
//     $ketuaPenguji = $_POST['ketuaPenguji'];
//     $sql_get_id = "SELECT * FROM data_dosen WHERE nama LIKE '%$ketuaPenguji%'";
//     $result_id = mysqli_query($conn, $sql_get_id);
//     $row = mysqli_fetch_assoc($result_id);
//     $id_dosen = $row['nip'];

//     if ($namaMhs != " " OR $namaMhs != "Pilih Mahasiswa"){
//         $sql = "INSERT INTO vakasi (id,dosen,nama_mhs,anggota_penguji) VALUES ('$id_dosen', '$ketuaPenguji', '$namaMhs', '$status')";
//         $result = mysqli_query($conn,$sql);
//     }
// }
?>