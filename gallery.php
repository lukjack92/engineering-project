<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Gallery</title>

  <link rel="Shortcut icon" href="icon/icon.ico"><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--LIGHTBOX-->
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
          <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Galeria</a></li>
          <li><a href="about.html"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
          <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <?php
            if(isset($_SESSION['online']) && $_SESSION['online'] == true)
            {
              echo '<li><a href="logout.php?id=2"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>';
            }else{
              echo '<li><a href="admin.php?id=2"><span class="glyphicon glyphicon-edit"></span> Zaloguj</a></li>';
            }
          ?>
        </ul>
      </div>
    </nav>
    <div class="container">
    <?php

      require_once ("connect.php");

      if(isset($_SESSION["online"]) && $_SESSION["online"] == true)
      {
        echo "<center><h2>Witaj ".$_SESSION['login']."!";
        echo '<div><span class="glyphicon glyphicon-picture"></span> Panel Galerii</div></h2></center>';
      }else {
        echo '<center><h2><span class="glyphicon glyphicon-picture"></span> Galeria</h2></center>';
      }

      if(isset($_SESSION['error']))
      {
          echo $_SESSION['error'];
          unset($_SESSION['error']);
        }

        if(isset($_SESSION['error0']))
        {
          echo $_SESSION['error0'];
          unset($_SESSION['error0']);
        }
        if(isset($_SESSION['error1']))
        {
          echo $_SESSION['error1'];
          unset($_SESSION['error1']);
        }
//echo `whoami`;

          $dir = "/var/www/html/praca/video";
          if(file_exists($dir))
          {
              //echo ISTNIEJE_TAK." ";
              if (glob($dir . "/*"))
              {
                //echo "Pliki sa w folderze";
              }else
              {
                  echo '<div class="alert alert-danger well"><center><strong>Danger!</strong> Nie ma plików z galeri!!!</center></div>';
                  //header('Location: gallery.php');
              }
            }else
            {
                //echo NIE_ISTNIEJE_ALE_STWORZONY." ";
                mkdir("/var/www/html/praca/video/",0777);
              }
              
/*wyswietlanie calej galeri; baza danych polaczenie i zdjecia + kat (tabela kategori i zdjec)*/
if ($connect->connect_error)
{
  ?> <div class="alert alert-danger" role="alert"><?php echo "Brak bazy danych. Błąd: ".$connect->connect_errno;?></div> <?php
}
else
{


    $tab_1_cat = array();
    $tab_1_desc = array();
    $tab_2_cat = array();
    $tab_2_pic = array();

    if($result = @$connect->query("SELECT * FROM	$db_cat"))
    {
      $how = $result->num_rows;

      $result_pic = @$connect->query("SELECT * FROM	$db_pic");
      $how_pic = $result_pic->num_rows;

      if($how == 0)
      {
          echo '<div class="alert alert-danger"><center><strong>Baza danych jest pusta!!!</strong></center></div>';
      }
      if($how > 0)
      {
        for($q = 1; $q <= $how; $q++)
        {
          $row = $result->fetch_assoc();
          array_push($tab_1_cat,$row['category']);
          array_push($tab_1_desc,$row['description']);
        }

        for($qq = 1; $qq <= $how_pic; $qq++)
        {
          $row_pic = $result_pic->fetch_assoc();
          array_push($tab_2_cat,$row_pic['category']);
          array_push($tab_2_pic,$row_pic['picture']);
        }

        for($l = 0; $l < $how; $l++)
        {
          $cat = 0;
          for($ii = 0; $ii < $how_pic; $ii++)
          {
            if($tab_1_cat[$l] == $tab_2_cat[$ii])
            {
              $cat++;
              if($cat == 1)
              {
                ?><div class="alert alert-info text-align:left"><strong><h3><?php echo $tab_1_desc[$l] ?><h3></strong></div> <?php
              }
              echo $tab_1_cat[$l]." == ".$tab_2_cat[$ii]."<br>";
            }
          }
        }
      }
    }else
    {
      echo '<div class="alert alert-danger"><center><strong>Nie ma odpowiedniej tabeli dla bazy</strong></center></div>';
    }
}

