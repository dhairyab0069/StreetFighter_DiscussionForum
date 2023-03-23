<html>
  <head>
    <title>Forgot Password</title>
  </head>
  <body>
    <div class="content">
    <?php
  if(isset($_GET['success'])){
    echo '<p style="color: green;">Password updated successfully.</p>';
  } else if(isset($_GET['error'])){
    echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
  }
  ?>
      <h1>Forgot Password</h1>
      <form name="MyForm" method="post" action="validation/forgot_validation.php">
        <div class="form">
          <label for="username">Username:</label>
          <input
            type="text"
            id="username"
            name="username"
            class="input-field"
            placeholder="Enter your username"
          /><br /><br />
          <label for="email">New Password:</label>
          <input
            type="password"
            id="new_password"
            name="new_password"
            class="new-password"
            placeholder="Enter new password"
          /><br /><br />
          <label for="email">Confirm Password:</label>
          <input
            type="password"
            id="confirm_password"
            name="confirm_password"
            class="confirm-password"
            placeholder="Confirm password"
          /><br /><br />
          <button type="submit" class="forgot-password-button">Submit</button>
        </div>
      </form>

    </div>
  </body>
</html>