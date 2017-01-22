<?php
  session_start();

  $id = $_GET['id'];
?>
<!DOCTYPE>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>About me</title>
  <link rel="Shortcut icon" href="icon/icon.ico"/>
  <!-- Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">
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
            echo '<li><a href="logout.php?id=4"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>';
          }else{
            echo '<li><a href="admin.php?id=4"><span class="glyphicon glyphicon-edit"></span> Zaloguj</a></li>';
          }
        ?>
      </ul>
  </nav>
  <div class="container">
    <h2>Kilka słów o mnie i o pracy dyplomowej... <span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span></h2>
    <div class="col-md-10 pull-left">
      <p>Nazywam się Łukasz Jackowski, jestem studentem IV roku Informatyki Stosowanej na <a href="http://www.fizyka.umk.pl">Wydziale Fizyki Astronomii i Informatyki Stosowanej</a> w Toruniu.
        Serwies edukacyjny. który został stworzony przeze mnie autora pracy jako praca dyplomowa, było to dla mnie zachętą do tego, aby jako przyszły informatyk zagłębić się w tworzenie serwisu internetowego od samych podstaw.
        Poprzez wybranie narzędzi, oprogramowania i zaprojektowania strony od strony wizualnej. Oprogramowanie i frameworki, które musiałem zgłębić i poznać je bliżej do tego, abym mógł nauczyć się biegle korzystać
        z tego typu oprogramowania i wykorzystać je do stworzenia jakiegokolwiek serwisu internetowego.
        <p>Wykorzystane technologie do budowy tego serwisu edukacyjnego: </p>
        <ul type="circle">
          <li>Bootstrap - framework CSS</li>
          <li>MySQL</li>
          <li>PHP</li>
          <li>phpMyAdmin - narzędzie zarządzania bazą danych MySQL</li>
          <li>JavaScript</li>
        </ul>
      </p>
    </div>
    <div class="col-md-2 pull-right">
        <img src="image/myphoto3.png" class="img-circle img-thumbnail zoom_gal">
        <img src="image/podpis.jpg" class="img-circle zoom_gal">
    </div>
  </div>
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container footer">
      Copyright &copy; 2017 Designed by Łukasz Jackowski
    </div>
  </nav>
</body>
</html>
