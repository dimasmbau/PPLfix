<?php
require 'koneksi.php';
session_start();


if (empty($_SESSION['id']) OR !isset($_SESSION['id'])) {
  echo "<script>alert('Login Terlebih Dahulu !!');</script>";
  echo "<script>location = 'login.php';</script>";
  exit();
}
$idpem = $_GET['id_pemesanan'];

$ambil = $konek->query("SELECT * FROM pemesanan WHERE id_pemesanan = '$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelangganygbeli= $detpem['id_user'];
// $jumlah = $_GET["total_pemesanan"];
$id_pelangganyglogin = $_SESSION['id'];
if ($id_pelangganygbeli !== $id_pelangganyglogin) {
  echo "<script>alert('Jangan coba coba !');</script>";
  echo "<script>location='riwayat_pemesanan.php';</script>";
  exit();
}
?>
<!-- <pre><//?php print_r($idpem) ?></pre> -->
<!-- <pre><//?php print_r($_GET['total_pemesanan']) ?></pre> -->
<!-- <pre><//?php print_r($detpem) ?></pre> -->
<!-- <pre><//?php print_r($_SESSION) ?></pre> -->
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
  <body>

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
                        <a href="cart.html">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
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
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="riwayat_pemesanan.php">Riwayat Pemesanan</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li>
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
                        <h2>Pembayaran</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
          <h2>Konfirmasi Pembayaran</h2>
          <p>Kirim bukti pembayaran anda disini</p>
          <div class="aler alert-info col-md-3">
            <br>
            <h5>Total Tagihan Anda Rp. <?php echo number_format($detpem['total_pemesanan']); ?></h5>
          </div>
            <div class="row">
                <div class="col-md-10">
                  <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Penyetor</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Rudi Tabuti" required name="nama">
                        </div>
                        <div class="form-group">
                          <div class="form-group">
                            <label for="exampleInputEmail1">No Rekening</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="111-233-412-12" name="norek" required >
                          </div>
                          <label >Bank</label>
                          <select class="form-control" name="bank" required>
                           <option value="">Pilih Bank</option>
                           <option value="Mandiri">Mandiri</option>
                           <option value="BCA">BCA</option>
                           <option value="BNI">BNI</option>
                           <option value="BRI">BRI</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Jumlah</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" readonly name="jumlah" value="Rp. <?php echo number_format($detpem['total_pemesanan']); ?>" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Foto Bukti Pembayaran</label>
                          <input type="file" id="exampleInputFile" name="bukti" required>
                          <p class="text-danger">Foto bukti Max 2Mb</p>
                        </div>
                        <button type="submit" class="btn btn-default" name="kirim" >Kirim</button>
                        </form>
                        <?php
                        if (isset($_POST["kirim"])){
                          $nama = $_POST["nama"];
                          $norek = $_POST["norek"];
                          $bank = $_POST["bank"];
                          $jumlah = $detpem['total_pemesanan'];
                          $tanggal = date("Y-m-d");
                          //upload foto butti
                          $namabukti = $_FILES["bukti"]["name"];
                          $filesize = $_FILES["bukti"]["size"];
                          $filetype = $_FILES["bukti"]["type"];
                          $lokasibukti = $_FILES["bukti"]["tmp_name"];
                          $namafiks = date("YmdHis").$namabukti;

                          if($filesize > 1097152)
                          {
                            echo "<script>alert('foto lebih dari 2 MB !');</script>";
                          }
                          else
                          {

                          if ($filetype!= "image/jpeg"
                          && $filetype != "image/jpg"
                          && $filetype != "image/png")
                          {
                            echo "<script>alert('File yang diupload harus bertipe jpg/png');</script>";
                          }
                          else
                          {


                            move_uploaded_file($lokasibukti, "buktipembayaran/$namafiks");

                            $konek->query("INSERT INTO pembayaran(id_pemesanan, nama, no_rekening, bank, jumlah, tanggal, bukti)
                            VALUES ('$idpem', '$nama', '$norek', '$bank', '$jumlah', '$tanggal', '$namafiks')");

                            //update verifikasi Pembayaran
                            $konek->query("UPDATE pemesanan SET status_pembayaran = 'lunas'
                              WHERE  id_pemesanan = '$idpem'");

                              echo "<script>alert('Terimakasih sudah melalukan Pembayaran !');</script>";
                              echo "<script>location='riwayat_pemesanan.php';</script>";

                            }
                          }
                        }
                        ?>
                </div>
              </div>
            </div>
        </div>
    </div>


    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
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
                            <li><a href="#">My account</a></li>
                            <li><a href="#">Order history</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Vendor contact</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Mobile Phone</a></li>
                            <li><a href="#">Home accesseries</a></li>
                            <li><a href="#">LED TV</a></li>
                            <li><a href="#">Computer</a></li>
                            <li><a href="#">Gadets</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->

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
    </div> <!-- End footer bottom area -->

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
