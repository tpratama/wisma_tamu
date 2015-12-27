<?php

include './database/connection.php';

$my_connection=new connection();
$my_connection->connectdb('wisma','wisma');
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/maincss.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FAQ | Flat Theme</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h2>Wisma Tamu</h2>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.html">Home</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kamar <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li  class="active"><a href="career.html">Input</a></li>
                        <li><a href="blog-item.html">Edit</a></li>
                        <li><a href="faq.html">Delete</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact-us.html">Contact</a></li>
            </ul>
        </div>
    </div>
</header><!--/header-->

<?php
    $stmt=$my_connection->select("SELECT * FROM KAMAR WHERE NO='".$_POST['id_kamar']."'");
    $row=oci_fetch_array($stmt,OCI_BOTH);
    $stmt2=$my_connection->select("SELECT * FROM KELAS WHERE ID_KELAS='".$row['KELAS']."'");
    $nama_kelas=oci_fetch_array($stmt2);
    $stmt3=$my_connection->select("
          SELECT f.FASILITAS
          FROM FASILITAS f,
          (SELECT ID_FASILITAS FROM TERDAPAT_FASILITAS WHERE ID_KELAS='".$row['KELAS']."') t
          WHERE f.ID_FASILITAS=t.ID_FASILITAS
          ");

?>

<div class="container" >

    <div class="row">
        <div class="col-lg-3" style="background-color:white;min-height: 320px;">
            <h2>Data Kamar</h2>
            <br>
                <label style="font-size: 16px;">Nomor Kamar :</label>
                <p><?php echo $row["NO"]?></p>
                <label style="font-size: 16px;">Kelas :</label>
                <p><?php echo $nama_kelas['NAMA_KELAS']?></p>
                <label style="font-size: 16px;">Harga :</label>
                <p><?php echo $row['HARGA']?></p>
                <label style="font-size: 16px;">Kapasitas :</label>
                <p><?php echo $row['KAPASITAS']?></p>
        </div>
        <div class="col-lg-8" style="margin-left:20px;background-color: white;">
            <h2>Edit Data</h2>
            <form action="./model/edit_kamar_model.php" method="post">
                <div class="form-group">

                    <label>Nomor kamar</label>
                    <input type="text" class="form-control" name="no_kamar" value="<?php echo $row["NO"]?>" readonly>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="kelas">
                        <?php
                        $stmt=$my_connection->select("SELECT * FROM KELAS");
                        while (($row2 = oci_fetch_array($stmt,OCI_BOTH))!=FALSE){
                            ?>
                            <option value="<?php echo $row2["ID_KELAS"] ?>" ><?php echo $row2["NAMA_KELAS"];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="harga" value="<?php echo $row['HARGA']?>">
                </div>
                <div class="form-group">
                    <label>Kapasitas</label>
                    <input type="text" class="form-control" name="kapasitas" value="<?php echo $row['KAPASITAS']?>">
                </div>

                <input type="submit" class="btn btn-primary"></input>

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>