<?php

session_start();

if((isset($_SESSION['online']) && $_SESSION['online'] == true))
{

  $delimage = $_GET['imag'];

  //usuń z bazy danych zdjecie;
  $path = pathinfo($delimage);
  echo $path = $path['basename'];

  require_once ("connect.php");
  @$connect->query("DELETE FROM $db_pic WHERE picture='$path'");

  unlink($delimage);
  header("Location: gallery.php");
}else{
  header("Location: admin.php?id=2");
}
?>
