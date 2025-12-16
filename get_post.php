<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

$servername = "localhost";
$username = "USER";
$password = "1234";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(array("success" => false, "message" => "Database connection failed: " . $conn->connect_error)));
}

$post_id = intval($_GET["id"]);

$sql = "SELECT id, title, author, content, created_at FROM board WHERE id = $post_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
    echo json_encode($post);
} else {
    echo json_encode(array("success" => false, "message" => "Post not found"));
}

$conn->close();
?>
