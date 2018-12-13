<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Data Padi</title>

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
          <li><a href="pemesanan.php">Pemesanan</a></li>
          <li><a href="Pelanggan.php">Pelanggan</a></li>
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
  <h3>Lihat Data Padi <span class="label label-default"></span></h3>
<!-- tabel data padi -->
<?php
  include 'koneksi.php';
  $query = mysqli_query($konek, "SELECT * FROM padi");
 ?>
<div class="row">
      <div class="col-md-12 ">
          <div class="container-fluid panel panel-warning table-reponsive">

              <div class="panel-heading">Data Padi</div>

              <!--   Table -->


                <table class="table table-hover" style=" text-align: center; ">
                  <tr>
                      <th style="text-align: center;">Jenis Padi</th>
                      <th style="text-align: center;">Gambar</th>
                      <th style="text-align: center;">Kualitas Padi</th>
                      <th style="text-align: center;">Stok</th>
                      <th style="text-align: center;">Warna</th>
                      <th style="text-align: center;">Harga</th>
                      <th style="text-align: center;">Detail</th>
                      <th style="text-align: center;">Tanggal Masuk</th>
                      <th style="text-align: center;">Tanggal Keluar</th>
                      <th style="text-align: center;">Edit</th>
                      <th style="text-align: center;">Hapus</th>
                    </tr>
                    <?php if (mysqli_num_rows($query)>0) {?>
                      <?php
                            while ($data = mysqli_fetch_array($query)){
                        ?>
                    <tr>
                      <td><?php echo $data ['jenis_padi']; ?></td>
                      <td><?="<img src='upload/".$data['gambar']."'style='width:200px; heigth:200px;'>" ?></td>
                      <td><?php echo $data ['kualitas_padi']; ?></td>
                      <td><?php echo $data ['stok_kg']; ?></td>
                      <td><?php echo $data ['warna']; ?></td>
                      <td><?php echo $data ['harga']; ?></td>
                      <td><?php echo $data ['detail_padi']; ?></td>
                      <td><?php echo $data ['tgl_masuk']; ?></td>
                      <td><?php echo $data ['tgl_keluar']; ?></td>
                      <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#modaledit<?php echo $data['id_padi']; ?>"><span>Edit</span></button>
                      </td>
                      <td><a class="btn btn-danger" href="hapus.php?id_padi=<?php echo $data['id_padi']; ?>" onclick="return confirm('Yakin akan di hapus?');"><span>Hapus</span></a></td>

                    <!-- update data padi -->


                    <!-- modal -->
                    </tr>
                    <div class="modal fade" id="modaledit<?php echo $data['id_padi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="post">
            <div class="form-group">
                <label for="name">Jenis Padi :</label>
            <input type="Name" name="jenis_padi" class="form-control" id="nameJenisPadi" placeholder="Jenis Padi" value="<?php echo $data ["jenis_padi"];?>">
          </div>
          <div class="form-group">
              <label for="gambar">Gambar :</label>
          <input type="file" name="gambar" class="form-control" id="gambar" placeholder="Gambar Padi" value="<?php echo $data ["gambar"];?>">
          </div>
            <div class="form-group">
              <label for="kualitas">Kualitas :</label>
              <select class="form-control" name="kualitas_padi" value="<?php echo $data ["kualitas_padi"];?>">
                <option>sedang</option>
                <option>baik</option>
                <option>sangat_baik</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Name">Stok Padi :</label>
              <input type="number" min="5" name="stok_kg" class="form-control" id="stok" placeholder="/Kg" value="<?php echo $data ["stok_kg"];?>/Kg">
            </div>
            <div class="form-group">
              <label for="warna">Warna :</label>
              <select class="form-control" name="warna" value="<?php echo $data ["warna"];?>">
                <option>kuning</option>
                <option>hijau</option>
                <option>kuning_coklat</option>
              </select>
            </div>
            <div class="form-group">
              <label for="price">Harga :</label>
              <input type="price" name="harga" class="form-control" id="price" placeholder="Rp" value="<?php echo $data ["harga"];?>">
            </div>
            <div class="form-group">
              <label for="comment">Detal Padi :</label>
              <textarea class="form-control" name="detail_padi" rows="5" id="comment"><?php echo $data ["detail_padi"];?></textarea>
            </div>
            <div class="form-group">
              <label for="date">Tanggal Masuk :</label>
              <input type="date" name="tgl_masuk" class="form-control" id="date1" value="<?php echo $data ["tgl_masuk"];?>">
            </div>
            <div class="form-group">
              <label for="date">Tanggal Keluar :</label>
              <input type="date" name="tgl_keluar" class="form-control" id="date2" value="<?php echo $data ["tgl_keluar"];?>">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control"
                id="exampleInputPassword1" name="id_padi"
                value="<?php echo $data ["id_padi"];?>">
            </div>
            <button type="submit" class="btn btn-primary" name="btnedit" >Submit</button>
            <?php

                     if (isset($_POST['btnedit'])) {
                          require 'koneksi.php';

                          $id        = $_POST['id_padi'];

                          $jenis     = $_POST['jenis_padi'];
                          $kualitas  = $_POST['kualitas_padi'];
                          $stok      = $_POST['stok_kg'];
                          $warna     = $_POST['warna'];
                          $harga     = $_POST['harga'];
                          $detail    = $_POST['detail_padi'];
                          $tglMasuk  = $_POST['tgl_masuk'];
                          $tglKeluar = $_POST['tgl_keluar'];

                          $qy = "UPDATE `padi` SET
                          `jenis_padi`='".$jenis. "',`kualitas_padi`='".$kualitas. "',`stok_kg`='".$stok."',`warna`='".$warna."',`harga`='".$harga."',
                          `detail_padi`='".$detail."',`tgl_masuk`='".$tglMasuk. "',`tgl_keluar`='".$tglKeluar. "' WHERE `id_padi`=".$id;

                          if ($konek->query($qy) === TRUE) {
                            echo "<script>
                           document.location.href = 'lihat_padi.php'
                           </script>
                           ";
                          }else {
                            echo "Insert gagal";
                          }
                        }
                                    ?>
        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" name="btnedit">Edit</button> -->
                </div>
                </div>
            </div>
            </div>

          <?php }} ?>

              </table>
            </div>
      </div>
    </div>
<!-- end tabel data padi -->
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
