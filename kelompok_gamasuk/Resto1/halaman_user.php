<?php
include 'koneksi.php'; 
session_start();

// Inisialisasi keranjang
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Variabel untuk memicu pop-up JavaScript
$show_popup = false;
$last_item = "";

// Proses tambah ke keranjang
if (isset($_POST['add_to_cart'])) {
    $item = $_POST['item_name'];
    $price = $_POST['item_price'];

    if (isset($_SESSION['cart'][$item])) {
        $_SESSION['cart'][$item]['qty'] += 1;
    } else {
        $_SESSION['cart'][$item] = [
            'price' => $price,
            'qty' => 1
        ];
    }
    // Set variabel untuk notifikasi
    $show_popup = true;
    $last_item = $item;
}

// Hitung total item unik di keranjang untuk angka badge
$total_item_keranjang = count($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman User</title>
    <link rel="stylesheet" href="css/user_page.css">
    <style>
        /* Tambahan style untuk angka di keranjang agar terlihat jelas */
        .cart-count {
            background: red;
            color: white;
            padding: 2px 8px;
            border-radius: 50%;
            font-size: 14px;
            margin-left: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header class="hero-header">
  <div class="overlay">
    <div class="hero-content" style="text-align: center;">
      <h1>Selamat Datang di Mangan Uenak</h1>
      <p>Pesan makanan favoritmu secara mudah dari rumah</p>
    </div>
  </div>
</header>

<h2>Selamat datang <?php echo $_SESSION['username']; ?></h2>
<a href="logout.php" style="position: absolute; top: 20px; right: 30px; padding: 10px 20px; background-color: #dc3545; color: white; border-radius: 5px; text-decoration: none;">
    Logout
</a>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM menu");
while ($row = mysqli_fetch_array($query)) {
    $nama_file = strtolower($row['nama_menu']) . ".jpg";
    $folder = (strtolower($row['jenis']) == 'minuman') ? 'minuman' : 'makanan';
    $path_foto = "img/" . $folder . "/" . $nama_file;
?>
    <div class="product-card">
        <img src="<?php echo $path_foto; ?>" alt="<?php echo $row['nama_menu']; ?>">
        <h3><?php echo $row['nama_menu']; ?></h3>
        <p>Harga: Rp <?php echo number_format($row['harga_porsi'], 0, ',', '.'); ?></p>
        <form method="post" action="">
            <input type="hidden" name="item_name" value="<?php echo $row['nama_menu']; ?>">
            <input type="hidden" name="item_price" value="<?php echo $row['harga_porsi']; ?>">
            <button type="submit" name="add_to_cart" class="add-to-cart">Tambah</button>
        </form>
    </div>
<?php } ?>

<a href="keranjang.php" class="cart-button">
    Lihat Keranjang 
    <?php if($total_item_keranjang > 0): ?>
        <span class="cart-count"><?php echo $total_item_keranjang; ?></span>
    <?php endif; ?>
</a>

<?php if ($show_popup): ?>
<script>
    alert("Berhasil! <?php echo $last_item; ?> telah masuk ke keranjang.");
</script>
<?php endif; ?>

</body>
</html>