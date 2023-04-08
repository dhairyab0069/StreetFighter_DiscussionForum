<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";

// Connect to the database
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check for any errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the search term from the query string
$search_term = $_GET['q'];

// Search for users that match the search term
$sql = "SELECT * FROM users WHERE username LIKE '%$search_term%'";
$result = $conn->query($sql);

// Display the search results
if ($result->num_rows > 0) {
  echo "<table class='user-table'>";
  echo "<tr><th>User ID</th><th>Username</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["user_id"] . "</td><td>" . $row["username"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

// Close the database connection
$conn->close();

?>
<link href = 'css/view_users.css' rel = 'stylesheet'>
<a href = 'search_users.php'> Go Back </a>