<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'db_tedc');

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-3" style="text-align: center;">Daftar Mahasiswa</h1>
        <div class="text-end">
            <a href="insert.php" class="btn btn-primary">Tambah Data</a>
        </div>
        <table class="table table-bordered table-striped" style="margin-top: 12px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Periode</th>
                    <th>Kelas</th>
                    <th>Program Studi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        $i = 1; 
                        while ($fetch_assoc = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $fetch_assoc['nim']; ?></td>
                                <td><?= $fetch_assoc['nama']; ?></td>
                                <td><?= $fetch_assoc['periode']; ?></td>
                                <td><?= $fetch_assoc['kelas']; ?></td>
                                <td><?= $fetch_assoc['prodi']; ?></td>
                                <td>
                                    <a href="edit.php?nim=<?= $fetch_assoc['nim']; ?>" class="btn btn-success btn-sm">Edit</a>
                                </td>
                            </tr>
                <?php   } 
                    } else { ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">Tidak ada data</td>
                        </tr>
                <?php 
                    } ?>
            </tbody>
        </table>
    </div>
</body>
</html>