<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM warga WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_kk     = $_POST['nomor_kk'];
    $nik          = $_POST['nik'];
    $alamat       = $_POST['alamat'];
    $status       = $_POST['status'];

    $update = "UPDATE warga SET 
                nama_lengkap = '$nama_lengkap',
                nomor_kk = '$nomor_kk',
                nik = '$nik',
                alamat = '$alamat',
                status = '$status'
              WHERE id = $id";

    if (mysqli_query($koneksi, $update)) {
        header("Location: index.php");
    } else {
        echo "Gagal menyimpan perubahan: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class ="container">

        <h2>Edit Data Warga</h2>
        
    <form method="POST" action="">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required><br><br>

        <label>Nomor KK:</label><br>
        <input type="text" name="nomor_kk" value="<?= htmlspecialchars($data['nomor_kk']) ?>" required><br><br>

        <label>NIK:</label><br>
        <input type="text" name="nik" value="<?= htmlspecialchars($data['nik']) ?>" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="Kepala Keluarga" <?= $data['status'] === 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
            <option value="Anggota Keluarga" <?= $data['status'] === 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
        </select><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>
</div>
</body>
</html>
