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
  <!-- <h3>Lihat Data Pelanggan <span class="label label-default"></span></h3> -->
<!-- tabel data padi -->
<?php
  require 'koneksi.php';
  // $id_pemesanan = $_GET['id_pemesanan']
  // $nomor = 1;
  
  $query = $konek->query("SELECT * FROM pemesanan JOIN user ON pemesanan.id_user = user.id_user
                          WHERE pemesanan.id_pemesanan = '$_GET[id_pemesanan]'");
  $data = $query->fetch_assoc();
 ?>
<!-- <pre></?php print_r($data); ?></pre> -->

<h3 style=" text-decoration: underline;text-transform: uppercase;"><strong>Nama Pelanggan : <?php echo $data['nama_depan'] ?></strong>
<strong><?php echo $data['nama_belakang']; ?></strong></h3>
<p><strong>Email  : <?php echo $data['email']; ?><br>
   Alamat : <?php echo $data['alamat']; ?><br>
   Tanggal  : <?php echo $data['tgl_pesan']; ?><br>
   Total Pemesanan : Rp. <?php echo number_format($data['total_pemesanan']); ?><br>
   Status Pembayaran : <?php echo ($data['status_pembayaran']); ?></strong>
 </p>

<?php
$nomor = 1;
$qr = $konek->query("SELECT * FROM detai_pemesanan JOIN padi ON detai_pemesanan.id_padi = padi.id_padi
                        WHERE detai_pemesanan.id_pemesanan = '$_GET[id_pemesanan]' ");
?>
 <div class="row">
       <div class="col-md-12 ">
           <div class="container-fluid panel panel-warning table-reponsive">

               <div class="panel-heading">Detail Pemesanan</div>

               <!--   Table -->


                 <table class="table table-hover" style=" text-align: center; ">
                   <tr>
                       <th style="text-align: center;">No</th>
                       <!-- <th style="text-align: center;">Id detail</th> -->
                       <th style="text-align: center;">Nama Padi</th>
                       <th style="text-align: center;">Harga</th>
                       <th style="text-align: center;">Jumlah</th>
                       <th style="text-align: center;">Subtotal</th>
                       <th style="text-align: center;">Aksi</th>
                       <!-- <th style="text-align: center;">No KTP</th> -->
                       <!-- <th style="text-align: center;">Edit</th>
                       <th style="text-align: center;">Hapus</th> -->
                     </tr>
                     <?php if (mysqli_num_rows($qr)>0) {?>
                       <?php
                             while ($dataa = mysqli_fetch_array($qr)){
                         ?>
                     <tr>
                       <td><?php echo $nomor ;?></td>

                       <td><?php echo $dataa ['jenis_padi']; ?></td>
                       <td><?php echo $dataa ['harga']; ?></td>
                       <td><?php echo $dataa ['jumlah']; ?></td>
                       <td><?php echo$dataa['harga'] * $dataa['jumlah']; ?></td>
                       <td>
                         <a href="hapus_detail_pemesanan.php?id_detail=<?php echo $dataa['id_detail']; ?>" onclick="return confirm('Yakin akan di hapus?');" class="btn btn-danger">Hapus</a>
                       </td>



                     </tr>

           <?php $nomor++;  ?>
           <?php }} ?>

               </table>
             </div>
       </div>
     </div>
  <!-- <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="container-fluid panel panel-warning table-reponsive">

                <div class="panel-heading">Data Padi</div>
                <div class="panel-body">
                  <p>Masukkan data padi yang akan dijual. Data berisi nama petani, kualitas padi dan harga
                  </p>
                </div>



                  <table class="table table-hover" style=" text-align: center; ">
                    <tr>
                        <th style="text-align: center;">Nomer</th>
                        <th style="text-align: center;">Petani</th>
                        <th style="text-align: center;">Kualitas</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Alfreds Futterkiste</td>
                        <td>A</td>
                        <td>10.000/kg</td>
                        <td><button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Centro comercial Moctezuma</td>
                        <td>A</td>
                        <td>10.000/kg</td>
                        <td><button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Ernst Handel</td>
                        <td>A</td>
                        <td>10.000/kg</td>
                        <td><button type="button" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                        <td></td>
                      </tr>
                </table>
              </div>
        </div>
      </div> -->


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>

</html>
