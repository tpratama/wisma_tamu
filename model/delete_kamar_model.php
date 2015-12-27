<?php

include "../database/connection.php";

$conn= new connection();
$conn->connectdb('wisma','wisma');
$conn->execute("DELETE FROM KAMAR WHERE NO='".$_GET['id_kamar']."'");

//echo "DELETE FROM KAMAR WHERE NO=".$_GET['id_kamar'];
header("Location: ../tambah_kamar.php");

?>