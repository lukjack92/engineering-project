<?php

session_start();

$del = $_GET['del'];

if((isset($_SESSION['online']) && $_SESSION['online'] == true))
{

  require_once ("connect.php");

  //$connect = @new mysqli($host,$db_user,$db_password,$db_name);
  //mysqli_query($connect, "SET CHARSET utf8");
  //mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

  if ($connect->connect_error)
  {
    echo "Connect Error: ".$connect->connect_errno;
  }
  else
  {
    $result = $connect->query("SELECT * FROM $db_pic WHERE category='$del'");

    $how = $result->num_rows;

    $path = '/var/www/html/praca/video/';
    $files = scandir($path);
    $wynik = count($files);

    for ($i = 1; $i <= $how; $i++)
    {
      $row = $result->fetch_assoc();
      $picture = $row['picture'];

      for($a = 2; $a < $wynik; $a++)
      {   //echo $a." ";
          if($files[$a] == $picture)
          {
            echo $path_1 = $path.$picture;
            if(!unlink($path_1))
              {
                  echo ("Error deleting $path_1");
              }
              else
              {
                echo  ("Deleted $path_1");
              }
          }
      }
    }

    @$connect->query("DELETE FROM $db_cat WHERE category='$del'");
    @$connect->query("DELETE FROM $db_pic WHERE category='$del'");
    @$connect->close();
    $_SESSION['error'] = '<div class="alert alert-success"><strong>Danger! </strong>Usunięto pomyślnie kategorię '.$del.'!!!</div>';
    header("Location: gallery.php");
  }

} else {
  header("Location: admin.php?id=2");
}

//header("Location: gallery.php");
?>
