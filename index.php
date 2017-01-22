<?php
  session_start();

  $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut icon" href="icon/icon.ico"/>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

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
          <li><a href="gallery.php"><span class="glyphicon glyphicon-picture"></span> Galeria</a>
          <li><a href="about.php"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
          <li><a href="contact.php" ><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <?php
            if(isset($_SESSION['online']) && $_SESSION['online'] == true)
            {
              echo '<li><a href="logout.php?id=5"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>';
            }else{
              echo '<li><a href="admin.php?id=5"><span class="glyphicon glyphicon-edit"></span> Zaloguj</a></li>';
            }
          ?>
        </ul>
      <div>
    </nav>

    <div class="container">
      <div class="jumbotron image">
        <center>
          <h1 class="font zom"><strong>Przewodnik multimedialny</strong></h1>
          <h1 class="font zom"><strong>po fizyce współczesnej</strong></h1>
        </center>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div>
            <p><h4><strong>Autor pracy dyplomowej:</strong></h4> <strong>Łukasz Jackowski</strong>
              <br> Student Informatyki Stosowanej WFAiIS na UMK w Toruniu</p>
              <p><h4><strong>Promotor pracy dyplomowej:</strong></h4>prof. dr hab. inż. Grzegorz Karwasz</p>
            </div>
          </div>
        </div>
      <div class="panel panel-info">
        <div class="panel-heading zom"><h4>Informacje o stronie</h4></div>
        <div class="panel-body">
          <p>Witryna ta powstała jako praca dyplomowa. W całości poświęcona jest opisowi zjawisk fizycznych zawierająca multimedialne
            środki dydaktyczne w postaci quizu i video.</p>
          <p>Multimedia mogą być środkami dydaktycznymi, które pomogą zainteresować uczniów przedmiotem, wytłumaczyć skomplikowane
            zagadnienia oraz pozwolić osiągać lepsze wyniki w nauczaniu. Właśnie dla wymienionych powyżej powodów stworzyłem serwis internetowy,
            do którego będą mieli dostęp uczniowie i nauczyciele, a informacje zawarte w niej posłużą jako dodatkowy materiał pozwalający
            wzbogacić i poprawnie zrozumieć materiał dydaktyczny z zakresu fizyki.<!--Dzięki formie w jakiej będzie zgromadzony materiał,
            wiedza dla każdego, nawet laika będzie wizualnie przystępna, łatwo przyswajalna i zrozumiała.--></p>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading zom"><h4>Czym są multimedia?</h4></div>
        <div class="panel-body">
          <p>Multimedia to inaczej media, które są połączeniem kilku form przekazu informacji
            (np. tekstu <span class="glyphicon glyphicon-text-background"></span>, dźwięku <span class="glyphicon glyphicon-stats"></span>,
            obraz <span class="glyphicon glyphicon-picture"></span>, animacja <span class="glyphicon glyphicon-film"></span>) w celu dostarczania odbiorcom informacji lub rozrywki (...)<sup>1</sup>.
            <hr>
            <sup>1 </sup><a href="https://pl.wikipedia.org/wiki/Multimedia">Multimedia według Wikipedii.</a>
          </p>

        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading zom"><h4>Multimedia w dydaktyce</h4></div>
        <div class="panel-body">
          <p>Technologie informacyjne szeroko wchodzące do systemu szkolnictwa powinny przyczyniać się do jakościowego podniesienia poziomu kształcenia. (...).
          <p>Obraz, film, animacja, atrakcyjny układ graficzny treści przenikają do świadomości niezależ­nie
            i komplementarnie w stosunku do tradycyjnego przekazu słownego i drukowanego (...)<sup>1</sup>.</p>
          </p>
          <p>W praktyce dodatki multimedialne stały się częścią niektórych podręczników szkolnych (...)<sup>1</sup>.</p>
          <p>Narastająca ilość wiedzy wymaga szczegółowego wyboru najważ­niejszych informacji oraz jej strukturyzacji. Strukturyzowanie materiału
            kształcenia umożliwia wyeksponowanie elementów podstawowych, o trwałej wartości naukowej i edukacyjnej przy zachowaniu
            systematycznego układu treści. Układ treści w formie multimedialnej, osiągalnej wzdłuż zaprogramowanych przez wykładowcę ścieżek,
            słu­ży właśnie takiej strukturyzacji. Środki multimedialne nie zastępują tradycyjnej lekcji, ale ich umiejętne użycie pozwala na
            wzbogacenie i pogłębienie procesu dydaktycznego. (...) <sup>1</sup>.</p>
            <p>Multimedialne ścieżki informacji i dobrze skonstruaowane zasoby internetowe są takiego rodzaju "boczną furtką" dla zachęcenia nauki i do otwarcia nowego kanału przekazu informacji.</p>
            <p>Atrakcyjność, dostępność oraz wyższa efektywność dydaktyczna decydują o przewadze lekcji multimedialnej nad przekazem tradycyjnym. (...) </p>
          <center><a href="http://dydaktyka.fizyka.umk.pl/Pliki/Czy_media_w_dydaktyce_sa_potrzebne.pdf">Czy media w dydaktyce są potrzebne?</a></center>
          <hr>
          <sup>1</sup> Fragmenty z: <a href="http://dydaktyka.fizyka.umk.pl/Pliki/W_kierunku_powszechnosci.pdf">W kierunku powszechności
dydaktycznej multimediów.</a>
        </div>
      </div>
      <div class="panel panel-info">
        <div class="panel-heading zom"><h4>Linki</h4></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-2">
                <div class="thumbnail noborder">
                  <label>UMK</label>
                  <a href="http://www.umk.pl"><img src="image/umk_logo.png" class="img-circle img-thumbnail img-responsive zoom"></a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail noborder">
                  <label>WFAiIS</label>
                  <a href="http://www.fizyka.umk.pl/wfaiis/"><img src="image/wfaiis_logo.png" class="img-circle img-thumbnail img-responsive zoom"></a>
                </div>
              </div>
              <div class="col-md-2">
                <div class="thumbnail noborder">
                  <label>Zakład Dydaktyki Fizyki UMK</label>
                  <a href="http://dydaktyka.fizyka.umk.pl/nowa_strona/"><img src="image/zdf_logo.png" class="img-circle img-thumbnail img-responsive zoom"></a>
                </div>
              </div>
           </div>
         </div>
        </div>
  <!-- <div> <a href="http://google.pl" class="btn btn-primary pull-left btn-sm">Odwiedź Google</a> -->
    <!-- center-block fill all div-->
  </div>
  <!--  <div class="panel-footer footer">&copy; Copyright 2015.Designed by Łukasz Jackowski</div> -->
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div class="container footer">
        Copyright &copy; 2016 Designed by Łukasz Jackowski
      </div>
    </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!--  <script src="js/bootstrap.min.js"></script>-->
  </body>
</html>
