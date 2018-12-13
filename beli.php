<?php
session_start();
//mendapatkan id id_padi dari url
$id_padi = $_GET['id'];

//jika sudah ada prodkuk itu di keranjang, produk itu di tambah jumlahnya +1
if (isset($_SESSION['keranjang'][$id_padi])) {
    $_SESSION['keranjang'][$id_padi]+= 1;
}else {
    $_SESSION['keranjang'][$id_padi] = 1;
}

// echo "<prev>";
// print_r($_SESSION);
// echo "</prev>";
//masukkan ke halaman keranjang
echo "<script>alert('produk telah berhasil di tambahkan ke keranjang belanja');</script>";
echo "<script>location='cart.php';</script>";
 ?>
