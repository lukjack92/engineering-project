<?php
  session_start();
  $id = $_GET['id'];
  $_SESSION['online'] = false;
  session_unset();
  session_destroy();

  if($id == 0)
  {
    header("Location: quiz.php");
  }

  if($id == 1)
  {
    header("Location: video.php");
  }

  if($id == 2)
  {
    header("Location: gallery.php");
  }

  if($id == 3)
  {
    header("Location: contact.php");
  }

  if($id == 4)
  {
    header("Location: about.php");
  }
  if($id == 5)
  {
    header("Location: index.php");
  }
  //header("Location: admin.php?id=$id");
?>
