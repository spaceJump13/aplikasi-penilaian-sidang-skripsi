<?php
    include '../config.php';

    if (isset($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        
        $sql = "SELECT * FROM vakasi WHERE dosen LIKE '%$keyword%' OR nip LIKE '%$keyword%'";
        $result = mysqli_query($conn, $sql);

    }

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
                    <td><?php echo $row['tanggal_sidang']; ?></td>
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
?>