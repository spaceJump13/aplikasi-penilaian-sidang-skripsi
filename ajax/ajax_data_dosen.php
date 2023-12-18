<?php
    include '../config.php';
    $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : ' ';
    $sql = "SELECT * FROM data_dosen WHERE nip LIKE '%$keyword%' OR nama LIKE '%$keyword%' LIMIT 0,10";
    $result = mysqli_query($conn, $sql)
?>
<!-- kode dibawah ini merupakan div yang id="wadah" di data_dosen.php -->
<?php if (mysqli_num_rows($result) > 0): ?>
    <table class="table table-striped">
        <thead style="background-color:#0B6977; color: whitesmoke;">
            <tr>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Jurusan</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?=$row['nip']?></td>
                    <td><?=$row['nama']?></td>
                    <td><?=$row['jabatan']?></td>
                    <td><?=$row['jurusan']?></td>
                </tr>
        <?php endwhile ?>
        </tbody>
    </table>
<?php else: ?>
    <table class="table table-striped">
        <thead style="background-color:#0B6977; color: whitesmoke;">
            <tr>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5"><h5 style="text-align: center; color: red;">Tidak ada data.</h5></td>
            </tr>
        </tbody>
    </table>
<?php endif ?>