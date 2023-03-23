<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <div class="content">
      <h1>Please Login to System</h1>
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
  </body>
</html>
