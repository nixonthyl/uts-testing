<?php
session_start();
include 'koneksi.php';


if (!isset($_SESSION['username']) || !isset($_SESSION['cart'])) {
    echo "<script>alert('Sesi tidak valid'); window.location='login.php';</script>";
    exit;
}

$username = $_POST['username'];
$alamat = $_POST['alamat'];
$telp = $_POST['no_telp'];
$total_bayar = $_POST['total_bayar'];
$id_metode = $_POST['id_metode'];
$cart = $_SESSION['cart']; // <= Tambahkan ini sebelum foreach
$tanggal = date('Y-m-d H:i:s');


// Ambil id_pelanggan dari username
$result = mysqli_query($koneksi, "SELECT id_pelanggan FROM pelanggan WHERE username='$username'");
if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Pelanggan tidak ditemukan'); window.location='login.php';</script>";
    exit;
}
$data = mysqli_fetch_assoc($result);
$id_pelanggan = $data['id_pelanggan'];

// Hitung total bayar
$total_bayar = 0;
foreach ($cart as $item) {
    $total_bayar += $item['price'] * $item['qty'];
}

// Simpan ke tabel pembayaran
$query_pembayaran = "INSERT INTO pembayaran (id_pelanggan, id_metode, total_bayar, tanggal)
                     VALUES ('$id_pelanggan', '$id_metode', '$total_bayar', '$tanggal')";
mysqli_query($koneksi, $query_pembayaran) or die("Gagal insert pembayaran: " . mysqli_error($koneksi));


// Hapus keranjang dari sesi
unset($_SESSION['cart']);

// Redirect ke halaman user
echo "<script>alert('Pesanan berhasil!'); window.location='halaman_user.php';</script>";
exit;
?>
