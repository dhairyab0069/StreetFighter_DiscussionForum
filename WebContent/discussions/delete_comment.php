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
$user = "dhairya";
$password = "db19082002";
$dbname = "forum";

// connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// get the comment id from the URL parameter
$comment_id = $_GET['comment_id'];

// check if the user has permission to remove the comment
$stmt = $conn->prepare("SELECT user_id FROM comments WHERE comment_id = ?");
$stmt->bind_param("i", $comment_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if ($row['user_id'] != $_SESSION['user_id']) {
  die("You do not have permission to remove this comment.");
}

// remove the comment from the database
$stmt = $conn->prepare("DELETE FROM comments WHERE comment_id = ?");
$stmt->bind_param("i", $comment_id);
$stmt->execute();

// redirect to the previous page
header("Location: " . $_SERVER["HTTP_REFERER"]);
exit();

mysqli_close($conn);
?>
