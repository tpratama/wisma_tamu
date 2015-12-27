<?php

include "../database/connection.php";

$conn= new connection();
$conn->connectdb('wisma','wisma');

$str="INSERT INTO FASILITAS VALUES('".$_POST["id_fasilitas"]."','".$_POST["nama_fasilitas"]."')";
echo $str;
$conn->execute($str);

header("location: ../tambah_fasilitas.php");

?>