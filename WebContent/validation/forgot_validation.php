<?php

session_start();

require_once('../config/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  header('Location: ../forgot.php');
  exit();
}

// Validate username
if (empty($_POST['username'])) {
  header('Location: ../forgot.php?error=Please enter your username.');
  exit();
}
$username = mysqli_real_escape_string($connection, $_POST['username']);

// Validate password
if (empty($_POST['new_password']) || empty($_POST['confirm_password'])) {
  header('Location: ../forgot.php?error=Please_enter_a_new password_and_confirm_it.');
  exit();
}
if ($_POST['new_password'] != $_POST['confirm_password']) {
  header('Location: ../forgot.php?error=Passwords_do_not_match.');
  exit();
}
$password = mysqli_real_escape_string($connection, $_POST['new_password']);

// Check if username exists
$result = mysqli_query($connection, "SELECT * FROM users WHERE username = '{$username}'");
if (!$result || mysqli_num_rows($result) == 0) {
  header('Location: ../forgot.php?error=Username not found.');
  exit();
}

// Update password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$query = "UPDATE users SET password = '{$hashed_password}' WHERE username = '{$username}'";
$result = mysqli_query($connection, $query);
if (!$result) {
  header('Location: ../forgot.php?error=Something went wrong, please try again later.');
  exit();
}

header('Location: ../forgot.php?success=Password updated successfully.');

mysqli_close($connection);
?>