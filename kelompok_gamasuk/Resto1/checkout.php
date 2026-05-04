<?php
include 'koneksi.php';
session_start();
$cart = $_SESSION['cart'] ?? [];
$username = $_SESSION['username'] ?? '';

$query = mysqli_query($koneksi, "SELECT nama_pelanggan, alamat, no_telp FROM pelanggan WHERE username = '$username'");
$data = mysqli_fetch_assoc($query);

$grandTotal = 0;
$nama = $data['nama_pelanggan'];
$alamat = $data['alamat'];
$telp = $data['no_telp'];



if (empty($cart)) {
    echo "<script>alert('Keranjang kosong!'); window.location='halaman_user.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button{
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

        .confirm-button {
        display: block;
        width: 97%;
        margin: 30px auto;
        padding: 10px;
        background-color: #28a745;
        color: white;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 8px;
        transition: 0.3s ease;
        }

        button:hover,
        .confirm-button:hover {
        background-color: #333;
        }
        }

    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Checkout</h2>
    <form method="post" action="proses_co.php">
    <p><strong>Nama:</strong> <?= $nama ?></p>
    <input type="hidden" name="username" value="<?= $username ?>">

    <p><strong>Alamat:</strong><?= $alamat ?></p>
    <input type="hidden" name="alamat" value="<?= $alamat ?>">

    <p><strong>Nomor Telepon:</strong> <?= $telp ?></p>
    <input type="hidden" name="no_telp" value="<?= $telp ?>">
    <br>
    <br>


    <h3>Ringkasan Pesanan:</h3>
    <ul>
    <?php foreach ($cart as $item => $data): 
    $subtotal = $data['price'] * $data['qty'];
    $grandTotal += $subtotal;
    ?>
    <li>
    <?= $item ?> (<?= $data['qty'] ?> x Rp <?= number_format($data['price'], 0, ',', '.') ?>)
        = <strong>Rp <?= number_format($subtotal, 0, ',', '.') ?></strong>
    </li>
<?php endforeach; ?>
</ul>

<p><strong>Total Bayar: Rp <?= number_format($grandTotal, 0, ',', '.') ?></strong></p>

    <input type="hidden" name="total_bayar" value="<?= $grandTotal ?>">

    <br>
    <div>
  <label>Metode Pembayaran:</label><br>
  <select name="id_metode">
        <?php
        $metode = $koneksi->query("SELECT * FROM metode");
        while ($m = $metode ->fetch_assoc()){
            echo "<option value='{$m['id_metode']}'>{$m['metode_pembayaran']}</option>";
        }
        ?>
  </select>
  </div>
  <br><br>

  <button type="submit">Konfirmasi</button>
  <a href="keranjang.php" class="confirm-button">Kembali</a>
</form>

</div>

</body>
</html>
