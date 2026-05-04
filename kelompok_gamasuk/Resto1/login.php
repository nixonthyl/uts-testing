<!DOCTYPE html>
<html>
<head>
	<title>Mangan Uenak</title>
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
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<script type='text/javascript'>alert('Akun invalid');</script>";
		}
	}
	?>
 
  <div class="login-container">
    <div class="login-box">
      <h2>Log in</h2>
      <form action="cek_login.php" method="post">
        <div class="input-group">
          <label for="username"></label>
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <label for="password"></label>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" value = "LOGIN">Log in</button>
      </form>
      <p class="signup-text">atau <a href="createuser.php">Buat Akun</a></p>
    </div>
  </div>
		
 
 
</body>
</html>