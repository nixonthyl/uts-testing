<?php
include 'koneksi.php';
$id = (int)$_GET['id'];
$koneksi->query("DELETE FROM menu WHERE id_menu=$id");
header("Location: manage_menu.php");
?>