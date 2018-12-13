<!--

include 'koneksi.php';


$jenis     = $_POST['jenis_padi'];
$kualitas  = $_POST['kualitas_padi'];
$stok      = $_POST['stok_kg'];
$warna     = $_POST['warna'];
$harga     = $_POST['harga'];
$detail    = $_POST['detail_padi'];
$tglMasuk  = $_POST['tgl_masuk'];
$tglKeluar = $_POST['tgl_keluar'];

$id        = $_POST['id_padi'];
$query = "UPDATE `padi` SET
`jenis_padi`='".$jenis. "',`kualitas_padi`='".$kualitas. "',`stok_kg`='".$stok."',`warna`='".$warna."',`harga`='".$harga."',
`detail_padi`='".$detail."',`tgl_masuk`='".$tglMasuk. "',`tgl_keluar`='".$tglKeluar. "' WHERE `id_padi`=".$id;

if ($konek->query($query) === TRUE) {
  header('location:lihat_padi.php');
}else {
  echo "Insert gagal";
} -->
