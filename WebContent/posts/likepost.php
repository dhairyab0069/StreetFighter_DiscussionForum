<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['post_id']) && isset($_POST['action'])) {
    $post_id = $_POST['post_id'];
    $action = $_POST['action'];
    $user_id = $_SESSION['user_id'];

    // Check if the user has already liked or disliked the post
    $sql = "SELECT * FROM post_likes_dislikes WHERE post_id = $post_id AND user_id = $user_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User has already liked or disliked the post
        $row = mysqli_fetch_assoc($result);
        $existing_action = $row['action'];

        if ($existing_action == $action) {
            // User is trying to like or dislike the post again
            $sql = "DELETE FROM post_likes_dislikes WHERE id = {$row['id']}";
            mysqli_query($conn, $sql);
        } else {
            // User is changing their previous action from like to dislike or vice versa
            $sql = "UPDATE post_likes_dislikes SET action = '$action' WHERE id = {$row['id']}";
            mysqli_query($conn, $sql);
        }
    } else {
        // User is liking or disliking the post for the first time
        $sql = "INSERT INTO post_likes_dislikes (post_id, user_id, action) VALUES ($post_id, $user_id, '$action')";
        mysqli_query($conn, $sql);
    }
}

mysqli_close($conn);
header("Location: viewpost.php?id=$post_id&user_id=$user_id");
?>
