<?php
session_start();

if((isset($_SESSION['online']) && $_SESSION['online'] == true))
{

  $cat = $_POST['del'];

  require_once ("connect.php");

  if ($connect->connect_error)
  {
    echo "Connect Error: ".$connect->connect_errno;
  }
  else
  {
    $result = @$connect->query("SELECT * FROM $db_cat");

    $how = $result->num_rows;

    for ($i = 1; $i <= $how; $i++)
    {
      $row = $result->fetch_assoc();

      if($row['category'] == $cat)
      {
        $_SESSION['desc'] = '<div><h4>Opis kategori: '.$row["category"].'</h4>'. $row['description'] .'<br/><a class="btn btn-primary" href="delCat.php?del='. $row["category"].'">Usuń kategorię i zdjęcia</a></div>';
        header("Location: gallery.php");
      }
    }
  }
} else {
  header("Location: admin.php?id=2");
}
?>
