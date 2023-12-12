<?php
    include '../config.php';
    $tanda = $_POST['tanda'];

    if($tanda == "cari dosen"){
        $sql = "SELECT * FROM vakasi";
        $keyword = isset($_POST['keyword']) && $_POST['keyword'] != '' ? $_POST['keyword'] : ''; 
        $periode = isset($_POST['periode']) && $_POST['periode'] != '' ? $_POST['periode'] : "Semua";
    
        $sql .= " WHERE (dosen LIKE '%$keyword%' OR nip LIKE '%$keyword%')";
        if ($periode != "Semua")
            $sql .= " AND tanggal_sidang LIKE '%$periode%'";
    
        $sql .= " LIMIT 0, 10";
        $result = mysqli_query($conn, $sql);
    
    
    
        if(mysqli_num_rows($result) > 0){
            ?>
            <table class="mx-auto table table-striped">
                <thead style="background-color:#0B6977; color: whitesmoke; text-align: center;">
                    <tr>
                        <th>Nomor Vakasi</th>
                        <th>NIP</th>
                        <th>Dosen</th>
                        <th>Tanggal Sidang</th>
                        <th>Ruang Sidang</th>
                        <th>Nama Mahasiswa</th>
                        <th>Team Penguji</th>
                    </tr>
                </thead>
            <?php   
            while ($row = mysqli_fetch_array($result)){
                ?>
                <tbody style="text-align: center;">
                    <tr>
                        <td><?php echo $row['nomor_vakasi']; ?></td>
                        <td><?php echo $row['nip']; ?></td>
                        <td><?php echo $row['dosen']; ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($row['tanggal_sidang'])); ?></td>
                        <td><?php echo $row['ruang_sidang']; ?></td>
                        <td><?php echo $row['nama_mhs']; ?></td>
                        <td><?php echo $row['anggota_penguji']; ?></td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
            <?php }
        else{
            echo '<h3 style="text-align: center;" >Tidak ada data</h3>';
        }
    }

    elseif($tanda == "hitung vakasi"){
        $keyword = isset($_POST['keyword']) && $_POST['keyword'] != '' ? $_POST['keyword'] : ''; 

        $sql = "SELECT * FROM vakasi WHERE dosen LIKE '%$keyword%' OR nip LIKE '%$keyword%'";
        $result = mysqli_query($conn, $sql);

        $jumlah_vakasi = mysqli_num_rows($result);

        echo $jumlah_vakasi;
    }
?>