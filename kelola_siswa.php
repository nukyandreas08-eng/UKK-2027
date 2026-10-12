<?php

session_start();

include 'includes/cek_session.php';
include 'config/koneksi.php';

// Ambil semua data siswa
$sql = "SELECT * FROM t_siswa ORDER BY id DESC";
$query = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Siswa</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3">
            <h4 class="text-white mb-4">
                My Website
            </h4>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link active">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_siswa.php" class="nav-link text-white">
                        Data Siswa
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_guru.php" class="nav-link text-white">
                        Data Guru
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_kelas.php" class="nav-link text-white">
                        Kelas
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="laporan.php" class="nav-link text-white">
                        Laporan
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link text-white">
                        About Me
                    </a>
                </li>
                <hr class="text-secondary">
                <li class="nav-item">
                    <a href="logout" class="nav-link text-danger">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- KONTEN -->
        <main class="col-md-9 col-lg-10 p-4">

    <h1>Kelola Siswa</h1>

    <?php if (isset($_SESSION['pesan'])) { ?>
        <p>
            <?php
            echo $_SESSION['pesan'];
            unset($_SESSION['pesan']);
            ?>
        </p>
    <?php } ?>

    <hr>

    <h2>Tambah Data Siswa</h2>

    <form action="menu1.php" method="POST">

        <input type="hidden" name="aksi" value="tambah">

       <table class="table">

            <tr>
                <td>NIS</td>
                <td>:</td>
                <td>
                    <input type="text" name="nis" required>
                </td>
            </tr>

            <tr>
                <td>NISN</td>
                <td>:</td>
                <td>
                    <input type="text" name="nisn" required>
                </td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama" required>
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jenis_kelamin" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <input type="date" name="tanggal_lahir" required>
                </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" required></textarea>
                </td>
            </tr>

            <tr>
                <td>Status Aktif</td>
                <td>:</td>
                <td>
                    <select name="status_aktif" required>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <button type="submit">Tambah Siswa</button>
                </td>
            </tr>

        </table>

    </form>

    <hr>

    <h2>Data Siswa</h2>

    <table border="1" cellpadding="8" cellspacing="0">

        <thead>
            <tr>
                <th>id</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <body>
         <?php

if (mysqli_num_rows($query) > 0) {

    while ($siswa = mysqli_fetch_assoc($query)) {

?>

<tr>
    <td><?php echo $siswa['id']; ?></td>
               <td><?php echo $siswa['id']; ?></td>

                <td>
                    <?php echo htmlspecialchars($siswa['nis']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($siswa['nisn']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($siswa['nama']); ?>
                </td>

                <td>
                    <?php
                    if ($siswa['jenis_kelamin'] == 'L') {
                        echo "Laki-laki";
                    } else {
                        echo "Perempuan";
                    }
                    ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($siswa['tanggal_lahir']); ?>
                </td>

                <td>
                    <?php echo htmlspecialchars($siswa['alamat']); ?>
                </td>

                <td>
                    <?php
                    if ($siswa['status_aktif'] == 1) {
                        echo "Aktif";
                    } else {
                        echo "Tidak Aktif";
                    }
                    ?>
                </td>

                <td>

                    <a href="edit_siswa.php?id=<?= $siswa['id']; ?>">Edit</a>

<br><br>

<a href="hapus_siswa.php?id=<?= $siswa['id']; ?>"
   onclick="return confirm('Yakin ingin menghapus data siswa ini?')">
   Hapus
</a>
                </td>

            </tr>

        <?php

            }

        } else {

        ?>

            <tr>
                <td colspan="9">
                    Belum ada data siswa.
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>

</body>

</html>