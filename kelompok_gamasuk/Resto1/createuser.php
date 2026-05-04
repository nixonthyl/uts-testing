<?php
session_start();

// menghubungkan php dengan koneksi database
include './koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mangan Uenak | Buat Akun</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<style>
  body {
  background-image: url('img/bg.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  }
</style>
<body>

  <div class="login-container">
    <div class="login-box">
      <h2>Buat Akun</h2>
      <form method="post">
        <div class="input-group">
          <label for="username"></label>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <label for="password"></label>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="input-group">
          <label for="nama"></label>
          <input type="text" name="nama" placeholder="Nama" required>
        </div>
        <div class="input-group">
          <label for="alamat"></label>
          <input type="text" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="input-group">
          <label for="no_telp"></label>
          <input type="text" name="no_telp" placeholder="Nomor telepon" required>
        </div>                  
        </div>        
        <button type="submit" name="simpan">Buat Akun</button>
      <p class="signup-text"><a href="login.php">Kembali</a></p>
    </div>
    </form>

    <?php
        if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $level = "user";
        $koneksi->query("INSERT INTO pelanggan (username, password, nama_pelanggan, alamat, no_telp, level) VALUES ('$username', '$password', '$nama', '$alamat', $no_telp, '$level')");
        echo "<script type='text/javascript'>alert('Akun berhasil');</script>";
        echo "<script>location='login.php';</script>";
        }
    ?>
</body>
</html>
