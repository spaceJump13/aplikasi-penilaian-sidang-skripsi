<?php
    include 'config.php';

    $id_berita_acara = isset($_GET['id']) ? $_GET['id'] : ' ';
    $sql = "DELETE FROM berita_acara WHERE id = $id_berita_acara";
    $result = mysqli_query($conn, $sql);
    header('Location: beritaAcara.php');
?>