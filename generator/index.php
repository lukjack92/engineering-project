<?php
if(!empty($_POST['pass']))
{
  $_SESSION['error'] = password_hash($_POST['pass'],PASSWORD_DEFAULT);
  unset($_POST);
}
 ?>
<!DOCTYPE>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Generator haseł hash</title>
</head>
<body>
    <h2>Generator haseł hash</h2>
    <form action="" method="POST">
      Hasło do generowania hash: <input type="text" name="pass">
      <br /> <br />Wygenerowane hasło hash:
      <?php
      if(isset($_SESSION['error']))
      {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
      <input type="submit" value="OK" />
  </from>
</body>
</html>
