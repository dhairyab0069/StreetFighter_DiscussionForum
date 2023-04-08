<?php
session_start();
?>
<html>
  <head>
    <title>Login</title>

  </head>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector("form[name='MyForm']");
  const usernameInput = form.querySelector("input#username");
  const passwordInput = form.querySelector("input#password");

  form.addEventListener("submit", function(event) {
    event.preventDefault(); // prevent the form from submitting

    // validate the username and password fields
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    let isValid = true;
    let errorMessage = "";

    // validate the username
    if (!/^[a-zA-Z0-9]{3,24}$/.test(username)) 
    {
      errorMessage += "Username must be between 3-24 characters and alpha numeric. ";
      isValid = false;
    }

    // validate the password
    if (password.length < 3 || password.length > 24) {
    errorMessage += "Password must be between 3-24 characters. ";
    isValid = false;
}



    if (!isValid) {
      // display the error message
      alert(errorMessage);
    } else {
      // submit the form
      form.submit();
    }
  });
});

  </script>
  <body>
    <div class="content">
      <link href ="css/validation.css" rel = "stylesheet">

      <br />
      <form name="MyForm" method="post" action="validation/validate.php">
        <div class="form">
          <img src="images/sf.png" alt="Street Fighter logo" class="logo" />
          <input
            type="text"
            id="username"
            name="username"
            class="input-field"
            placeholder="Username"
          />
          <input
            type="password"
            id="password"
            name="password"
            class="input-field"
            placeholder="Password"
          />
          <button type="submit" class="login-button">Log In</button>
          <a href="forgot.php" class="forgot-password-link">Forgot Password?</a>
          <div class="signup-link">
            Don't have an account? <a href="validation_sign_up.php">Sign up</a>
          </div>
        </div>
      </form>
    </div>
    <?php
    if (isset($_SESSION['result'])) {
        echo $_SESSION['result'];
        unset($_SESSION['result']);
    }
    ?>
    <a href = "admin_login.php">Admin Login</a> [Admin login from here only and not the form above]<br>
    <a href ="index.php">[ Back To Home ] </a>

  </body>
</html>