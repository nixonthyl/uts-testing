<?php
include 'koneksi.php';
$id = (int)$_GET['id'];
$koneksi->query("DELETE FROM pembayaran WHERE id_pembayaran=$id");
header("Location: history_pembayaran.php");
?>