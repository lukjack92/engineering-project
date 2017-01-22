<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Video</title>
  <link rel="Shortcut icon" href="icon/icon.ico"><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script><!-- Bootstrap -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">
  <script src="js/window.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-toggle">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> Strona główna</a>
      </div>
      <div class="collapse navbar-collapse" id="nav-toggle">
        <ul class="nav navbar-nav">
          <li><a href="quiz.php"><span class="glyphicon glyphicon-education"></span> Quiz</a></li>
          <li><a href="video.php"><span class="glyphicon glyphicon-facetime-video"></span> Video</a></li>
          <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Galeria</a>
          <li><a href="about.php"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
          <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <?php
            if(isset($_SESSION['online']) && $_SESSION['online'] == true)
            {
              echo '<li><a href="logout.php?id=1"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>';
            }else{
              echo '<li><a href="admin.php?id=1"><span class="glyphicon glyphicon-edit"></span> Zaloguj</a></li>';
            }
          ?>
        </ul>
      <div>
    </nav>
    <div class="container">
      <?php
        if(isset($_SESSION["online"]) && $_SESSION["online"] == true)
        {
          echo "<center><h2>Witaj ".$_SESSION['login']."!";
          echo '<div><span class="glyphicon glyphicon-facetime-video"></span> Panel Video</div></h2></center>';
          //echo "<div class='alert alert-info'>";
          //echo '<strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></strong> Można tu dodać wideo i usunąć je!';
          //echo "</div>";
        }
        ?>
        <div class="row">
            <legend><center><span class="glyphicon glyphicon-facetime-video"></span> Ciekawe doświadczenia w postacie video ...</center></legend>
          <?php

            require_once("connect.php");

            if($connect->connect_error)
            {
              ?> <div class="alert alert-danger" role="alert"><?php echo "Brak bazy danych. Błąd: ".$connect->connect_errno;?></div> <?php
            }else {
              if($result = @$connect->query("SELECT * FROM $db_video"))
              {
                $how = $result->num_rows;

                if($how == 0)
                {
                  echo '<div class="alert alert-danger"><center><strong>Baza video jest pusta!!!</strong></center></div>';
                }else {
                  for($i = 1; $i <= $how; $i++)
                  {
                    $row = $result->fetch_assoc();
                    $URL = $row['url'];
                    $URL = str_replace("watch?v=","embed/",$URL);
                    ?>
                    <div class="col-md-6 video">
                      <legend><?php echo $row['tresc'] ?></legend>
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src='<?php echo $URL ?>'></iframe>
                      </div>
                            <a href="#" onclick="OpenWindow('<?php echo $row['czytaj'] ?>')"><button class="btnn btn btn-primary">Czytaj...</button></a>
                            <?php
                            if(isset($_SESSION["online"]) && $_SESSION["online"] == true)
                            {
                            ?>
                                <a id="delete" class='btn btn-primary pull-right' href="deleteVideo.php?_id=<?php echo $row['id'];?>"><!--<span class="glyphicon glyphicon-remove "></span>--> Usuń</a>
                            <?php
                            }
                            ?>
                    </div>
              <?php
                  }
                }
              }else {
                echo '<div class="alert alert-danger"><center><strong>Brak tabeli video!!!</strong></center></div>';
              }
            }

            if(isset($_SESSION['online']) && $_SESSION['online'] == true)
            {
              echo '<div class="col-md-12">';
              echo '<form action="addVideo.php" method="POST" class="well">';
              echo '<h2 style="font-size: 45px">Dodaj wideo<span class="glyphicon glyphicon-hand-down"></span></h2><hr>';

              echo '<div class="form-group">';
              echo '<input type="text" name="title" class="form-control" placeholder="Tytuł wideo">';
                if(isset($_SESSION['error_title']))
                {
                  echo $_SESSION['error_title'];
                  unset($_SESSION['error_title']);
                }
              echo '</div>';
              echo '<div class="form-group">';
              echo '<input type="text" name="url" class="form-control" placeholder="URL">';
                if(isset($_SESSION['error_url']))
                {
                  echo $_SESSION['error_url'];
                  unset($_SESSION['error_url']);
                }
              echo '</div>';
              echo '<div class="form-group">';
              echo '<textarea class="form-control" rows="3" name="contents" placeholder="Czytaj więcej..." style="resize: vertical"></textarea>';
                if(isset($_SESSION['error_contents']))
                {
                  echo $_SESSION['error_contents'];
                  unset($_SESSION['error_contents']);
                }
              echo '</div>';
              echo '<div class="row"><div class="col-sm-12 form-group"><input type="submit" value="Dodaj" class="form-control btn btn-primary"></div></div>';
              echo '</form>';
              echo '</div>';
              $connect->close();
            }
          ?>
        </div>
<div/>
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div class="container footer">
        Copyright &copy; 2016 Designed by Łukasz Jackowski
      </div>
    </nav>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
