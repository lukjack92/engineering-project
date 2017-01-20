<?php

session_start();

if((isset($_SESSION['online']) && $_SESSION['online'] == true))
{

  $_id = $_GET['_id'];

  require_once ("connect.php");

  $connect = @new mysqli($host,$db_user,$db_password,$db_name);

  mysqli_query($connect, "SET CHARSET utf8");
  mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

  if ($connect->connect_error)
  {
    echo "Connect Error: ".$connect->connect_errno;
  }
  else
  {
    @$connect->query("DELETE FROM $db_video WHERE id=$_id");
  }
  header("Location: video.php");
} else {
  header("Location: admin.php?id=1");
}
?>
