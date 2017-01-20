	<?php
  $host = "localhost";
  $db_user = "root";
  $db_password = "lukasz1248";
  $db_name = "database";
  $db_quest = "questions";
  $db_admin = "users";
	$db_video = "video";
	$db_cat = "category";
	$db_pic = "pictures";

	$connect = @new mysqli($host,$db_user,$db_password,$db_name);
	mysqli_query($connect, "SET CHARSET utf8");
	mysqli_query($connect, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
?>
