<?php

  session_start();

  if(!(isset($_SESSION['online']) && $_SESSION['online'] == true))
  {
    header("Location: admin.php");
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
  <title>Legend</title>

  <!-- Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/mystyle.css" rel="stylesheet">
  <script type="text/javascript"  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

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
        <li><a href="about.html"><span class="glyphicon glyphicon-sunglasses"></span> O Autorze...</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> Kontakt</a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <?php
          if(isset($_SESSION['online']) && $_SESSION['online'] == true)
          {
            echo '<li><a href="logout.php?id=0"><span class="glyphicon glyphicon-log-out"></span> Wyloguj</a></li>';
          }else{
            echo '<li><a href="admin.php?id=0"><span class="glyphicon glyphicon-edit"></span> Zaloguj</a></li>';
          }
        ?>
      </ul>
    <div>
  </nav>
  <div class="container">
  <a class="btn btn-lg btn-primary btn-block" href="panel.php"><span class="glyphicon glyphicon-chevron-left"></span>Wstecz</a>
<div class="margines">
  <center>
    Aby wprowadzić wzór tego typu:
    $$x = {-b \pm \sqrt{b^2-4ac} \over 2a}$$
    w formularzu wprowadzamy w taki sposób: <br />
    <code>x = {-b \\pm \\sqrt{b^2-4ac} \\over 2a} </code><br />
    umieszczając to pomiędzy $$ \$\$ \{ here \} \$\$ $$
      </center>
    <ol>
      <li>Przykład: <code>\\sum_{i=0}^n i^2 = \\frac{(n^2+n)(2n+1)}{6}</code>: <br /> $${\sum_{i=0}^n i^2 = \frac{(n^2+n)(2n+1)}{6}}$$</li>
      <li>Litery greckie: <code>\\alpha, \\beta, \\gamma, \\delta, \\omega </code>: $${\alpha, \beta, \gamma, \delta, \omega }$$ </li>
      <li>Indeks górny i dolny: <code>^ </code>i <code>_</code>: <code>\x_i^2, \\log_2 x</code>: $${\\x_i^2, \log_2 x}$$</li>
      <li>Grupowane <code>{...}</code>: Używamy <code>10^{10}</code> jeżeli chcemy wyświetlić: $${10^{10}}$$ <code>10^10</code> wyświetli nam: $${10^10}$$</li>
      <li>Skalowanie nawiasów: <code>\left(</code> <code>\right)</code>: $${(\frac{\sqrt x}{y^3})}$$ użyliśmy zwykłych nawiasów <code>(\\frac{\\sqrt x}{y^3})</code>: $${\left(\frac{\sqrt x}{y^3}\right)}$$ Widać że nawiasy zostały przeskalowane, użyliśmy <code>\\left(\\frac{\\sqrt x}{y^3}\\right)</code> <br/> <br/> <code>\langle x\rangle</code>: $${\langle x\rangle}$$ <br> <code>\\{ </code> <code>\\}</code>: $${\{x\}}$$ <code>\\vert </code> <code>\\vert</code>: $${\vert x \vert}$$</li>
      <li>Suma, całka itp. <code>\\sum </code>and <code>\\int</code>: $${\sum_{i=0}^\infty i^2 }$$ użyliśmy: <code>\\sum_{i=0}^\\infty i^2 </code>: $${\int_0^\infty}$$ użyliśmy <code>\\int_0^\\infty</code>: $${\iint_0^\infty}$$ użyliśmy <code>\\iint_0^\\infty</code>.<br><br> </li>
      <li>Ułamek: <code>\\frac{...}{...}</code> lub <code>{...\over...}</code> $${\frac{a+1}{b+1}}$$ użyliśmy <code>\\frac{a+1}{b+1}</code> $${{a+1}\over{b+1}}$$ użyliśmy <code>{a+1}\\over{b+1}</code>.<br><br></li>
      <li>Pierwiastek: <code>\sqrt{...}</code> $${\sqrt{x}}$$ użyliśmy: <code>\sqrt{x}</code> $${\sqrt[3]{\frac{x}{y}}}$$ użyliśmy <code>\\sqrt[3]{\\frac{x}{y}}</code>.</li>
      <li>Granica: <code>\lim</code> $${\lim_{x\to 0}}$$ użyliśmy <code>\\lim_{x\\to 0}</code> <br> <code>\sin</code> $${{\sin x}}$$ użyliśmy <code>\\sin x</code>.</li>
    </ol>
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
