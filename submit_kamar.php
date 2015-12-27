<?php

include './database/connection.php';

$my_connection=new connection();
$my_connection->connectdb('wisma','wisma');

$str="INSERT INTO KAMAR VALUES('".$_POST['no_kamar']."','".$_POST['kelas']."',".$_POST['harga'].",".$_POST['kapasitas'].",'".$_POST['wisma']."')";
echo $str;
$my_connection->execute($str);

header("Location: tambah_kamar.php");

?>

