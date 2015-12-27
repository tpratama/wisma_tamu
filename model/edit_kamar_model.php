
<?php

include "../database/connection.php";

$my_connection=new connection();
$my_connection->connectdb('wisma','wisma');

$stmt="UPDATE KAMAR SET KELAS='".$_POST["kelas"]."', HARGA=".$_POST['harga'].", KAPASITAS=".$_POST['kapasitas']." WHERE NO='".$_POST['no_kamar']."'";
$test=$my_connection->select($stmt);

header("Location: ../tambah_kamar.php");
?>

