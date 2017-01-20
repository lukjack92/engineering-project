<?php
  session_start();
?>
<!DOCTYPE>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Contact me</title>
  <link rel="Shortcut icon" href="icon/icon.ico"/>
  <!-- Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">
</head>
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
      <li><a href="about.html"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
      <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
    </ul>
  <div>
</nav>
 <div class="container">

   <?php
     if(isset($_SESSION['result']))
     {
       echo $_SESSION['result'];
       unset($_SESSION['result']);
     }
   ?>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form name="sendMessage" id="contactForm" class="well" method="post" action="mail/contact_me.php">
          <legend><span class="glyphicon glyphicon-envelope"></span> Kontakt</legend>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
              <?php
                if(isset($_SESSION['errName']))
                {
                  echo $_SESSION['errName'];
                  unset($_SESSION['errName']);
                }
              ?>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
              <?php
                if(isset($_SESSION['errEmail']))
                {
                  echo $_SESSION['errEmail'];
                  unset($_SESSION['errEmail']);
                }
              ?>
            </div>
            <div class="form-group">
              <textarea rows="10" class="form-control" placeholder="Message" id="message" name="message"></textarea>
              <?php
                if(isset($_SESSION['errMessage']))
                {
                  echo $_SESSION['errMessage'];
                  unset($_SESSION['errMessage']);
                }
              ?>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group">
        			      <input type="submit" value="Wyślij" class="form-control btn btn-primary">
              </div>
            </div>
              <div>
            </div>
          </form>
        </div>
      </div>
    </div>
 <!--  <div class="panel-footer footer">&copy; Copyright 2015.Designed by Łukasz Jackowski</div> -->
   <nav class="navbar navbar-default navbar-fixed-bottom">
     <div class="container footer">
       Copyright &copy; 2017 Designed by Łukasz Jackowski
     </div>
   </nav>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script src="js/bootstrap.min.js"></script>
<body>
</body>
</html>
