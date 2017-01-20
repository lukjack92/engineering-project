<?php

  session_start();

  $id = $_GET['id'];

  if(empty($_POST['login']) || empty($_POST['password']))
  {
    header("Location: admin.php?id=<?php echo $id ?>");
    exit();
  }

  require_once ("connect.php");

  $connect = @new mysqli($host, $db_user, $db_password, $db_name);

  	if ($connect->connect_error)
  	{
  		?> <div><?php echo "Brak bazy danych. Błąd: ".$connect->connect_errno;?></div> <?php
  	}
  	else
    {
      $login = $_POST['login'];
      $password = $_POST['password'];

      //encje html adam ' -- spacje - konwertuje to na znaki i wykonuje się to w sql
      $login = htmlentities($login,ENT_QUOTES,"UTF-8");
      //$password = htmlentities($password,ENT_QUOTES,"UTF-8");

      if($result = @$connect->query(sprintf("select * from $db_admin where login='%s'",
      mysqli_real_escape_string($connect,$login))))
      {
          $how = $result->num_rows;
          $row = $result->fetch_assoc();

          $_SESSION['login'] = $row['login'];

          if($how>0)
          {
            if(password_verify($password,$row['password']))
            {
              $_SESSION['online'] = true;
              unset($_SESSION['error']);
              $result->free_result();
              //include('game.php');
              if($id == 0)
              {
                header("Location: panel.php?id=$id ");
              }
              if($id == 1)
              {
                header("Location: video.php?id=$id");
              }
              if($id == 2)
              {
                header("Location: gallery.php?id=$id");
              }
            } else
              {
                $_SESSION['error'] = '<div class="alert alert-danger">
                  <strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></strong> Incorrect password!!!</div>';
            header("Location: admin.php?id=<?php echo $id ?>");
              }
          } else
            {
              //echo "Błąd logowania na strone!!!";
              $_SESSION['error'] = '<div class="alert alert-danger">
                <strong><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></strong> Incorrect login!!!</div>';
            header("Location: admin.php?id=<?php echo $id ?>");
            }
      }

      $connect->close();
    }
?>
