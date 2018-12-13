<?php
require 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	   <link rel="stylesheet" type="text/css" href="cssindex.css">
</head>
<body>

<img id="cok" src="ppl.png" alt="">
<div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <form method="post" >

          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nama Depan<span class="req">*</span>
              </label>
              <input type="text" name="nama_depan" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
                Nama Belakang<span class="req">*</span>
              </label>
              <input type="text" name="nama_belakang" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Alamat<span class="req">*</span>
            </label>
            <input type="Alamat" name="alamat" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              No KTP<span class="req">*</span>
            </label>
            <input type="number" min="16" max="16" name="no_ktp" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>

            <input type="submit" class="button button-block" name="btnregister" value="Register" />

          </form>
          <?php
         if (isset($_POST['btnregister'])) {

              $sql = mysqli_query($konek, "INSERT INTO user VALUES
                                          (NULL,
                                          '".$_POST['nama_depan']."',
                                          '".$_POST['nama_belakang']."',
                                          '".$_POST['email']."',
                                          '".$_POST['alamat']."',
                                          '".$_POST['no_ktp']."',
                                          '".$_POST['password']."',
                                                    'pembeli')");
                                  if ($sql) {
                                    // echo 'berhasil';
                                    echo "<script>alert('data berhasil ditambah')</script>";
                                    }else{
                                      echo 'gagal';
                                    }
                                    # code...
                                  }
            // $nama_depan       = ($_POST['nama_depan']);
            // $nama_belakang    = ($_POST['nama_belakang']);
            // $email            = ($_POST['email']);
            // $alamat           = ($_POST['alamat']);
            // $password1        = ($_POST['password1']);
            // $password2        = ($_POST['password2']);

          //   if ($password1 == $password2) {

          //     $cekregister = mysqli_query($konek,$sql);
          //    echo "location:index1.php";
          //   }elseif ($password1 !== $password2) {
          //     echo "location:index1.php";
          //   }
          // }
          ?>


        </div>

        <div id="login">
          <h1>Welcome</h1>

          <form method="post">

            <div class="field-wrap">
            <label>
              Name<span class="req">*</span>
            </label>
            <input type="username"required autocomplete="off" name="username" />
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" />
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <input type="submit" class="button button-block" name="submit" value="Login" />

          </form>

        </div>



        <?php
        session_start();

        require 'koneksi.php';

          if (isset($_POST['submit'])) {


            $username = ( $_POST['username']);
            $password = ($_POST['password']);
            $sql = "SELECT * FROM user WHERE nama_depan='$username' AND password='$password'";
            $ceklogin = mysqli_query($konek,$sql);
            if (mysqli_num_rows($ceklogin) >0) {
              $get = mysqli_fetch_assoc($ceklogin);

              $lvl = $get['level'];

              if ($lvl=="admin") {
                $_SESSION['login'] = "admin" ;
                    echo "<script>
                    document.location.href = 'data_padi.php'
                    </script>";

                  // echo "<div class='alert alert-success' role='alert'>Login Sukses</div>";
                  // header("location:data_padi.php");
                } elseif ($lvl =="pembeli") {

                    $_SESSION['login'] = "pembeli";

                    $_SESSION['id'] = $get['id_user'];
                    $_SESSION['nama'] = $get['nama_depan'];
                    // echo $_SESSION['id'];
                    echo "<script>

                    document.location.href = 'home.php'
                    </script>";
                  }
                  }
                  else{
                    echo "<script>alert('username atau paswword salah')</script>";
                    // header("location:index1.php");
                  }
                }
         ?>
      </div><!-- tab-content -->

    </div> <!-- /form -->
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="js.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>
