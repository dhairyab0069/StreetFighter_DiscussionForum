<?php

session_start();

$errors = array();

// Validate username
if (empty($_POST['username'])) {
  $errors['username'] = 'Username is required';
} else {
  $username = test_input($_POST['username']);
}

// Validate new password
if (empty($_POST['new_password'])) {
  $errors['new_password'] = 'New password is required';
} else {
  $new_password = test_input($_POST['new_password']);
}

// Validate confirm password
if (empty($_POST['confirm_password'])) {
  $errors['confirm_password'] = 'Confirm password is required';
} else {
  $confirm_password = test_input($_POST['confirm_password']);
}

// Check if new password and confirm password match
if ($new_password != $confirm_password) {
  $errors['confirm_password'] = 'Passwords do not match';
}

// If there are errors, store them in session and redirect to forgot password page with errors
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  header('Location: ../forgot.php');
  exit;
}


// Connect to the database (replace the database credentials with your own)
$servername = "localhost";
$username = "dhairya";
$password = "db19082002";
$dbname = "db_27754175";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the username exists in the users table
$sql = "SELECT id FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Update the password for the user
  $sql = "UPDATE users SET password = '$new_password' WHERE username = '$username'";

  if (mysqli_query($conn, $sql)) {
    // Redirect to success page
    header('Location: ../forgot.php?success=true');
    exit;
  } else {
    // If there is an error updating the password, store the error in session and redirect to forgot password page with error
    $errors['password_update'] = 'Error updating password. Please try again later.';
    $_SESSION['errors'] = $errors;
    header('Location: ../forgot.php');
    exit;
  }
} else {
  // If the username does not exist in the users table, store the error in session and redirect to forgot password page with error
  $errors['username'] = 'Username does not exist';
  $_SESSION['errors'] = $errors;
  header('Location: ../forgot.php');
  exit;
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
