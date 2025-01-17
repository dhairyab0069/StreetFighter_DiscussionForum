<?php
session_start();
?>
<html>
  <head>
    <link href="css/signup.css" rel="stylesheet">
    <script >
      // Wait for the page to finish loading before running our code
window.onload = function () {
  // Get the form element
  var form = document.forms.MyForm;

  // Get the input fields we want to validate
  var firstNameField = form.elements.First_name;
  var lastNameField = form.elements.Last_name;
  var emailField = form.elements.email;
  var usernameField = form.elements.Username;
  var passwordField = form.elements.Password;

  // Define the regular expression patterns we want to use for validation
  var namePattern = /^[A-Za-z]{4,20}$/;
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var usernamePattern = /^[a-zA-Z0-9]{4,20}$/;
  var passwordPattern = /^[a-zA-Z0-9]{4,20}$/;

  // Add event listeners to the form fields to validate them on change
  firstNameField.addEventListener("change", validateFirstName);
  lastNameField.addEventListener("change", validateLastName);
  emailField.addEventListener("change", validateEmail);
  usernameField.addEventListener("change", validateUsername);
  passwordField.addEventListener("change", validatePassword);

  // Define the validation functions
  function validateFirstName() {
    if (!namePattern.test(firstNameField.value)) {
      alert(
        "First name must be between 4 and 20 characters and contain only letters."
      );
      firstNameField.focus();
    }
  }

  function validateLastName() {
    if (!namePattern.test(lastNameField.value)) {
      alert(
        "Last name must be between 4 and 20 characters and contain only letters."
      );
      lastNameField.focus();
    }
  }

  function validateEmail() {
    if (!emailPattern.test(emailField.value)) {
      alert("Please enter a valid email address.");
      emailField.focus();
    }
  }

  function validateUsername() {
    if (!usernamePattern.test(usernameField.value)) {
      alert(
        "Username must be between 4 and 20 characters and contain only letters and numbers."
      );
      usernameField.focus();
    }
  }

  function validatePassword() {
    if (!passwordPattern.test(passwordField.value)) {
      alert(
        "Password must be between 4 and 20 characters and contain only letters and numbers."
      );
      passwordField.focus();
    }
  }

  // Add event listener to the form submit button to prevent submission if any field is invalid
  form.addEventListener("submit", function (event) {
    if (!namePattern.test(firstNameField.value)) {
      alert(
        "First name must be between 4 and 20 characters and contain only letters."
      );
      firstNameField.focus();
      event.preventDefault();
      return false;
    }

    if (!namePattern.test(lastNameField.value)) {
      alert(
        "Last name must be between 4 and 20 characters and contain only letters."
      );
      lastNameField.focus();
      event.preventDefault();
      return false;
    }

    if (!emailPattern.test(emailField.value)) {
      alert("Please enter a valid email address.");
      emailField.focus();
      event.preventDefault();
      return false;
    }

    if (!usernamePattern.test(usernameField.value)) {
      alert(
        "Username must be between 4 and 20 characters and contain only letters and numbers."
      );
      usernameField.focus();
      event.preventDefault();
      return false;
    }

    if (!passwordPattern.test(passwordField.value)) {
      alert(
        "Password must be between 4 and 20 characters and contain only letters and numbers."
      );
      passwordField.focus();
      event.preventDefault();
      return false;
    }
  });
};

    </script>
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
