
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
    
    <article id ="right_sidebar">
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

    
    <br>
    
    We, the community known as "Street Fighter Discussions," are not simply an anonymous crowd of enthusiasts.
     Our passion for this remarkable franchise has brought us together from diverse backgrounds and various corners of the globe. We represent all ages and genders with a shared love for gaming; we exist to converse about our favored characters, debate over which moves reign supreme, and recount epic battles that have left impressions on each individual respectively.
    A few of us have been engaging in Street Fighter from its very origins, back when it premiered in the arcades.
    We can vividly recall our enthusiastic undertakings to master Ryu and Ken's unique techniques during those times; furthermore, we also recollect with joy taking on our companions through local multiplayer contests. For some others among us though, we've only just discovered Street Fighter via recent games or perhaps the online community. Regardless of how individuals come across this franchise that has persisted for more than three decades, there exists a shared devotion amongst all players towards it.
    Street Fighter Discussions is an inclusive community that doesn't just delve into the technical aspects of Street Fighter. 
    Our discussions are enriched with tales and characters' personalities, intricacies in their backgrounds and motives, debates on their merits and demerits as well as speculation on potential future appearances. We even share our own fan art creations along with fictional pieces which showcase unique interpretations of these beloved figures by members within our diverse group.
    Our identity doesn't just hinge on our online presence, but instead revolves around a community that thrives in person.
    This community participates in conventions and meetups with developers as well as voice actors behind the franchise to share adoration for this game. We also host events such as local tournaments or even online viewings of some recent Street Fighter shows or anime releases."
    "In the end, "Street Fighter Conversations" is not merely a fan website or an online networking platform.
    It exists as a collective of individuals who have bonded over their shared ardor for something special.
    The assembly constitutes a safe haven where we can convene and divulge our interests, narratives, and encounters with one another. Whether you are seasoned aficionado or recent convert to the series - all enthusiasts are welcomed; participate in discussions alongside us."


   

    
    
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
