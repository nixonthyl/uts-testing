<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Riwayat Pemesanan</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <div class="container">
    <h1>Riwayat Pemesanan</h1>
    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Metode</th>
          <th>total</th>
          <th>tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
 <?php
      $result = $koneksi->query("SELECT pel.*, m.metode_pembayaran, pem.id_pembayaran, pem.total_bayar, pem.tanggal FROM pembayaran pem join pelanggan pel on pem.id_pelanggan = pel.id_pelanggan join metode m on pem.id_metode = m.id_metode");

      while ($row = $result->fetch_assoc()) {
      echo "<tr>
      <td>{$row['username']}</td>
      <td>{$row['metode_pembayaran']}</td>
      <td>{$row['total_bayar']}</td>
      <td>{$row['tanggal']}</td>
      <td>
      <a href='hapus_pembayaran.php?id={$row['id_pembayaran']}' class='delete' onclick='return confirm(\"Yakin?\")'>Hapus</a>
      </td>				
      </tr>";
        }
        ?>  
      </tbody>
  </div>
      <a href='halaman_admin.php'>Kembali</a> 
</body>
</html>