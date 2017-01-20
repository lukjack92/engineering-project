<?php

  session_start();

  if(empty($_POST['user']) && empty($_POST['password']))
  {
    $_SESSION['empty'] = '<div class="alert alert-danger">
    <strong><span class="glyphicon glyphicon-exclamation-sign"></span></strong> Nie podałeś użytkownika i hasła!!! </div>';
    header('Location: addUser.php');
    exit();
  }

  if (empty($_POST['user']))
  {
    $_SESSION['empty'] = '<div class="alert alert-danger">
    <strong><span class="glyphicon glyphicon-exclamation-sign"></span></strong> Nie podałeś użytkownika!!!</div>';
    header('Location: addUser.php');
    exit();
  }

  if (empty($_POST['password']))
  {
    $_SESSION['empty'] = '<div class="alert alert-danger">
    <strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></strong> Nie podałeś hasła !!!</div>';
    header('Location: addUser.php');
    exit();
  }

  //echo $_POST['user']." ";
  //echo $_POST['password'] . "\n";

  require_once('connect.php');

  $connect = @new mysqli($host,$db_user,$db_password,$db_name);

  if($connect->connect_error)
  {
    echo "Connect Error: ".$connect->connect_error;
  }
  else
  {
    $user = htmlentities($_POST['user'],ENT_QUOTES,"UTF-8");
    $password = htmlentities($_POST['password'],ENT_QUOTES,"UTF-8");

    //hashowanie hasla uzytkownika
    $password = password_hash($password, PASSWORD_DEFAULT);

    if($result = @$connect->query(sprintf("select * from $db_admin where login='%s'",mysqli_real_escape_string($connect,$user))))
    {
      $how = $result->num_rows;

      if($how>0)
      {
        $_SESSION['empty'] = '<div class="alert alert-danger">
        <strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></strong> Istnieje już taki użytkownik, nie możesz go dodać !!!</div>';
        header('Location: addUser.php');
        //exit();
      }else {
        @$connect->query("INSERT INTO $db_admin (login,password) VALUES ('$user','$password')");
        header("Location: addUser.php");
      }
    }
    $connect->close();
  }
?>
<a href="addUser.php">Back<a/>
