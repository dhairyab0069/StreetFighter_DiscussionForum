<?php
session_start();
?>
<html>
  <head>
    <link href="css/signup.css" rel="stylesheet">
  </head>
  <body>
    <div class="content">
      <h1>Sign Up to System</h1>
      <br />
      <form name="MyForm" method="post" action="validation/signup_validate.php">
        <table style="display: inline">
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2">First name:</font>
              </div>
            </td>
            <td>
              <input type="text" name="First_name" pattern="[A-Za-z]{4,20}" />
            </td>
            <td>
              <?php if (isset($_SESSION['errors']['First_name'])) echo '<span class="error">'.$_SESSION['errors']['First_name'].'</span>'; ?>
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2">Last name:</font>
              </div>
            </td>
            <td>
              <input type="text" name="Last_name" pattern="[A-Za-z]{4,20}" required />
            </td>
            <td>
              <?php if (isset($_SESSION['errors']['Last_name'])) echo '<span class="error">'.$_SESSION['errors']['Last_name'].'</span>'; ?>
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2">Email:</font>
              </div>
            </td>
            <td>
              <input type="text" name="email"/>
            </td>
            <td>
              <?php if (isset($_SESSION['errors']['email'])) echo '<span class="error">'.$_SESSION['errors']['email'].'</span>'; ?>
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2">Username:</font>
              </div>
            </td>
            <td>
              <input type="text" name="Username" />
            </td>
            <td>
              <?php if (isset($_SESSION['errors']['Username'])) echo '<span class="error">'.$_SESSION['errors']['Username'].'</span>'; ?>
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2">Password:</font>
              </div>
            </td>
            <td>
              <input type="password" name="Password" required />
            </td>
            <td>
              <?php if (isset($_SESSION['errors']['Password'])) echo '<span class="error">'.$_SESSION['errors']['Password'].'</span>'; ?>
            </td>
          </tr>
        </table>
        <br />
        <input class="submit" type="submit" name="Submit2" value="Sign Up" required />
      </form>
      <?php
      if (isset($_SESSION['errors'])) {
          unset($_SESSION['errors']);
      }
      ?>
    </div>
  </body>
</html>
