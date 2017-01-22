<?php

  session_start();

  $b1 = $_POST['tresc'];
  $b2 = $_POST['a'];
  $b3 = $_POST['b'];
  $b4 = $_POST['c'];
  $b5 = $_POST['d'];
  $b6 = $_POST['answer'];
  $b7 = $_POST['kategoria'];

  require_once ("connect.php");

  if ($connect->connect_error)
  {
    echo "Connect Error: ".$connect->connect_errno;
  }
  else
  {
    $_SESSION['all_ok'] = true;

    if(empty($_POST['tresc']))
    {
      $_SESSION['all_ok'] = false;
      $_SESSION['tresc'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś treści pytania!</div>';
    }
    if(empty($_POST['a'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['a'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś odpowiedzi OdpA!</div>';
    }
    if(empty($_POST['b'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['b'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś odpowiedzi OdpB!</div>';
    }
    if(empty($_POST['c'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['c'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś odpowiedzi OdpC!</div>';
    }
    if(empty($_POST['d'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['d'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś odpowiedzi OdpD!</div>';
    }
    if(empty($_POST['answer'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['answer'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś poprawnej odpowiedzi</div>';
    }

    if(empty($_POST['kategoria'])) {
      $_SESSION['all_ok'] = false;
      $_SESSION['kategoria'] = '<div class="alert alert-danger"><strong>Danger! </strong>Nie podałeś kategori pytania!</div>';
    }

    if($_SESSION['all_ok'])
    {
      @$connect->query("INSERT INTO $db_quest (tresc,odpa,odpb,odpc,odpd,answer,kategoria) VALUES ('$b1','$b2','$b3','$b4','$b5','$b6','$b7')");
      header("Location: panel.php");
    }

    header("Location: panel.php");
  }
?>
