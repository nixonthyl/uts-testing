<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Kelola Pengguna</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div class="container">
    <h1>Manajemen Pengguna</h1>
    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No. Telpon</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
 <?php
      $result = $koneksi->query("SELECT * FROM pelanggan");

      while ($row = $result->fetch_assoc()) {
        echo "<tr>
      <td>{$row['username']}</td>
      <td>{$row['password']}</td>
      <td>{$row['nama_pelanggan']}</td>
			<td>{$row['alamat']}</td>
			<td>{$row['no_telp']}</td>
      <td>
      <a href='update_user.php?id={$row['id_pelanggan']}' class='edit'>Edit</a>
      <a href='hapus_user.php?id={$row['id_pelanggan']}' class='delete' onclick='return confirm(\"Yakin?\")'>Hapus</a>
      </td>				
      </tr>";
        }
        ?>  
      </tbody>
  </div>
      <a href='halaman_admin.php'>Kembali</a> 
</body>
</html>