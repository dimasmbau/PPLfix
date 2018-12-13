<?php
require 'koneksi.php';
session_start();

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
  echo "<script>alert('Belanja terlebih dahulu sebelum melakukan checkout !');</script>";
  echo "<script>location = 'shop.php';</script>";
}
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
                        <li><a href="cart.php">Cart</a></li>
                        <li class="active"><a href="checkout.php">Checkout</a></li>
                        <li><a href="riwayat_pemesanan.php">Riwayat Pemesanan</a></li>
                        <!-- <li><a href="#">Category</a></li> -->
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
    </div>
    <!-- <pre><//?php print_r($_SESSION) ?></pre> -->
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              <form class="form-inline col-md-8 col-md-offset-2" method="post">
                <div class="form-group">
                  <input type="text" readonly value="Silahkan melalukan checkout <?php echo $_SESSION["nama"] ?>" style=" border: none;text-transform:capitalize; width: 270px">
                </div>
              </form>
              <div class="col-md-8 col-md-offset-2">
                  <div class="product-content-right">
                      <div class="woocommerce">
                              <br>
                              <table cellspacing="0" class="shop_table cart">
                                  <thead>
                                      <tr>
                                          <th class="product-remove">No</th>
                                          <th class="product-thumbnail">&nbsp;</th>
                                          <th class="product-name">Produk</th>
                                          <th class="product-price">Harga</th>
                                          <th class="product-quantity">Banyak Barang</th>
                                          <th class="product-subtotal">Subharga</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php   $nomer = 1; ?>
                                    <?php $totalbelanja = 0; ?>
                                    <?php foreach ($_SESSION['keranjang'] as $id_padi => $jumlah): ?>
                                      <?php $query = mysqli_query($konek, "SELECT * FROM padi WHERE id_padi = '$id_padi'");
                                            $data = $query->fetch_assoc();
                                            $subharga = $data['harga']*$jumlah;
                                       ?>

                                      <tr class="cart_item">
                                          <td class="product-remove">
                                            <?php echo $nomer; ?>
                                          </td>

                                          <td class="product-thumbnail">
                                            <img src="upload/<?php echo $data['gambar']; ?>">
                                          </td>

                                          <td class="product-name">
                                              <?php echo $data['jenis_padi']; ?>
                                          </td>

                                          <td class="product-price">Rp.
                                              <?php echo number_format($data['harga'])  ?>
                                          </td>

                                          <td class="product-quantity">
                                              <?php echo $jumlah; ?>
                                          </td>

                                          <td class="product-subtotal">Rp.
                                              <?php echo number_format($subharga); ?>
                                          </td>

                                      </tr>

                                    <?php $nomer++;  ?>
                                    <?php $totalbelanja += $subharga ?>
                                    <?php endforeach; ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th colspan="5">Total Belanja</th>
                                      <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                                    </tr>
                                  </tfoot>

                              </table>

                              <form class="col-md-9" method="post">

                                <div class="form-group">
                                  <label for="alamatkirim"> Alamat Lengkap Pengiriman : </label>
                                  <textarea required class="form-control" name="alamatkirim" rows="2" cols="80"></textarea>
                                </div>
                                <br><br>
                                <select class="form-control" name="id_pengiriman" style="width: 175px ; margin-top:-40px" required>
                                    <option value="">Pilih Ongkos Kirim</option>
                                    <?php $ambil = $konek->query("SELECT * FROM pengiriman");
                                    while ($perpengiriman = $ambil->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $perpengiriman['id_pengiriman']; ?>">
                                      <?php echo $perpengiriman['nama_kota']; ?>- Rp.
                                      <?php echo number_format($perpengiriman['tarif']); ?>
                                    </option>
                                  <?php } ?>
                                  </select>

                                  <br>
                                  <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
                              </form>

                              <br>

                              <?php
                              if (isset($_POST['checkout'])) {
                                $id_user = $_SESSION['id'];
                                $id_pengiriman = $_POST['id_pengiriman'];
                                $alamatkirim = $_POST['alamatkirim'];
                                $tgl_pesan = date("Y-m-d");
                                // echo "$id_user";
                                // echo $tgl_pesan;
                                // echo $id_pengiriman;
                                // echo $total_pemesanan;
                                // echo $tarif;
                                $ambill = $konek->query("SELECT * FROM pengiriman where id_pengiriman = '$id_pengiriman'");
                                $arraypengiriman = $ambill->fetch_assoc();
                                $tarif = $arraypengiriman['tarif'];
                                // echo $tarif;
                                $total_pemesanan = $totalbelanja + $tarif;
                                // echo $total_pemesanan;
                                //simpan data pemesanan
                                $konek->query("INSERT INTO `pemesanan`(`id_pemesanan`, `id_user`, `id_pengiriman`, `tgl_pesan`, `total_pemesanan`, `alamatkirim`, `status_pembayaran`)
                                              VALUES (NULL,'$id_user','$id_pengiriman','$tgl_pesan','$total_pemesanan','$alamatkirim','belum lunas')");

                                //mendapatkan id pemesanan yang telah terjadi
                                      $id_pemesanan_sukses = $konek->insert_id;

                                      foreach ($_SESSION['keranjang'] as $id_padi => $jumlah) {
                                        $konek->query("INSERT INTO `detai_pemesanan`(`id_detail`, `id_pemesanan`, `id_padi`, `jumlah`)
                                                      VALUES (NULL,'$id_pemesanan_sukses','$id_padi','$jumlah')");

                                        //update stok
                                        $konek->query("UPDATE padi SET stok_kg = stok_kg -$jumlah
                                                       WHERE id_padi = '$id_padi'");
                                      }
                                      //mengkosongkan keranjang Belanja
                                      unset($_SESSION["keranjang"]);


                                      echo "<script>alert('Pemesanan sukses');</script>";
                                      echo "<script>location='nota.php?id_pemesanan=$id_pemesanan_sukses';</script>";

                            }
                            ?>
                          </div>

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
