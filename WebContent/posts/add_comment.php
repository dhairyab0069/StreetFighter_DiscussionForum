<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// database connection information
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";

$thread_id = $_POST['thread_id'];
$body = $_POST['body'];
$user_id = $_SESSION['user_id'];

// connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// add new comment
$stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, content, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("iis", $user_id, $thread_id, $body);
// Execute the SQL statement
if (mysqli_stmt_execute($stmt)) {
    // Store the user_id in the session and redirect to success page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit();
  }



mysqli_close($conn);

}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">