<!DOCTYPE html>
<html>
<head>
<title>Halaman admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
</head>

<style>
.confirm-button {
width: 100%;
padding: 12px;
background-color: #28a745;
color: white;
border: none;
text-align: center;
border-radius: 6px;
cursor: pointer;
font-size: 16px;
transition: 0.3s ease;
}
</style>
<body>
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script type='text/javascript'>alert('Akun invalid');</script>";
		}
	}
	?>
 
  <div class="login-container">
    <div class="login-box">
      <h2>Selamat datang Admin</h2>
      <form action="cek_login.php" method="post">
        <div class="input-group">
          <a href="manage_user.php " class="confirm-button">Atur User</a>
        </div>
        <div class="input-group">
          <label for="password"></label>
           <a href="manage_menu.php" class="confirm-button">Atur Menu</a>
        </div>
        <div class="input-group">
          <a href="history_pembayaran.php" class="confirm-button">Riwayat</a>
        </div>  
        <a href="logout.php" style="position: absolute; top: 20px; right: 30px; padding: 10px 20px; background-color: #dc3545; color: white; border-radius: 5px; text-decoration: none;">
    Logout</a>      
      </form>
    </div>
  </div>
		
 
 




</body>
</html>