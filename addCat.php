<?php

session_start();

if((isset($_SESSION['online']) && $_SESSION['online'] == true))
{

echo $kat = $_POST['addCat'];
echo $desc = $_POST['description'];

require_once("connect.php");

$connect =@new mysqli($host,$db_user,$db_password,$db_name);

mysqli_query($connect, "SET CHARSET utf8");
mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

if($connect->connect_errno)
{
  echo "Connect Error: ".$connect->connect_errno;
}else {

  $_SESSION['all_ok'] = true;

  if($result = @$connect->query("SELECT category FROM $db_cat WHERE category='$kat'"))
  {

  $how = $result->num_rows;

  if($how>0)
    {
      $_SESSION['error'] = '<div class="alert alert-danger"><strong>Danger! </strong>Ta kategoria już istnieje!</div>';
      $connect->close();
      header('Location: gallery.php');
      $_SESSION['all_ok'] = false;
    }
  }

  if(empty($_POST['addCat']))
  {
    $_SESSION['all_ok'] = false;
    $_SESSION['error0'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podano kategorii!</div>';
    $connect->close();
  }

  if(empty($_POST['description']))
  {
    $_SESSION['all_ok'] = false;
    $_SESSION['error1'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podano opisu kategorii!</div>';
    $connect->close();

  }

  if($_SESSION['all_ok'])
  {
    $desc = htmlentities($desc,ENT_QUOTES,"UTF-8");
    @$connect->query("INSERT INTO $db_cat (category,description) VALUES ('$kat','$desc')");
    $_SESSION['error'] = '<div class="alert alert-success"><strong>Sukces! </strong>Dodano pomyślnie!!!</div>';
    header("Location: gallery.php");
    $connect->close();
  }

  header("Location: gallery.php");
}
}
else{
  header("Location: admin.php?id=2");
}
?>
