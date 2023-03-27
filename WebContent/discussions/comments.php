<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

// database connection information
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";

// connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// add new comment
if (isset($_POST['add_comment'])) {
    $thread_id = $_POST['thread_id'];
    $user_id = $_SESSION['user_id'];
    $body = $_POST['body'];

    $sql = "INSERT INTO comments (post_id, user_id, content) VALUES ('$thread_id', '$user_id', '$body')";

    if (mysqli_query($conn, $sql)) {
        header("Location: topic1.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// edit comment
if (isset($_POST['edit_comment'])) {
    $comment_id = $_POST['comment_id'];
    $body = $_POST['body'];

    $sql = "UPDATE comments SET content = '$body' WHERE id = $comment_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: topic1.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// delete comment
if (isset($_POST['delete_comment'])) {
    $comment_id = $_POST['comment_id'];

    $sql = "DELETE FROM comments WHERE id = $comment_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: topic1.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
