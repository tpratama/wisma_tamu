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
                <li><a href="./submit_kamar.php">Kamar</a></li>
                <li class="active"><a href="./tambah_fasilitas.php">Fasilitas</a></li>
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
            <form action="./model/add_fasilitas_model.php" method="post">
                <div class="form-group">

                    <label>ID Fasilitas</label>
                    <input type="text" class="form-control" name="id_fasilitas">
                </div>
                <div class="form-group">
                    <label>Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas">
                </div>
                <input type="submit" class="btn btn-primary"></input>

            </form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th width="70px">No.</th>
                    <th width="200px">Nama Fasilitas</th>
                    <th width="20px;">Actions</th>
                </tr>
                </thead>
            </table>
            <div style="height: 480px;overflow: auto;">
                <table class="table table-striped">
                    <tbody >
                    <?php
                    $stmt=$my_connection->select("SELECT * FROM FASILITAS ORDER BY ID_FASILITAS ");

                    while(($row=oci_fetch_array($stmt,OCI_BOTH))!=false) {
                        ?>
                        <tr >
                            <td width="140px;"> <?php echo $row["ID_FASILITAS"];?></td >
                            <td width="400px;"> <?php echo $row["FASILITAS"];?></td >
                            <td width="10px;">
                                <form action="edit_kamar.php" method="post">
                                    <button type="submit" class="btn btn-default" aria-label="Left Align" value="<?php echo $row["ID_FASILITAS"]?>" name="id_fasilitas">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </td>
                            <td width="10px;">
                                <form action="./model/delete_fasilitas_model.php" method="get">
                                    <button type="submit" class="btn btn-default" aria-label="Left Align" value="<?php echo $row["ID_FASILITAS"]?>" name="id_fasilitas">
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