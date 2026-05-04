<?php include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = $id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Pelanggan</h2>
    <form method="post">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No Telpon</label>
            <input type="number" name="no_telp" value="<?= $data['no_telp'] ?>" class="form-control" required>
        </div>                
        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="manage_user.php" class="btn btn-secondary">Kembali</a>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $koneksi->query("UPDATE pelanggan SET username='$username', password='$password', nama_pelanggan='$nama', alamat='$alamat', no_telp='$no_telp' WHERE id_pelanggan=$id");
        echo "<script>location='manage_user.php';</script>";
    }
    ?>
</body>
</html>