/*dodawanie kategori zdjec usuwanie*/
$files = scandir('video');
$wynik = count($files);

echo '<div class="row">';
	for($i = 2; $i < $wynik ; $i++)
	{
    $pic = "video/"."$files[$i]";
    $ext = pathinfo($pic, PATHINFO_EXTENSION);
    ?>
      <div class="col-sm-3">
        <center><a href="<?php echo $pic ?>" ><img class="imag zoom_gal" src="<?php echo $pic ?>"></a>
    <?php
          if(isset($_SESSION['online']) && $_SESSION['online'] == true)
          {
    ?>
          <a href="delimag.php?imag=<?php echo '/var/www/html/praca/'.$pic ?>"><button style="margin-bottom: 10px" class="btn btn-primary">Usuń</button></a>

    <?php
          }
          echo '</center></div>';
    }
    echo '</div>';

    if(isset($_SESSION['online']) && $_SESSION['online'] == true)
        {
    ?>

<div class="well">
<h2 style="font-size: 45px">Galeria<span class="glyphicon glyphicon-hand-down"></span></h2>
<hr>
	<form action="addCat.php" method="post">
	   <div class="row">
  		  <div class="col-sm-3 form-group">
			       <label>1. Dodaj nazwę kategori:</label>
			     <input type="text" name="addCat" class="form-control">
        </div>
      </div>
    <div class="row">
      <div class="col-sm-12 form-group">
            <label>2. Opis kategorii:</label>
            <textarea class="form-control" rows="2" name="description"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 form-group">
			      <input type="submit" value="Dodaj" class="form-control btn btn-primary">
      </div>
    </div>
	</form>
<hr>
<?php
if ($connect->connect_error)
{
  ?> <div class="alert alert-danger" role="alert"><?php echo "Brak bazy danych. Błąd: ".$connect->connect_errno;?></div> <?php
}
else
{
    if($result = @$connect->query("SELECT category FROM	$db_cat"))
    {
      $how = $result->num_rows;
    }else
    {
      echo '<div class="alert alert-danger"><center><strong>Brak tabeli category</strong></center></div>';
    }
}
  if($how == 0)
  { }
  else {
?>
<form action="checkCat.php" method="post">
	<div class="row">
		<div class="col-sm-3 form-group">
			<label>1. Sprawdź kategorię do usunięcia:</label>
		  <select name="del" class="form-control">
        <?php
            for ($i = 1; $i <= $how; $i++)
            {
              $row = $result->fetch_assoc();
              $kat = $row['category'];
              echo "<option>$kat</option>";
            }
         ?>
      </select>
      <input type="submit" value="Sprawdź" class="btnn form-control btn btn-primary">
      		</div>

          <div class="col-sm-9 form-group">

      <?php
      if(isset($_SESSION['desc']))
      {
          echo $_SESSION['desc'];
          unset($_SESSION['desc']);
      }
      ?>
    </div>
  </div>
</form>

<h2 style="font-size: 45px">Dodaj zdjęcie do wybranej kategorii <span class="glyphicon glyphicon-hand-down"></span></h2>
<hr>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Wybierz takegorie:</label>
      <select name="sel" class="form-control" id="sel">
        <?php
          $result = @$connect->query("SELECT category FROM	$db_cat");
          for ($i = 1; $i <= $how; $i++)
          {
            $row = $result->fetch_assoc();
            $kat = $row['category'];
            echo "<option>$kat</option>";
          }
        ?>
      </select>
  </div>
  <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-primary">
  <input type="submit" value="Dodaj zdjęcie" name="submit" class="btn btn-primary" style="margin-bottom: 10px;">
</form>
<?php
    echo '<hr>';
  }
?>
    </div>
      <?php
  }
        ?>
</div>
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div class="container footer">
        Copyright &copy; 2017 Designed by Łukasz Jackowski
      </div>
    </nav>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
