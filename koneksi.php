<?php
$konek	= mysqli_connect("localhost","root","","sipad");
// $pilih_db = mysql_select_db($db);
if ($konek) {
	// echo "Berhasil ";
	if("sipad"){
		// echo "database ditemukan";
	}else{
		// echo "database tidak ditemukan";
	}
}else{
	// echo "gagal terkoneksi";
}
