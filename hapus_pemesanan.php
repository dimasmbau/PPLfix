
<?php
require 'koneksi.php';
session_start();
// $id_pemesanan = $_GET["id_padi"];


//Menulis query sql
// $query = "DELETE FROM padi WHERE id_padi = '$id' ";
$qr = ("DELETE FROM pemesanan
                        WHERE id_pemesanan = '$_GET[id_pemesanan]' ");

//Pengecekan dan eksekusi query
if ($konek->query($qr) == TRUE) {
    // echo('location:lihat_padi.php');
    echo "<script>location='lihat_padi.php';</script>";
} else {
    echo "hapus gagal = " .mysqli_error($konek);
}
?>
