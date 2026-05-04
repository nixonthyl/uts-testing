<?php
session_start();

$item = $_POST['item'] ?? '';
$action = $_POST['action'] ?? '';

if (isset($_SESSION['cart'][$item])) {
    switch ($action) {
        case 'add':
            $_SESSION['cart'][$item]['qty'] += 1;
            break;
        case 'remove':
            $_SESSION['cart'][$item]['qty'] -= 1;
            if ($_SESSION['cart'][$item]['qty'] <= 0) {
                unset($_SESSION['cart'][$item]);
            }
            break;
        case 'delete':
            unset($_SESSION['cart'][$item]);
            break;
    }
}

header("Location: keranjang.php");
exit();
