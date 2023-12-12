<?php
    include 'config.php';

    $id_kriteria = isset($_GET['id']) ? $_GET['id'] : ' ';
    $sql = "DELETE FROM kriteria_penilaian WHERE id_kriteria = $id_kriteria";
    $result = mysqli_query($conn, $sql);
    header('Location: aturBobot.php');

?>