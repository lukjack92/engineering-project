<?php

  if(!isset($_SESSION))
  {
      session_start();
  }

  if(!isset($_SESSION['online']))
  {
    header('Location: admin.php');
    exit();
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
  <title>Admin Panel</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">
  <script type='text/javascript' src="js/window.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        <li><a href="about.html"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li><a href="addUser.php"><span class="glyphicon glyphicon-ok"></span>dodaj<span class="glyphicon glyphicon-remove"></span>usuń użytkownika</a></li>
        <li><a href="legend.php"><span class="glyphicon glyphicon glyphicon-book"></span> Legenda</a></li>
        <li><a href="logout.php?id=<?php echo 0?>"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>
      </ul>
    <div>
  </nav>
<div class="container">
    <h2 class="login">
      <?php
        echo "Witaj ".$_SESSION['login']."!";
      ?>
      <div><span class="glyphicon glyphicon-wrench"></span> Panel Quiz</div>
    </h2>
    <div class="panel panel-default"><div class="panel-heading"><h4>PYTANIA DO QUIZU</h4></div></div>
<div class="table-responsive">
      <table class="table"><thead>
        <tr align="center" class="color"><td>#</td><td>Treść pytania</td><td>Odp A</td><td>Odp B</td><td>Odp C</td><td>Odp D</td><td>Prawidłowa odpowiedź</td><td>Kategoria</td><td>Opcja</td>
        </tr>
        <tr>
    <?php
      require_once ("connect.php");

      $connect = @new mysqli($host,$db_user,$db_password,$db_name);

      mysqli_query($connect, "SET CHARSET utf8");
      mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

      if($connect->connect_error)
      {
        echo "Connect Error: ".$connect->connect_errno;
      }
      else
      {
          if($result = @$connect->query("SELECT * FROM $db_quest"))
          {
            $how = $result->num_rows;

            for ($i = 1; $i <= $how; $i++)
            {
              $row = $result->fetch_assoc();

              $a1 = $row['tresc'];
              $a2 = $row['odpa'];
              $a3 = $row['odpb'];
              $a4 = $row['odpc'];
              $a5 = $row['odpd'];
              $a6 = $row['answer'];
              $a7 = $row['kategoria'];

?></tr></thead><tbody>
<td align="center"><?php echo $i ?></td>
<td align="center"><?php echo $a1 ?></td>
<td align="center"><?php echo $a2 ?></td>
<td align="center"><?php echo $a3 ?></td>
<td align="center"><?php echo $a4 ?></td>
<td align="center"><?php echo $a5 ?></td>
<td align="center"><?php echo $a6 ?></td>
<td align="center"><?php echo $a7 ?></td>
<td align="center"><a class='btn btn-primary' href="delete.php?id=<?php echo $row['id'];?>">Usuń</a></td>
<tr></tr>
      <?php
            }
        }
        if(isset($how))
        {
          if($how == 0)
          {
            echo '<div class="alert alert-danger">
              <strong>Danger!</strong> Baza pytań jest pusta, uzupełnij ją poprzez formularz dadawania pytań do bazy i przejdz do zakładki Quiz. </div>';
          }
        }
      }
    ?>
  </tr></tbody></table>
</div>
  <div>
    <center>Zanim wprowadzisz wzór matematyczy do bazy Quizu, przeczytaj jak je wprowadzać do formularza. Czytaj: <span class="glyphicon glyphicon glyphicon-book"></span> Legenda</center>
  </div>
    <div class="row">
        <div class="col-md-12">
        <form action="add.php" method="POST" class="well">
          <h2 style="font-size: 45px">Dodaj pytanie do Quiz<span class="glyphicon glyphicon-hand-down"></span></h2><hr>
          <div class="form-group">
            <textarea class="form-control" rows="2" name="tresc" placeholder="Treść pytania"></textarea>
            <?php
              if(isset($_SESSION['tresc']))
              {
                echo $_SESSION['tresc'];
                unset($_SESSION['tresc']);
              }
            ?>
          </div>
          <div class="form-group">
            <input type="text" name="a" class="form-control" placeholder="OdpA">
            <?php
              if(isset($_SESSION['a']))
              {
                echo $_SESSION['a'];
                unset($_SESSION['a']);
              }
            ?>
          </div>
          <div class="form-group">
            <input type="text" name="b" class="form-control" placeholder="OdpB">
            <?php
              if(isset($_SESSION['b']))
              {
                echo $_SESSION['b'];
                unset($_SESSION['b']);
              }
            ?>
          </div>
          <div class="form-group">
            <input type="text" name="c" class="form-control" placeholder="OdpC">
            <?php
              if(isset($_SESSION['c']))
              {
                echo $_SESSION['c'];
                unset($_SESSION['c']);
              }
            ?>
          </div>
          <div class="form-group">
            <input type="text" name="d" class="form-control" placeholder="OdpD">
            <?php
              if(isset($_SESSION['d']))
              {
                echo $_SESSION['d'];
                unset($_SESSION['d']);
              }
            ?>
          </div>
          <div class="form-group">
          <select class="form-control" name="answer">
            <option>a</option>
            <option>b</option>
            <option>c</option>
            <option>d</option>
          </select>
          Wybierz która odpowiedz jest prawidłowa a, b, c lub d.
    </div>
          <div class="form-group">
            <input type="text" name="kategoria" class="form-control" placeholder="Wpisz kategorie pytania (np. termodynamika)">
            <?php
              if(isset($_SESSION['kategoria']))
              {
                echo $_SESSION['kategoria'];
                unset($_SESSION['kategoria']);
              }
            ?>
          </div>
          <div class="row">
            <div class="col-sm-12 form-group">
                  <input type="submit" value="Dodaj" class="form-control btn btn-primary">
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container footer">
      Copyright &copy; 2017 Designed by Łukasz Jackowski
    </div>
  </nav>
</body>
</html>
