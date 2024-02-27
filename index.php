<?php
// fungsi koneksi php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tugas3';

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {  // cek koneksi ke database
    die('Tidak bisa konek ke database');
}

$nim = "";
$nama = "";
$ttl = "";
$usia = "";
$password = "";
$radio = "";
$wn = "";
$kota = "";
$keterangan = "";

$sukses = "";
$error = "";

if (isset($_POST["tambah"])) {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $ttl = $_POST["ttl"];
    $usia = $_POST["usia"];
    $password = $_POST["password"];
    $radio = $_POST["radio"];
    $wn = isset($_POST['wn']) ? $_POST['wn'] : '';
    $kota = $_POST["kota"];
    $keterangan = $_POST["keterangan"];


    if ($nim && $nama && $ttl && $usia && $password && $radio && $wn && $kota && $keterangan) {
        $query = "INSERT INTO biodata VALUES ('', '$nim', '$nama', '$ttl', '$usia', '$password', '$radio', '$wn', '$kota', '$keterangan')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $sukses = "DATA BERHASIL DITAMBAHKAN";
        } else {
            $error = "DATA GAGAL DITAMBAHKAN";
        }
    } else {
        $error = "DATA GAGAL DITAMBAHKAN,DATA HARUS LENGKAP";
    }

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <title>Tugas 3</title>
</head>

<body>
    <section class="biodata">
        <div class="container">
            <h2 class="text-center">Membuat Form di dalam tabel</h2>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <form action="" method="post">
                            <tr>
                                <td>Nim Mahasiswa</td>
                                <td>
                                    <input type="text" class="form-control" id="nim" name="nim"
                                        placeholder="Nim mahasiswa..." />
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="Nama mahasiswa..." />
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>
                                    <input type="date" class="form-control" id="ttl" name="ttl" />
                                </td>
                            </tr>
                            <tr>
                                <td>Usia</td>
                                <td>
                                    <input type="number" class="form-control" id="usia" name="usia" />
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input type="password" class="form-control" id="password" name="password" />
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio" id="gridRadios1"
                                            value="Laki-Laki" />
                                        <label class="form-check-label" for="gridRadios1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio" id="gridRadios2"
                                            value="Perempuan" />
                                        <label class="form-check-label" for="gridRadios2">Perempuan</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Warga Negara</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wn" name="wn" />
                                        <label class="form-check-label" for="wn" value="Indonesia">INDONESIA</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="wn" name="wn" />
                                        <label class="form-check-label" for="wn" value="China">CHINA</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Kota Asal</td>
                                <td>
                                    <select name="kota" id="kota">
                                        <option value="pilih">-- PILIH KOTA ASAL --</option>
                                        <option value="Surakarta">Surakarta</option>
                                        <option value="Boyolali">Boyolali</option>
                                        <option value="Wonogiri">Wonogiri</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>
                                    <textarea class="form-control" id="keterangan" name="keterangan"
                                        rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <button type="submit" class="btn btn-primary" name="tambah">
                                        Kirim!
                                    </button>
                                </td>
                            </tr>
                        </form>
                        <?php
                        if ($sukses) {
                            echo "<div class='alert alert-success mt-3'>$sukses</div>";
                        } else if ($error) {
                            echo "<div class='alert alert-danger mt-3'>$error</div>";
                        }
                        ?>
                    </table>
                    <a href="tambah.php" type="button"
                        class="btn btn-primary d-flex justify-content-center align-items-center">Lihat Hasil Data</a>
                </div>
            </div>
        </div>
    </section>

    <!-- JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>