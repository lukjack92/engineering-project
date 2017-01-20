<?php

  session_start();

  if(!(isset($_SESSION['online']) && $_SESSION['online'] == true))
  {
    header("Location: admin.php");
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
  <title>Contact me</title>

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
    </div>
  </nav>
  <div class="container">

    <a class="btn btn-lg btn-primary btn-block" href="panel.php"><span class="glyphicon glyphicon-chevron-left"></span>Wstecz</a>
     <div class="col-md-12">
       <div class="table-responsive">
         <thead><table class="table">
           <tr align="center" class="color"><td>#</td><td>User</td><td>Password</td><td>Opcja</td></tr>
           <tr>
           <?php
             require_once ("connect.php");

             $connect = @new mysqli($host,$db_user,$db_password,$db_name);

            mysqli_query($connect, "SET CHARSET utf8");
       			mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

             if ($connect->connect_error)
           	{
           		echo "Connect Error: ".$connect->connect_errno;
           	}
           	else
             {

                 if($result = @$connect->query("SELECT * FROM $db_admin"))
                 {

                   $how = $result->num_rows;

                   for ($i = 1; $i <= $how; $i++)
                   {
                     $row = $result->fetch_assoc();

 ?>
 </thead>
 <tbody>
 <td align="center"><?php echo $i ?></td>
 <td align="center"><?php echo $row['login'] ?></td>
 <td align="center"><?php echo $row['password'] ?></td>
 <td align="center">
<?php
if($how == 1)
{
  echo 'Jeden użytkownik musi zostać';
} else
{
  echo '<button><a href=deleteUser.php?id='.$row['id'].'>Usuń<a></button>';
}
?>
</td>
 <tr></tr>
             <?php
                   }
                 }
                 if(isset($how))
                 {
                   if($how == 0){
                     echo '<div class="alert alert-danger">
                       <strong>Danger!</strong> Baza pytań jest pusta, uzupełnij ją poprzez formularz dadawania pytań do bazy i przejdz do zakładki Quiz. </div>';
                   }
                 }
             }
           ?>
         </tr><tbody></table>
         </div>


           <div class="col-md-offset-4 col-md-4 well">
             <form method="post" action="addadmin.php">
               <legend>Dodaj użytkownika</legend>
                <div class="form-group">
                  <input type="text" placeholder="User" name="user" class="form-control">
                </div>

                <div class="form-group">
                  <input type="text" placeholder="Password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary pull-c">Dodaj</button>
              </form>
            </div>
            <div class="col-md-12"> <?php if(isset($_SESSION['empty']))
                        {
                          echo $_SESSION['empty'];
                          unset($_SESSION['empty']);
                        }
                  ?>
          </div>

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
