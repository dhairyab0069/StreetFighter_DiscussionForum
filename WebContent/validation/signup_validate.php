<?php
session_start();

$errors = array(); // Initialize empty array for errors

// Validate first name
if (empty($_POST['First_name'])) {
  $errors['First_name'] = 'First name is required';
} else {
  $first_name = test_input($_POST['First_name']);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
    $errors['First_name'] = 'Only letters and white space allowed';
  }
}

// Validate last name
if (empty($_POST['Last_name'])) {
  $errors['Last_name'] = 'Last name is required';
} else {
  $last_name = test_input($_POST['Last_name']);
  // check if name only contains letters and whitespace
  if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
    $errors['Last_name'] = 'Only letters and white space allowed';
  }
}

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

// If there are no errors, store the username and password in the file
$user = $username . ',' . $password . "\n";
file_put_contents('usernames.txt', $user, FILE_APPEND);

// Store the username in the session and redirect to success page
$_SESSION['username'] = $username;
header('Location: ../index.php');
exit;

// Function to test input data and remove special characters
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
