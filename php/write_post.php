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

$data = json_decode(file_get_contents("php://input"), true);

$title = $data["title"];
$content = $data["content"];
$author = $data["author"];

$sql = "INSERT INTO board (title, content, author) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
  die(json_encode(array("success" => false, "message" => "쿼리 작성 오류")));
}

$stmt->bind_param("sss", $title, $content, $author);

if ($stmt->execute()) {
  echo json_encode(array("success" => true, "message" => "글 작성 성공"));
} else {
  echo json_encode(array("success" => false, "message" => "글 작성 실패: " . $stmt->error));
}

$stmt->close();
$conn->close();
?>
