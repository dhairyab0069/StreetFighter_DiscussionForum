<?php
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
    $user = 'dhairya';
    $password = 'db19082002';
    $database = 'forum';

    $conn = mysqli_connect($host, $user, $password, $database);

    // Check connection
    if (!$conn) {
      // Error handling
      echo "Failed to connect to database.";
    } else {

      // Insert new post into database
      $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        // Success message
        echo "Post created successfully!";
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
