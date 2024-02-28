<?php
require 'fungsi.php';
// fungsi koneksi php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tugas3';

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {  // cek koneksi ke database
    die('Tidak bisa konek ke database');
}
// Query data dari database
$query = "SELECT * FROM biodata";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Hasil Data Biodata</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Usia</th>
                    <th>Password</th>
                    <th>Jenis Kelamin</th>
                    <th>Warga Negara</th>
                    <th>Kota Asal</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($bio = mysqli_fetch_array($result)): ?>
                    <tr></tr>
                    <th scope="row">
                        <?= $no; ?>
                    </th>
                    <td>
                        <?= $bio['nim']; ?>
                    </td>
                    <td>
                        <?= $bio['nama']; ?>
                    </td>
                    <td>
                        <?= $bio['ttl']; ?>
                    </td>
                    <td>
                        <?= $bio['usia']; ?>
                    </td>
                    <td>
                        <?= $bio['password']; ?>
                    </td>
                    <td>
                        <?= (isset($bio['radio']) && $bio['radio'] == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan') ?>
                    </td>
                    <td>
                        <?= ($bio['wn'] == 'on' ? 'INDONESIA' : 'CHINA') ?>
                    </td>
                    <td>
                        <?= $bio['kota']; ?>
                    </td>
                    <td>
                        <img src="img/<?= $bio['gambar']; ?>" width="100px" alt="None">
                    </td>
                    <td>
                        <?= $bio['keterangan']; ?>
                    </td>
                    </tr>
                    <?php $no++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <!-- JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>