<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "USER";
$password = "1234";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die(json_encode(array("success" => false, "message" => "데이터베이스 연결 실패")));
}

$sql = "SELECT * FROM board ORDER BY id DESC";
$result = $conn->query($sql);

$posts = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $posts[] = $row;
  }
}

echo json_encode($posts);

$conn->close();
?>
