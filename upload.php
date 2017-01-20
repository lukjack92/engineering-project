<?php

session_start();

if((isset($_SESSION['online']) && $_SESSION['online'] == true))
{
  $file = $_FILES["fileToUpload"]["name"];
  $cat = $_POST['sel'];

  $target_dir = "/var/www/html/praca/video/";
  echo $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  if($_FILES["fileToUpload"]["name"])
  {

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file))
    {
        $_SESSION['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> To już jest w galerii!!!</div>';
        header('Location: gallery.php');
        exit();
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 9000000000)
    {
      $_SESSION['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> Zdjęcie jest za duże!!!</div>';
      header('Location: gallery.php');
      exit();
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
    {
      $_SESSION['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> Tylko zdjęcia z rozszerzeniem: .jpg, .png, .jpeg, .mpeg, .gif</div>';
      header('Location: gallery.php');
      exit();
    }

      //dodanie do bazy pictures nazwy zdjecia i kategorii
      require_once ("connect.php");

      //$connect = @new mysqli($host,$db_user,$db_password,$db_name);
      //mysqli_query($connect, "SET CHARSET utf8");
      //mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");

      if ($connect->connect_error)
      {
          $_SESSION['error'] = '<div class="alert alert-danger" role="alert">Brak bazy danych. Błąd: '.$connect->connect_errno. '</div>';
          header("Location: gallery.php");
          exit();
      }else
      {
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
        {
            $_SESSION['error'] = '<div class="alert alert-success"><strong>Success! </strong>Plik '. basename( $_FILES["fileToUpload"]["name"]). ' został dodany. Kategoria: '.$cat.'</div>';

            //dodanie do bazy
            $connect->query("INSERT INTO $db_pic (picture,category) VALUES ('$file','$cat')");

            $connect->close();
            header("Location: gallery.php");
            exit();
        } else
        {
          $_SESSION['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> Niestety, wystąpił błąd podczas przesyłania pliku.</div>';
          header('Location: gallery.php');
          exit();
        }
      }

  }else{
        $_SESSION['error'] = '<div class="alert alert-danger"><strong>Danger!</strong> Nie wybrałeś pliku.</div>';
        header("Location: gallery.php");
        exit();
    }
}else{
  header("Location: admin.php?id=2");
  exit();
}
?>
