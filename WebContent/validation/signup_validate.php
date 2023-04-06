<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Connect to database
$host = "localhost";
$user = "dhairya";
$password = "db19082002";
$dbname = "forum";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$errors = array(); // Initialize empty array for errors

// Validate email
if (empty($_POST['email'])) {
  $errors['email'] = 'Email is required';
} else {
  $email = test_input($_POST['email']);
  // check if email address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
  }
}

// Validate username
if (empty($_POST['Username'])) {
  $errors['Username'] = 'Username is required';
} else {
  $username = test_input($_POST['Username']);
  // check if username is alphanumeric
  if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
    $errors['Username'] = 'Only letters and numbers allowed';
  }
}

// Validate password
if (empty($_POST['Password'])) {
  $errors['Password'] = 'Password is required';
} else {
  $password = test_input($_POST['Password']);
}


// If there are errors, store them in session and redirect to signup page with errors
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  header('Location: ../signup_validate.php');
  exit;
}

// If there are no errors, insert user data into the database
$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

if (mysqli_query($conn, $sql)) {
  // Store the username in the session and redirect to success page
  $_SESSION['username'] = $username;
  header('Location: ../index.php');
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

// Function to test input data and remove special characters
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
