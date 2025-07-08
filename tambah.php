<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_kk     = $_POST['nomor_kk'];
    $nik          = $_POST['nik'];
    $alamat       = $_POST['alamat'];
    $status       = $_POST['status'];

    $query = "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status) 
              VALUES ('$nama_lengkap', '$nomor_kk', '$nik', '$alamat', '$status')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h2>Tambah Data Warga</h2>

    <form method="POST" action="tambah.php">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Nomor KK:</label><br>
        <input type="text" name="nomor_kk" required><br><br>

        <label>NIK:</label><br>
        <input type="text" name="nik" required><br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="">-- Pilih Status --</option>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
            <option value="Anggota Keluarga">Anggota Keluarga</option>
        </select><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>
