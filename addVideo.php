<?php

  session_start();

  if(!isset($_SESSION['online']) && $_SESSION['online'] == false)
  {
    header("Location: video.php");
  }

  $c1 = $_POST['title'];
  $c2 = $_POST['url'];
  $c3 = $_POST['contents'];

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
    $_SESSION['all_ok'] = true;

    if(empty($_POST['title']))
    {
      $_SESSION['all_ok'] = false;
      $_SESSION['error_title'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś tytułu video!</div>';
    }
    if(empty($_POST['url'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['error_url'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś URL do video?</div>';
    }
    if(empty($_POST['contents'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['error_contents'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś "Czytaj wiecej..."</div>';
    }

    if($_SESSION['all_ok'])
    {
      @$connect->query("INSERT INTO $db_video (tresc,url,czytaj) VALUES ('$c1','$c2','$c3')");
      header("Location: video.php");
    }

    header("Location: video.php");
  }
?>
