<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Keranjang Belanja</title>
    <style>
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
        }

        .actions form {
            display: inline;
        }

        .confirm-button {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 10px;
            background-color: #28a745;
            color: white;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
        }

        .empty {
            text-align: center;
            margin-top: 50px;
        }

    </style>
</head>
<body>

<h2 style="text-align:center;">Keranjang Belanja</h2>

<?php if (empty($cart)): ?>
    <div class="empty">
        <p>Keranjang kosong.</p>
        <a href="halaman_user.php" class="confirm-button">Kembali ke menu</a>

    </div>
<?php else: ?>
    <table>
        <tr>
            <th>Nama Item</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php
        $grandTotal = 0;
        foreach ($cart as $item => $data):
            $total = $data['price'] * $data['qty'];
            $grandTotal += $total;
        ?>
        <tr>
            <td><?= $item ?></td>
            <td>Rp <?= number_format($data['price'], 0, ',', '.') ?></td>
            <td><?= $data['qty'] ?></td>
            <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
            <td class="actions">
                <form method="post" action="update_cart.php">
                    <input type="hidden" name="item" value="<?= $item ?>">
                    <button name="action" value="add">+</button>
                    <button name="action" value="remove">-</button>
                    <button name="action" value="delete">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total Keseluruhan</strong></td>
            <td colspan="2"><strong>Rp <?= number_format($grandTotal, 0, ',', '.') ?></strong></td>
        </tr>
    </table>

    <a href="checkout.php" class="confirm-button">Konfirmasi Pembayaran</a>
    <a href="halaman_user.php" class="confirm-button">Kembali ke menu</a>
<?php endif; ?>

</body>
</html>
