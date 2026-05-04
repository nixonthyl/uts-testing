<?php
include 'koneksi.php';
$id = (int)$_GET['id'];
$koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan=$id");
header("Location: manage_user.php");
?>