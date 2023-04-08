<form action="search_users.php" method="get">
  <label for="search">Search:</label>
  <input type="text" id="search" name="q" placeholder="Enter your search term...">
  <button type="submit">Search</button>
</form>

<?php

// Start the session (assuming the current user is logged in)


session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";



// Check if the current user is an admin
if (isset($_SESSION['admin'])) 
{

  // Connect to the database
  $conn = mysqli_connect($host, $user, $password, $dbname);

  // Check for any errors
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if a user was just deleted and display a message if so
  if (isset($_SESSION['user_deleted']))
   {
    echo "<p class='message'>User successfully deleted.</p>";
    unset($_SESSION['user_deleted']);
  }

  

  // Query the database for all users
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

  // Check if any users were found
  if ($result->num_rows > 0) 
  {

    // Display a table with all users and a button to delete each one
    echo "<table class='user-table'>";
    echo "<tr><th>User ID</th><th>Username</th><th>Delete User</th></tr>";
    while($row = $result->fetch_assoc())
     {
      echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["username"]. "</td><td><form method='POST' action='delete_users.php'><input type='hidden' name='user_id' value='" . $row["user_id"] . "'><input type='submit' name='submit' value='Delete'></form></td></tr>";
    }
    echo "</table>";

  } 
  else 
  {
    echo "No users found.";
  }

  // Close the database connection
  $conn->close();

} else 
{
  echo "You do not have permission to view this page.";
}

?>
<link rel='stylesheet' href='css/view_users.css'>
<a href = "../">[BACK]</a>
