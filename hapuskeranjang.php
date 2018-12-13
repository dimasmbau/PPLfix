<?php
session_start();

$id_padi = $_GET["id"];
unset($_SESSION['keranjang'][$id_padi]);

echo "<script>alert('Item di hapus');</script>";
echo "<script>location = 'cart.php';</script>";
?>
