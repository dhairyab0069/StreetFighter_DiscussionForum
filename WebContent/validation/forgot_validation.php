<?php
if(isset($_POST['username'], $_POST['new_password'], $_POST['confirm_password'])){
  $username = $_POST['username'];
  $new_password = $_POST['new_password'];
  $confirm_password = $_POST['confirm_password'];

  // check if username and new password are not empty and valid
  if(!empty($username) && !empty($new_password) && ctype_alnum($username)){
    if($new_password === $confirm_password){

      // generate a new hashed password
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

      
      $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE username = :username");
      $stmt->execute([
        'password' => $hashed_password,
        'username' => $username
      ]);

      header("Location: ../forgot.php?success=true"); // redirect to the form page with a success message

    } else {
      $error = "Passwords do not match.";
      header("Location: ../forgot.php?error=" . urlencode($error));
      exit();
    }
  } else {
    $error = "Invalid username or new password.";
    header("Location: ../forgot.php?error=" . urlencode($error));
    exit();
  }
} else {
  $error = "Missing username or new password.";
  header("Location: ../forgot.php?error=" . urlencode($error));
  exit();
}
?>