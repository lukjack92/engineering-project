<?php
  if(!isset($_SESSION))
  {
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut icon" href="icon/icon.ico"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Quiz</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href='css/stylesheet.css' rel='stylesheet'/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type='text/javascript' src="js/jsquiz.js"></script>
    <script type="text/javascript"  src='https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML'></script>
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
          <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Galeria</a></li>
          <li><a href="about.php"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
          <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <?php
            if(isset($_SESSION['online']) && $_SESSION['online'] == true)
            {
              echo '<li><a href="panel.php"><span class="glyphicon glyphicon-wrench"></span> Panel Quiz</a></li>';
              echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>';
            }else{
              echo '<li><a href="admin.php?id=0"><span class="glyphicon glyphicon-edit"></span> Zaloguj</a></li>';
            }
          ?>
        </ul>
        </ul>
      <div>
    </nav>
    <div class="container">
      <div id='container'>
        <div class="progress" id="progressbar">
          <div class="progress-bar" id="progress" role="progressbar" aria-valuemax="20" style="width: 20%;"></div>
          </div>
        <div id='title'><h1> <span class="glyphicon glyphicon-education"></span> Quiz z fizyki dla szkół średnich - pytania testowe</h1></div>
        </br>
        <?php
          require_once ("connect.php");

          if ($connect->connect_error)
          {
            ?> <div class="alert alert-danger" role="alert"><?php echo "Brak bazy danych. Błąd: ".$connect->connect_errno;?></div> <?php
          }
          else
          {
              if($result = @$connect->query("SELECT distinct kategoria FROM $db_quest ORDER BY `kategoria`"))
              {
                $how = $result->num_rows;

                ?>
                <div class="form-group" id="select">
                  <center>Wybierz kategorie pytań:</center>
                    <select class="form-control" id="selVal">
                      <?php
                        for ($i = 1; $i <= $how; $i++)
                        {
                          $row = $result->fetch_assoc();
                          $kat = $row['kategoria'];
                          echo "<option>$kat</option>";
                        }
                      ?>
                    </select>
                  </div>
              <?php
              }else
              {
                echo '<div class="alert alert-danger"><center><strong>Brak tabeli questions!!!</strong></center></div>';
              }
          }
        ?>
          <div class='btn btn-default pull-right' id='next'><span class="glyphicon glyphicon-arrow-right"></span></div>
          <div class='btn btn-default pull-right' id='prev'><span class="glyphicon glyphicon-arrow-left"></span></div>
          <div class='btn btn-lg btn-primary btn-block' id='start'><span class="glyphicon glyphicon-play-circle"></span>Start Quiz</div>

    </div>
    <div id="rodzic" class="zom">
      <h1><span class="glyphicon glyphicon-education"></span>SPRAWDŹ SWOJĄ WIEDZĘ</h1>
    </div>
      <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container footer">Copyright &copy; 2017 Designed by Łukasz Jackowski</div>
      </nav>
  </body>
</html>
