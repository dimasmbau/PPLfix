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
    <title>eElectronics - HTML eCommerce Template</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image: url(bgppl.png);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100%;
">

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="user-menu">
                      <ul>
                        <li><a href="akunp.php"><i class="fa fa-user"></i> My Account</a></li>
                        <!-- <li><a href="#"><i class="fa fa-th-list"></i> Wishlist</a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                        <li><a href="#"><i class="fa fa-money"></i> Checkout</a></li> -->
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                      </ul>
                  </div>
                </div>

            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="home.php">e<span>Paddy</span></a></h1>
                    </div>
                </div>

                <!-- <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt"></span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div> -->
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="shop.php">ePaddy</a></li>
                        <!-- <li><a href="single-product.html">Single product</a></li> -->

                        <li class="active"><a href="nota.php">Nota</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Nota</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

      // $id_pemesanan = $_GET['id_pemesanan']
      // $nomor = 1;
      $query = $konek->query("SELECT * FROM pemesanan JOIN user ON pemesanan.id_user = user.id_user
                              JOIN pengiriman on pemesanan.id_pengiriman = pengiriman.id_pengiriman
                              WHERE pemesanan.id_pemesanan = '$_GET[id_pemesanan]'");
      $data = $query->fetch_assoc();
     ?>
    <!-- <pre><//?php print_r($data); ?></pre> -->

    <!-- <pre><//?php print_r($_SESSION); ?></pre> -->
    <!-- //menambah keamanan  -->
    <?php
    $id_pelangganygbeli = $data['id_user'];

    $id_pelangganyglogin= $_SESSION['id'];
    if ($id_pelangganygbeli !== $id_pelangganyglogin) {
      echo "<script>alert('Jangan coba coba !');</script>";
      echo "<script>location='riwayat_pemesanan.php';</script>";
      exit();
    }
     ?>





    <br><br><br>

  <div class="row">
    <div class="container">

    <div class="col-md-4 col-md-offset-1" style="color: white">
      <h2>Pelanggan</h2>
      <h4><strong><?php echo $data['nama_depan'] ?> <?php echo $data['nama_belakang']; ?></strong><br></h4>

      <p>
        Email : <?php echo $data['email'];?><br>
        Alamat : <?php echo $data['alamat'];?><br>

      </p>
    </div>
    <div class="col-md-4" style="color: white">
      <h2>Pembelian</h2>
      <h4><strong>No Pemesanan : <?php echo $data['id_pemesanan'];?></strong><br></h4>
      <p>
        Tanggal : <?php echo $data['tgl_pesan'];?><br>
        Total   : Rp. <?php echo number_format($data['total_pemesanan']);?><br>
        Status Pembayaran : <?php echo $data['status_pembayaran'];?><br>
      </p>
    </div>
    <div class="col-md-3" style="color: white">
      <h2>Pengiriman</h2>
      <h4><strong><?php echo $data['nama_kota'];?></strong><br></h4>
      <p>
        Ongkos Kirim : Rp. <?php echo number_format($data['tarif']);?><br>
        Alamat Pengiriman : <?php echo ($data['alamatkirim']);?>
      </p>
    </div>


  </div>


  <?php
  $nomor = 1;
  $qr = $konek->query("SELECT * FROM detai_pemesanan JOIN padi ON detai_pemesanan.id_padi = padi.id_padi
                          WHERE detai_pemesanan.id_pemesanan = '$_GET[id_pemesanan]' ");
  ?>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="product-content-right">
                      <div class="container-fluid panel panel-warning table-reponsive" style="opacity:0.7;">
                              <br>
                              <table class="table table-hover" style=" text-align: center; ">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <!-- <th style="text-align: center;">Id detail</th> -->
                                    <th style="text-align: center;">Nama Padi</th>
                                    <th style="text-align: center;">Harga</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Subtotal</th>
                                    <!-- <th style="text-align: center;">Aksi</th> -->
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
                                  </tr>

                        <?php $nomor++;  ?>
                        <?php }} ?>
                                  <tfoot>
                                    <tr>
                                      <th style="text-align: center;" colspan="4">TARIF</th>
                                      <th style="text-align: center;">Rp. <?php echo number_format($data['tarif']); ?></th>
                                    </tr>
                                    <tr>
                                      <th style="text-align: center;" colspan="4">TOTAL BELANJA</th>
                                      <th style="text-align: center;">Rp. <?php echo number_format($data['total_pemesanan']); ?></th>
                                    </tr>
                                  </tfoot>
                            </table>
                          </div>
                      </div>
                  </div>
            </div>
            <br><br><br>

              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <div class="alert alert-info" role="alert">
                    <p>
                      Silahkan melakukan pembayaran Rp. <?php echo number_format($data['total_pemesanan']); ?> <br>
                      ke <strong>Bank Mandiri 137-009826-2341 AN. ePaddy</strong>
                    </p>
                  </div>
                </div>
                <div class="col-md-4 col-md-offset-4">
                  <div class="alet alert-success" role="alert">
                      <p style="text-align : center"><strong>Lanjutkan Pembayaran di Menu Riwayat Pemesanan</strong><br>Lakukan Pembayaran Max 3 hari</p>
                  </div>
              </div>
              <a href="riwayat_pemesanan.php?id_user=<?php echo $data['id_user']; ?>" class="btn btn-primary" style="background:#1abc9c; border:none; margin-left:70%">Go>></a>

        </div>
    </div>
    <br>

    <div class="footer-top-area">
      4<div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="">My account</a></li>
                            <li><a href="">Order history</a></li>
                            <li><a href="">Wishlist</a></li>
                            <li><a href="">Vendor contact</a></li>
                            <li><a href="">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="">Mobile Phone</a></li>
                            <li><a href="">Home accesseries</a></li>
                            <li><a href="">LED TV</a></li>
                            <li><a href="">Computer</a></li>
                            <li><a href="">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>
