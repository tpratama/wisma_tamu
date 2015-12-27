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
                <li class="active"><a href="./submit_kamar.php">Kamar</a></li>
                <li ><a href="./tambah_fasilitas.php">Fasilitas</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">asd <i class="icon-angle-down"></i></a>
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
<div class="container" >

<h2>Input</h2>
<div class="row">

    <div class="col-lg-4">
    <form action="submit_kamar.php" method="post">
        <div class="form-group">

            <label>Nomor kamar</label>
            <input type="text" class="form-control" name="no_kamar" value="<?php
            if (isset($_POST['wisma_select'])) {
                $stmt = $my_connection->select("SELECT COUNT(NO) FROM KAMAR WHERE ID_WISMA='".$_POST['wisma_select']."'");
                $row = oci_fetch_array($stmt);
                if ($_POST['wisma_select']=='W001') $prefix='F';
                else if ($_POST['wisma_select']=='W002') $prefix='J';
                else if ($_POST['wisma_select']=='W003') $prefix='B';
                echo $prefix;
                printf("%03d", $row["COUNT(NO)"] + 1);
            }
            ?>">
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control" name="kelas">
                <?php
                $stmt=$my_connection->select("SELECT * FROM KELAS");
                while (($row = oci_fetch_array($stmt,OCI_BOTH))!=FALSE){
                ?>
                    <option value="<?php echo $row["ID_KELAS"] ?>" ><?php echo $row["NAMA_KELAS"];?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga">
        </div>
        <div class="form-group">
            <label>Kapasitas</label>
            <input type="text" class="form-control" name="kapasitas">
        </div>
        <div class="form-group">
            <label>Wisma</label>
            <select class="form-control" name="wisma">
                <?php
                $stmt=$my_connection->select("SELECT * FROM WISMA");
                while (($row = oci_fetch_array($stmt,OCI_BOTH))!=FALSE){
                    ?>
                    <option value="<?php echo $row["ID"] ?>" ><?php echo $row["NAMA"];?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <input type="submit" class="btn btn-primary"></input>

    </form>
    </div>
    <div class="col-md-8">
        <div class="row">
           <div class="col-lg-4">
               <label>Lokasi Wisma : </label>
               <form method="post" action="tambah_kamar.php">
               <select name="wisma_select" id="pilih_wisma">
                   <?php
                   $stmt=$my_connection->select("SELECT * FROM WISMA ");
                   while (($row = oci_fetch_array($stmt,OCI_BOTH))!=FALSE){
                   ?>
                       <?php
                            if ($_POST["wisma_select"]!=$row["ID"]) {
                       ?>
                                <option value="<?php echo $row["ID"] ?>"><?php echo $row["NAMA"]; ?></option>
                       <?php
                            }
                            else{
                       ?>
                                <option value="<?php echo $row["ID"] ?>" selected><?php echo $row["NAMA"]; ?></option>
                       <?php }?>
                   <?php
                   }
                   ?>
               </select>
               <button type="submit">Select</button>

               </form>
           </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th width="100px">No.</th>
                <th width="150px;" >Kelas</th>
                <th>Harga</th>
                <th width="">Kapasitas</th>
                <th>ID Wisma</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
        <div style="height: 280px;overflow: auto;">
        <table class="table table-striped">
                <tbody >
                    <?php
                    if (isset($_POST['wisma_select'])){
                        $stmt=$my_connection->select("SELECT * FROM KAMAR WHERE ID_WISMA='".$_POST['wisma_select']."' ORDER BY NO");
                    }
                    else  $stmt=$my_connection->select("SELECT * FROM KAMAR ORDER BY NO ");

                    while(($row=oci_fetch_array($stmt,OCI_BOTH))!=false) {
                    ?>
                        <tr >
                            <td width="80px;"> <?php echo $row["NO"];?></td >
                            <td width="120px;"> <?php

                                $stmt2=$my_connection->select("SELECT * FROM KELAS WHERE ID_KELAS='".$row["KELAS"]."'");
                                $data=oci_fetch_array($stmt2);
                                echo $data["NAMA_KELAS"];
                                ?></td >
                            <td width="70px;"> <?php echo $row["HARGA"];?></td >
                            <td width="100px;"> <?php echo $row["KAPASITAS"];?></td >
                            <td width="100px"> <?php echo $row["ID_WISMA"];?></td >
                            <td width="10px;">
                                <form action="edit_kamar.php" method="post">
                                    <button type="submit" class="btn btn-default" aria-label="Left Align" value="<?php echo $row["NO"]?>" name="id_kamar">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </td>
                            <td width="10px;">
                                <form action="./model/delete_kamar_model.php" method="get">
                                    <button type="submit" class="btn btn-default" aria-label="Left Align" value="<?php echo $row["NO"]?>" name="id_kamar">
                                        <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </td>



                        </tr >
                    <?php
                    }
                    ?>

                </tbody>
        </table>
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

</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
</body>
</html>