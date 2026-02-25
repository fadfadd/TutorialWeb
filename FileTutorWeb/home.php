<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Koleksi Film</title>
    <link rel="stylesheet" href="yacss.css">
</head>
<body>

<!-- Film Strip -->
<div class="film-strip film-top"></div>
<div class="film-strip film-bottom"></div>

<!-- Spotlight -->
<div class="spotlight"></div>
<div class="overlay"></div>

<div class="container">

    <h2>🎬 Dashboard Koleksi Film</h2>

    <a href="tambah.php" class="btn-tambah">+ Tambah Film</a>

    <table>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Sutradara</th>
            <th>Genre</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>

    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");

    if(mysqli_num_rows($data) > 0){
        while ($d = mysqli_fetch_array($data)) {
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($d['judul']) ?></td>
            <td><?= htmlspecialchars($d['sutradara']) ?></td>
            <td><?= htmlspecialchars($d['genre']) ?></td>
            <td><?= htmlspecialchars($d['tahun_rilis']) ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id'] ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $d['id'] ?>" 
                   onclick="return confirm('Yakin ingin menghapus film ini?')" 
                   class="btn-hapus">Hapus</a>
            </td>
        </tr>
    <?php 
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center'>Belum ada film 🎞</td></tr>";
    }
    ?>

    </table>

</div>

</body>
</html>