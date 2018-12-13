
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akun</title>

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
                          <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                          <!-- <li><a href="#"><i class="fa fa-th-list"></i> Wishlist</a></li> -->
                          <!-- <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> My Cart</a></li> -->
                          <!-- <li><a href="checkout.html"><i class="fa fa-money"></i> Checkout</a></li> -->
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

            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="shop.html"></a></li>
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
                        <h2>Akun</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    session_start();
    require 'koneksi.php';

      //Menulis query sql

    // $sql = "SELECT * FROM user";
    // $ceklogin = mysqli_query($konek,$sql);
    // $get = mysqli_fetch_assoc($ceklogin);

    $id = $_SESSION['id'];

    // echo $_session['id'];
    $query =mysqli_query($konek, "SELECT * FROM user where id_user = '$id'");

     ?>
    <div class="row">
      <br>
      <div class="container">
        <table style="width:100%">
          <?php if (mysqli_num_rows($query)>0) {?>
            <?php
                  while ($data = mysqli_fetch_array($query)){
              ?>
          <tr>
            <th>Nama Depan</th>
          </tr>
          <tr>
            <td><?php echo $data ['nama_depan']; ?></td>
          </tr>

          <tr>
            <th>Nama Belakang</th>
          </tr>
          <tr>
            <td><?php echo $data ['nama_belakang']; ?></td>
          </tr>

          <tr>
            <th>Email</th>
          </tr>
          <tr>
            <td><?php echo $data ['email']; ?></td>
          </tr>

          <tr>
            <th>Alamat</th>
          </tr>
          <tr>
            <td><?php echo $data ['alamat']; ?></td>
          </tr>

          <tr>
            <th>No KTP</th>
          </tr>
          <tr>
            <td><?php echo $data ['no_ktp']; ?></td>
          </tr>

          <tr>
            <th>Password</th>
          </tr>
          <tr>
            <td><?php echo $data ['password']; ?></td>
          </tr>

          <tr>
            <th>Edit</th>
          </tr>
          <tr>
            <td><button type="button" class="btn btn-light" data-toggle="modal" data-target="#modaledit<?php echo $data['id_user']; ?>"><span>Edit</span></button></td>
          </tr>
          <div class="modal fade" id="modaledit<?php echo $data['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <form method="POST">
  <div class="form-group">
      <label for="namadep">Nama Depan :</label>
  <input type="Name" name="nama_depan" class="form-control" id="namadep" placeholder="Nama Depan" value="<?php echo $data ["nama_depan"];?>">
</div>
  <div class="form-group">
    <label for="namabel">Nama Belakang:</label>
<input type="Name" name="nama_belakang" class="form-control" id="namabel" placeholder="Nama Belakang" value="<?php echo $data ["nama_belakang"];?>">
  </div>
  <div class="form-group">
    <label for="e-mail">Email :</label>
    <input type="email" name="email" class="form-control" id="e-mail" placeholder="" value="<?php echo $data ["email"];?>">
  </div>
  <div class="form-group">
    <label for="alamatt">Alamat :</label>
    <input type="name" name="alamat" class="form-control" id="alamatt" placeholder="" value="<?php echo $data ["alamat"];?>">
  </div>
  <div class="form-group">
    <label for="no-ktp">No KTP :</label>
    <input type="number" min="16" max="16 name="no_ktp" class="form-control" id="no-ktp" placeholder="" value="<?php echo $data ["no_ktp"];?>">
  </div>
  <div class="form-group">
    <label for="passwordd">Password :</label>
    <input type="password" name="password" class="form-control" id="passwordd" placeholder="" value="<?php echo $data ["password"];?>">
  </div>
  <div class="form-group">
      <input type="hidden" class="form-control"
      id="exampleInputPassword1" name="id_user"
      value="<?php echo $data ["id_user"];?>">
  </div>
  <button type="submit" class="btn btn-primary" name="btnedit" >Submit</button>
  <?php

           if (isset($_POST['btnedit'])) {
                require 'koneksi.php';

                // $id        = $_POST['id_padi'];

                $namadepan       = $_POST['nama_depan'];
                $namabelakang   = $_POST['nama_belakang'];
                $email          = $_POST['email'];
                $alamat         = $_POST['alamat'];
                $noktp          = $_POST['no_ktp'];
                $password       = $_POST['password'];


                $qy = "UPDATE `user` SET `nama_depan` = '$namadepan', `nama_belakang` = '$namabelakang', `email` = '$email', `alamat` = '$alamat', `no_ktp` = '$noktp', `password` = '$password' WHERE `user`.`id_user` = $id";

                if ($konek->query($qy) === TRUE) {
                  echo "<script>
                 document.location.href = 'akunp.php'
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
      <br>
    </div>






    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Paddy</span></h2>
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
