<?php

// Start the session 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";

// Check if the current user is an admin
if (isset($_SESSION['admin'])) {

  // Connect to the database
  $conn = mysqli_connect($host, $user, $password, $dbname);

  // Check for any errors
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if a user was just deleted and set a session variable to display a message on the previous page
  if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM users WHERE user_id = $user_id";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['user_deleted'] = true;
    }
  }

  // Close the database connection
  $conn->close();
  header("Location: admin_view_users.php");
  exit();
}

?>