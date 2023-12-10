<?php
    include 'config.php';

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
    
    echo $bobotValues['judul'] . "<br>";
    echo $bobotValues['bab_1_2'] . "<br>";
    echo $bobotValues['bab_3_4_infor'] . "<br>";
    echo $bobotValues['bab_3_4_sib'] . "<br>";
    echo $bobotValues['buku'] . "<br>";
    echo $bobotValues['kesimpulan'] . "<br>";
    echo $bobotValues['program'];
    

    $a = 65;
    $b = 87;
    $c = 0;
    $d = 78;
    $e = 55;
    $f = 90;
    
    $totalSum = floatval(($judul_dan_abstrakValue * 0.05) + ($bab_1_2 * 0.1) + ($bab_3_4_sibValue * 0.25) + ($bab_3_4_inforValue * 0.25) + ($bukuValue * 0.1) + 
    ($bab_5_kesimpulanValue * 0.25) + ($programValue * 0.25));

?>