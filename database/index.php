<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once ("../connect.php");

$conn = @new mysqli($host,$db_user,$db_password,$db_name);

//$conn = new mysqli('localhost','root','lukasz1248','database');
//if($connect->connect_error)
//{
//  echo "Connect Error: ".$connect->connect_errno;
//}

$conn->query('SET NAMES utf8');
$conn->query('SET CHARACTER_SET utf8_unicode_ci');
$result = $conn->query("SELECT * FROM questions");

$json = Array();

//$row_array = "[";
while ($row = $result->fetch_assoc()) {

  $row_array['id'] = $row['id'];
  $row_array['tresc'] = $row['tresc'];
  $row_array['odpa'] = $row['odpa'];
  $row_array['odpb'] = $row['odpb'];
  $row_array['odpc'] = $row['odpc'];
  $row_array['odpd'] = $row['odpd'];
  $row_array['answer'] = $row['answer'];
  $row_array['kategoria'] = $row['kategoria'];

  array_push($json,$row_array);
  //if ($row_array != "[") {$row_array .= ",";}
  //$row_array .= '{"id":"' . $row['id'] . '",';
  //$row_array .= '"tresc":"' . $row['tresc'] . '",';
  //$row_array .= '"odpa":"' . $row['odpa'] . '",';
  //$row_array .= '"odpb":"' . $row['odpb'] . '",';
  //$row_array .= '"odpc":"' . $row['odpc'] . '",';
  //$row_array .= '"odpd":"' . $row['odpd'] . '",';
  //$row_array .= '"answer":"' . $row['answer'] . '",';
  //$row_array .= '"kategoria":"' . $row['kategoria'] . '",';
  //$row_array .= '"rok":"' . $row['rok'] . '"}';
}
//$row_array .= "]";
$conn->close();
echo $data_string = json_encode($json);

?>
