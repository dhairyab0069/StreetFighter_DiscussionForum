<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";

// Check if user is logged in and has admin privileges
if (!isset($_SESSION['user_id']) || !isset($_SESSION['admin'])) {
    header('Location: ../validate_login.php');
    exit();
}

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if post_id is set in URL parameters
if (!isset($_GET['post_id'])) {
    die("Post ID not provided in URL parameters.");
}

$post_id = $_GET['post_id'];

// Delete post from database
$sql = "DELETE FROM posts WHERE post_id = $post_id";
if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Post deleted successfully.";
    header("Location: ../index.php");
    exit();

} else {
    echo "Error deleting post: " . mysqli_error($conn);
}

mysqli_close($conn);
