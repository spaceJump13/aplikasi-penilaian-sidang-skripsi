<?php
    include '../config.php';

    $sql = "SELECT * FROM berita_acara";
    $keyword = isset($_POST['keyword']) && $_POST['keyword'] != '' ? $_POST['keyword'] : ''; 
    $periode = isset($_POST['periode']) && $_POST['periode'] != '' ? $_POST['periode'] : "Semua";

    $sql .= " WHERE nama_nrp LIKE '%$keyword%'";
    if ($periode != "Semua")
        $sql .= " AND tanggal_sidang LIKE '%$periode%'";

    $sql .= " LIMIT 0, 10";
    $result = mysqli_query($conn, $sql);
?>

    <?php if ($result) : ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-striped align-items-center">
                <thead style="background-color:#0B6977; color: whitesmoke; text-align: center;">
                    <tr>
                        <th>ID</th>
                        <th>Mahasiswa</th>
                        <th>Judul Skripsi</th>
                        <th>Konsentrasi</th>
                        <th>Tanggal Sidang</th>
                        <th>Ruang Sidang</th>
                        <th>Ketua Penguji</th>
                        <th>Anggota Penguji</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>Catatan</th>
                        <th>Nilai Akhir</th>
                        <th>Hasil Sidang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['nama_nrp'];?></td>
                            <td><?php echo $row['judul_skripsi'];?></td>
                            <td><?php echo $row['konsentrasi'];?></td>
                            <td><?php echo date('Y-m-d H:i', strtotime($row['tanggal_sidang'])); ?></td>
                            <td><?php echo $row['ruang_sidang'];?></td>
                            <td><?php echo $row['ketua_penguji'];?></td>
                            <td><?php echo $row['anggota_penguji'];?></td>
                            <td><?php echo $row['pembimbing_1'];?></td>
                            <td><?php echo $row['pembimbing_2'];?></td>
                            <td><?php echo $row['catatan'];?></td>
                            <td><?php echo $row['nilai_akhir'];?></td>
                            <td><?php echo $row['hasil_sidang'];?></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                <?php endwhile ?>
                </tbody>
            </table>
        <?php else: ?>
            <table class="table table-striped">
                <thead style="background-color:#0B6977; color: whitesmoke;">
                    <tr>
                    <th>ID</th>
                        <th>Mahasiswa</th>
                        <th>Judul Skripsi</th>
                        <th>Konsentrasi</th>
                        <th>Tanggal Sidang</th>
                        <th>Ruang Sidang</th>
                        <th>Ketua Penguji</th>
                        <th>Anggota Penguji</th>
                        <th>Pembimbing 1</th>
                        <th>Pembimbing 2</th>
                        <th>Catatan</th>
                        <th>Nilai Akhir</th>
                        <th>Hasil Sidang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="13"><h5 style="text-align: center; color: red;">Tidak ada data.</h5></td>
                    </tr>
                </tbody>
            </table>
        <?php endif ?>
    <?php else: ?>
        <h1>Gagal</h1>
    <?php endif ?>