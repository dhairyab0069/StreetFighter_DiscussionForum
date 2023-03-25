<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password";
    } else {
        // Hardcoded values for username and password
        $correct_username = "myuser";
        $correct_password = "mypassword";

        if ($username == $correct_username && $password == $correct_password) {
            $_SESSION['username'] = $username;
            echo "<p style='color:green;'>Login Sucessful</p>";
            header("Location: ../index.php");
            exit();
        } else {
            echo "Incorrect username or password";
        }
    }
} else {
  echo "Incorrect";
}
?>