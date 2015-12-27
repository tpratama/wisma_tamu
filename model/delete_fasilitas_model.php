<?php

include "../database/connection.php";

$conn= new connection();
$conn->connectdb('wisma','wisma');
$conn->execute("DELETE FROM FASILITAS WHERE ID_FASILITAS='".$_GET['id_fasilitas']."'");

//echo "DELETE FROM KAMAR WHERE NO=".$_GET['id_kamar'];
header("Location: ../tambah_fasilitas.php");

?>