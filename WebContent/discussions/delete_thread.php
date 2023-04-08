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
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if thread id is set in URL parameters
if (!isset($_GET['id'])) {
    die("Thread ID not provided in URL parameters.");
}

$thread_id = $_GET['id'];

// Delete thread and its comments from database
$sql = "DELETE FROM threads WHERE id = $thread_id";
if (mysqli_query($conn, $sql)) {
    // Delete all comments related to this thread
    $sql = "DELETE FROM comments WHERE post_id = $thread_id";
    mysqli_query($conn, $sql);

    $_SESSION['message'] = "Thread deleted successfully.";
    header("Location: ../");
    exit();
} else {
    echo "Error deleting thread: " . mysqli_error($conn);
}

mysqli_close($conn);