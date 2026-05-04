<?php
$koneksi = new mysqli("localhost:3308", "root", "", "resto");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
