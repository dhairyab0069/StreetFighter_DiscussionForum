
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
    <?php 
    session_start();
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        
        echo '<nav>';
        echo '<ul>';

        echo '<li><a href="validation/logout.php">Log Out</a></li>';
        echo '<li><a href="#"><img src ="images/icon.ico " class = "profile-pic"></a></li>';
        echo '</ul>';
        echo '</nav>';

    }
    else
    {
        echo '<nav>';
        echo '<ul>';
        
        echo '<li><a href="validation_login.php">Login</a></li>';
        echo '<li><a href="validation_sign_up.php">Sign Up</a></li>';
        echo '</ul>';
        echo '</nav>';
    }
    
    
    
    
    ?>
    <br> <br><br>
    <image src = "images/sf.png" class = "logo">
      <?php
      $post_bt = '<button onclick="location.href=\'posts/post.php\'">Post</button>';
      if(isset($_SESSION['username']))
      {
        echo $post_bt;
      }
      
      


      ?>  
    <br><br><br>
    <div id = "main">
    <article id = "center">

        <ul>
            <nav>
                <li><a href = "index.php"> Home </a><br>
                <li><a href="About.php"> About</a><br>
                <li><a href="https://streetfighter.fandom.com/wiki/Street_Fighter_Wiki"> 
                    Fandom <image src = "images/external.svg" class = "logo"></a><br>
                <li><a href="https://www.streetfighter.com/en/"> 
                    Learn More <image src = "images/external.svg" class = "logo"></a><br>
                    
            </nav>
                    
        </ul>
    <?php
    session_start();

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    echo "<h2>Latest Discussions</h2>";
    echo '<main>';
    echo '<ul>';
    echo '<li><a href="#">Topic 1</a></li>';
    echo '<li><a href="#">Topic 2</a></li>';
    echo '<li><a href="#">Topic 3</a></li>';
    echo '<li><a href="#">Topic 4</a></li>';
    echo '<li><a href="#">Topic 5</a></li>';
    echo '</ul>';
    echo '</main>';


}
else
{

    echo "<h2>Latest Discussions</h2>";

    echo "Please Log in to use this feature";
}


    ?>




    </article>
    <article id ="right_sidebar">

    
    <br>
    
    Random Text for the boys to involve the use of testing for this website. The posts will shpow up here. This is just a place holder
    text for them to align here.


   

    
    
    </article>


    </div>
    
    
    

    <footer>
      <p>
        &copy; Any use of copyrighted material on this website is done under the Fair Use provision of the U.S. Copyright Act,
         which allows for the use of copyrighted material for criticism, comment, news reporting, teaching, scholarship, or 
         research purposes. The use of copyrighted material on this website is not intended to infringe upon the owner's rights,
          and the material is used solely for the purposes of education and research. If you believe that any content on this
           website infringes upon your copyright, please contact us to request its removal.


        <div>Icon made from <a href="http://www.onlinewebfonts.com/icon">Icon Fonts</a> is licensed by CC BY 3.0</div>
        <a target="_blank" href="https://icons8.com/icon/60664/external-link">External Link</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>
      </p>
      <div>Icon made from <a href="http://www.onlinewebfonts.com/icon">Icon Fonts</a> is licensed by CC BY 3.0</div>
    </footer>
  </body>
</html>
