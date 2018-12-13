<?php
require 'koneksi.php';
session_start();

$id = $_POST["id_pemesanan"];


//Menulis query sql
$query = "UPDATE pemesanan SET status_pembayaran = 'barang diterima' WHERE id_pemesanan = '$id' ";


//Pengecekan dan eksekusi query
if ($konek->query($query) == TRUE) {
    // echo('location:lihat_padi.php');
    echo "<script>location='riwayat_pemesanan.php';</script>";
} else {
    echo "udpate gagal = " .mysqli_error($konek);
}
?>
