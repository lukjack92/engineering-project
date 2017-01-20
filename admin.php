<?php

  session_start();

  if((isset($_SESSION['online']) && $_SESSION['online'] == true))
  {
    header("Location: panel.php");
    //exit();
  }
?>
<!DOCTYPE>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="Shortcut icon" href="icon/icon.ico"/>
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Login Panel</title>

  <!-- Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        <li><a href="about.html"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
      </ul>
    <div>
  </nav>
  <div class="container">
  <div class="alert alert-info">
    <strong><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></strong> Panel dla Administratora bazy pytań do Quizu, za pomocą którego administrator może dodawać pytania do bazy lub je usuwać!
  </div>

  <h3><center>Logowanie do panelu administratora <span class="glyphicon glyphicon-cog " aria-hidden="true"></span></center></h3>
  <div class="col-md-offset-4 col-md-4">
    <form action="LoginIn.php?id=<?php echo $_GET['id'] ?>" method="post">
       Login: <br /> <input class="form-control" type="text" name="login" placeholder="Login"/>
       Password: <br /><input class="form-control" type="password" name="password" placeholder="Password"/><br />
       <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj</button>
    </form>
  </div>
  <div class="col-md-12">
      <?php
        if(isset($_SESSION['error']))
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
          }
        ?>
    </div>
  </div>

  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container footer">
      Copyright &copy; 2016.Designed by Łukasz Jackowski
    </div>
  </nav>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
