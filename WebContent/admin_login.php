<?php
session_start();
?>
<html>
  <head>
    <title>Login</title>
    <link href ="css/validation.css" rel = "stylesheet">
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
      <br />
      <form name="MyForm" method="post" action="validation/validate_admin.php">
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
          <div class="signup-link">
            <a href="index.php">Back to Home</a>
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
  </body>
</html>