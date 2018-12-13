<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>User</title>

  <!-- Bootstrap -->
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap-3.3.7-dist/font/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="cssakun.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="" style="background-image: url(bgppl.png);">
  <!-- awal navbar -->
  <nav class="navbar navbar-default navbar-fixed-top" style="">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><img id="img1" src="ppl.png" style="width: 70px; margin-top: -14px; "></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="">Hello User :)</a></li>
        </ul>
        </li>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="data_padi.php">Data Padi</a></li>
          <li><a href="#">Pemesanan</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">About</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </li>
         <li><a href="akun.php" class="glyphicon glyphicon-user" style="margin-top: -3px"></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <!-- welcome paddy -->

  <!-- <img id="welcome" src="ppl.png" style="
  opacity: 0.6;
  width : 50%;
  margin-top: 100px;
  margin-left: 360px"> -->
<div class="jumbotron" style="
background-image: url(gambar/headberas2.jpg);
box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);
margin-top: 50px;
height: 500px;
color: white;">
  <div class="container" style="margin-top: 90px">
     <h1>Selamat Datang</h1>
  <p>Cari Beras sesuai kualitas yang anda inginkan dengan harga yang terjangkau</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
  </div>
</div>
  <!-- data padi -->
 <div class="row">
    <div class="container">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="gambar/beras1.jpeg" alt="...">
      <div class="caption">
        <h3>Beras 1</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a></a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="gambar/beras2.jpeg" alt="...">
      <div class="caption">
        <h3>Beras 2</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a></a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="gambar/beras3.jpg" alt="...">
      <div class="caption">
        <h3>Beras 3</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a></a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="gambar/beras1.jpeg" alt="...">
      <div class="caption">
        <h3>Beras 4</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="gambar/beras2.jpeg" alt="...">
      <div class="caption">
        <h3>Beras 5</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a></p>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="background-image: none">
      <img src="gambar/beras3.jpg" alt="...">
      <div class="caption">
        <h3>Beras 6</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> </p>
      </div>
    </div>
  </div>

  </div>
</div>

    <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="control-label">Jumlah:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="control-label">Harga:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
              </div>
            </div>
          </div>
        </div>
        <!-- akhri modal -->


  </div>
</div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</body>

</html
