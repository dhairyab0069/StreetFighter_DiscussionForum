<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

// check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

// database connection information
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "forum";

// connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$comment_id = $_GET['comment_id'];


$stmt = $conn->prepare("SELECT user_id FROM comments WHERE comment_id = ?");
$stmt->bind_param("i", $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($row['user_id'] != $_SESSION['user_id']) {
  die("You do not have permission to remove this comment.");
}

$stmt = $conn->prepare("DELETE FROM comments WHERE comment_id = ?");
$stmt->bind_param("i", $comment_id);
$stmt->execute();

header("Location: " . $_SERVER["HTTP_REFERER"]);
exit();

mysqli_close($conn);
?>
