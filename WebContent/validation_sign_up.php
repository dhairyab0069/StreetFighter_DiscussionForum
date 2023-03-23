<html>
  <head>
    
  <link href ="css/validation.css" rel = "stylesheet">
  </head>
  <body>
    <div class="content">
      <h1>Sign Up to System</h1>

      <br />
      <form
        name="MyForm"
        method="post"
        action="validation/signup_validate.php"
      >
        <table style="display: inline">
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2"
                  >First name:</font>
              </div>
            </td>
            <td>
              <input type="text" name="First name" pattern="[A-Za-z]{4,20}" />
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2"
                  >Last name:</font
                >
              </div>
            </td>
            <td>
              <input
                type="text"
                name="Last name"
                pattern="[A-Za-z]{4,20}"
                required
              />
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2"
                  >Email:</font>
              </div>
            </td>
            <td>
              <input type="text" name="email"/>
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2"
                  >Username:</font>
              </div>
            </td>
            <td>
              <input type="text" name="Username "/>
            </td>
          </tr>
          <tr>
            <td>
              <div align="right">
                <font face="Arial, Helvetica, sans-serif" size="2"
                  >Password:</font>
              </div>
            </td>
            <td>
              <input
                type="password"
                name="Password"
                required
              />
            </td>
          </tr>
        </table>
        <br />
        <input
          class="submit"
          type="submit"
          name="Submit2"
          value="Sign Up"
          required
        />
      </form>
      <?php

      include('validation/signup_validate.php');

      ?>
    </div>
  </body>
</html>
