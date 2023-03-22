<?php




?>
<!DOCTYPE html>
<html>
  <head>
    <title>Street Fighter Discussions</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel = "stylesheet" href = "css/index.css">
  </head>
  <body>
    <header>
      
    <h1>Street Fighter Discussions Forum</h1>
    </header>
    <div id = "main">

    <article id ="left">
    
    <?php 
    
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        
        echo '<nav>';
        echo '<ul>';
        echo '<li><a href="index.php">Home</a></li>';
        echo  '<li><a href="About.php">About</a></li>';
        echo '<li><a href="#">Log Out</a></li>';
        echo '<li><a href="#">Sign UP</a></li>';
        echo '</ul>';
        echo '</nav>';

    }
    else
    {
        echo '<nav>';
        echo '<ul>';
        echo '<li><a href="index.php">Home</a></li>';
        echo  '<li><a href="About.php">About</a></li>';
        echo '<li><a href="validation_login.php">Login</a></li>';
        echo '<li><a href="validation_sign_up.php">Sign Up</a></li>';
        echo '</ul>';
        echo '</nav>';
    }
    
    
    
    
    ?>
</article>


    </div>
    
    <main>
      <h2>Latest Discussions</h2>
      <ul>
        <li><a href="#">Topic 1</a></li>
        <li><a href="#">Topic 2</a></li>
        <li><a href="#">Topic 3</a></li>
        <li><a href="#">Topic 4</a></li>
      </ul>
    </main>
    <footer>
      <p>
        &copy; Capcom Co., Ltd. All Rights Reserved. All materials contained on
        this website, including but not limited to images, graphics, logos, and
        text, are the property of Capcom or its affiliates and are protected by
        copyright laws. Unauthorized use, reproduction, or distribution of any
        materials on this website is strictly prohibited and may result in civil
        and criminal penalties. Capcom reserves the right to modify or remove
        any materials on this website at any time without notice. By accessing
        this website, you agree to abide by all copyright laws and other
        applicable laws and regulations.


        <div>Icon made from <a href="http://www.onlinewebfonts.com/icon">Icon Fonts</a> is licensed by CC BY 3.0</div>
      </p>
    </footer>
  </body>
</html>
