<?php
require 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Data Pemesanan</title>

  <!-- Bootstrap -->
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap-3.3.7-dist/font/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="cssadmin.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- awal navbar -->
  <nav class="navbar navbar-default navbar-custom navbar-fixed-top affix-top" id="mainNav" style="opacity: 0.9">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><img id="img1" src="ppl.png" style="width: 70px; margin-top: -14px; "></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="">Hello Admin :)</a></li>
        </ul>
        </li>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Padi
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="data_padi.php">Masukkan Data Padi</a></li>
              <li><a href="lihat_padi.php">Lihat Data Padi</a></li>
            </ul>
          </li>
          <li class="active"><a href="Pemesanan.php">Pemesanan</a></li>
          <li><a href="pelanggan.php">Pelanggan</a></li>
          <li><a href="index.php" class="glyphicon glyphicon-off" onclick="return confirm('Anda akan logout?')" style="margin-top: -3px"></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <!-- welcome paddy -->

  <img id="welcome" src="ppl.png" style="
  width : 50%;
  margin-top: 100px;
  margin-left: 360px">

  <!-- data padi -->
  <br><br><br>
  <div class="container col-md-10 col-md-offset-1"
  style="background-color: #818481a1 ;
         border-radius: 10px;
         padding-bottom: 20px;">
  <h3>Lihat Data Pelanggan <span class="label label-default"></span></h3>
<!-- tabel data padi -->
<?php
  // require 'koneksi.php';
  // $id_pemesanan = $_GET['id_pemesanan']
  // $nomor = 1;
  $query = $konek->query("SELECT * FROM pembayaran JOIN pemesanan ON pembayaran.id_pemesanan = pemesanan.id_pemesanan
                          WHERE pembayaran.id_pemesanan = '$_GET[id_pemesanan]'");
  $data = $query->fetch_assoc();
 ?>
<!-- <pre><//?php print_r($data); ?></pre> -->


<br><br>
 <div class="row">
        <div class="container-fluid panel panel-warning table-reponsive col-md-6 col-md-offset-2">
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
              <th>Bank</th>
              <td><?php echo $data['bank']; ?></td>
            </tr>
            <tr>
              <th>Jumlah</th>
              <td><?php echo $data['jumlah']; ?></td>
            </tr>
            <tr>
              <th>Tanggal</th>
              <td><?php echo $data['tanggal']; ?></td>
            </tr>
          </table>
        </div>
        <div class="col-md-2">
          <img src="buktipembayaran/<?php echo $data['bukti'] ?>" alt="" class="img-responsive" style="width:200px">
        </div>
 </div>

 <form method="post">
   <div class="col-md-6 col-md-offset-2">
   <div class="form-group">
     <label >Nomer Resi Pengiriman</label>
     <input class="form-control" type="text" name="noresi">
   </div>
   <div class="form-group">
     <label >Status</label>
     <select class="form-control" name="status">
      <option value="">Pilih Status</option>
      <option value="lunas">lunas</option>
      <option value="belum lunas">belum lunas</option>
      <option value="barang dikirim">barang dikirim</option>
      <option value="pending">pending</option>
     </select>
   </div>
   <button class="btn btn-primary" name="proses">Proses</button>
 </div>
 </form>
<?php
if (isset($_POST["proses"])) {
  $_GET[id_pemesanan];
  $resi = $_POST["noresi"];
  $status = $_POST["status"];
  $konek->query("UPDATE pemesanan SET resi_pengiriman = '$resi', status_pembayaran = 'barang dikirim'
                 WHERE id_pemesanan = '$_GET[id_pemesanan]'");

  echo "<script>alert('Data Pemesanan diupdate');</script>";
  echo "<script>location='pemesanan.php';</script>";
}
?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>

</html>
