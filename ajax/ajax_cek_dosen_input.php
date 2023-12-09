<?php
    include '../config.php';

    $nama_mhs = $_POST['namaMhs'];

    $sql = "SELECT * FROM penilaian WHERE mahasiswa LIKE '%$nama_mhs%'";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    echo $count;
?>