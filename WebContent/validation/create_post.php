<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $title = $_POST['title'];
  $content = $_POST['content'];

  // Validate form data
  if (empty($title) || empty($content)) {
    // Error handling
    echo "Title and content are required fields.";
  } else {

    // Connect to database
    $host = 'localhost';
    $user = '27754175';
    $password = '27754175';
    $database = 'db_27754175';

    $conn = mysqli_connect($host, $user, $password, $database);

    // Check connection
    if (!$conn) {
      // Error handling
      echo "Failed to connect to database.";
    } else {

      // Insert new post into database
      $user_id = $_SESSION['user_id'];
      $sql = "INSERT INTO posts (user_id,title, content,created_at) VALUES ('$user_id','$title', '$content',NOW())";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        // Success message
        header("Location: ../index.php");
      } else {
        // Error handling
        echo "Failed to create post.";
      }

      // Close database connection
      mysqli_close($conn);
    }
  }
}
?>
