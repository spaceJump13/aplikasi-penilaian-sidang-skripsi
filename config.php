<?php
session_start();
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "manpro13";
$conn = mysqli_connect($serverName, $username, $password, $dbname);

$fetch = 'SELECT * FROM data_mahasiswa';
$stmt = mysqli_prepare($conn, $fetch);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}

?>      