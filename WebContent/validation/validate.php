<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Define the variables and set to empty values
  $username = $password = '';

  // Validate the username
  if (empty($_POST['username'])) {
    $username_error = 'Please enter your username.';
  } else {
    $username = test_input($_POST['username']);
  }

  // Validate the password
  if (empty($_POST['password'])) {
    $password_error = 'Please enter your password.';
  } else {
    $password = test_input($_POST['password']);
  }

  // If there are no errors, check if the username and password are valid
  if (empty($username_error) && empty($password_error)) {
    // Connect to the database
    $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');

    // Check connection
    if (!$conn) {
      die('Connection failed: ' . mysqli_connect_error());
    }

    // Prepare the SQL statement to select the user with the given username and password
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if there is a user with the given username and password
    if (mysqli_num_rows($result) == 1) {
      // Set the session variable to the username
      $_SESSION['username'] = $username;

      // Redirect to the homepage
      header('Location: index.php');
      exit;
    } else {
      // Display an error message if the username or password is incorrect
      $login_error = 'Invalid username or password.';
    }

    // Close the database connection
    mysqli_close($conn);
  }
}

// Function to validate the input data
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>