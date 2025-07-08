<?php
include 'koneksi.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$query = "SELECT * FROM warga WHERE nama_lengkap LIKE '%$keyword%' ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Warga RT</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class ="container">
    <h2>Daftar Warga RT</h2>

    <form method="GET" action="index.php">
        <input type="text" name="keyword" placeholder="Cari nama..." value="<?= htmlspecialchars($keyword) ?>">
        <button type="submit">Cari</button>
        <a href="tambah.php">Tambah Warga</a>
    </form>

    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nomor KK</th>
            <th>NIK</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Iuran</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
            <td><?= htmlspecialchars($row['nomor_kk']) ?></td>
            <td><?= htmlspecialchars($row['nik']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td><?= $row['status'] ?></td>
            <td><?= $row['iuran'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
        </div>
</body>
</html>
