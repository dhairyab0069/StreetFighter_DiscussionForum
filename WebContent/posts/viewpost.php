<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
$dbname = "db_27754175";




$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user_id and id are set in URL parameters
if (isset($_GET['user_id']) && isset($_GET['id'])) {
    $user_id = $_GET['user_id'];
    $id = $_GET['id'];

}
else {
    die("User ID and ID not provided in URL parameters.");
}

$sql = "SELECT * FROM posts WHERE post_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $row['title']; ?></title>
    <link rel = "stylesheet" href = "../css/postview.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <!-- Display thread -->
    <div>
        <?php

            $sql = "SELECT * FROM posts WHERE post_id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
            {   $row = mysqli_fetch_assoc($result);
                $duserid = $row['user_id'];

            }
            

            $sql = "SELECT username FROM users WHERE user_id = '{$duserid}'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
        {   $row = mysqli_fetch_assoc($result);
            $dusername = $row['username'];
            
        }

        $sql = "SELECT * FROM posts WHERE post_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

       
        

        ?>
        
        <h2><?php echo $row['title']; ?></h2>
        <p>Posted by <?php echo $dusername; ?> on <?php echo $row['created_at']; ?></p>
        <p><?php echo $row['content']; ?></p>

        
    </div>
    <?php
// Check if user has liked or disliked this post
$sql = "SELECT * FROM post_likes_dislikes WHERE post_id = $id AND user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // User has already liked or disliked the post
    $row = mysqli_fetch_assoc($result);
    $existing_action = $row['action'];

    if ($existing_action == 'like') {
        // User has liked the post
        $like_class = 'liked';
        $dislike_class = '';
    } else {
        // User has disliked the post
        $like_class = '';
        $dislike_class = 'disliked';
    }
} else {
    // User has not liked or disliked the post
    $like_class = 'not-liked';
    $dislike_class = 'not-disliked';
}

?>
    

    <form method="post" action="likepost.php">
    <input type="hidden" name="post_id" value="<?php echo $id; ?>">
    <button type="submit" name="action" value="like" class="like-button <?php echo $like_class; ?>">Like</button>
    <button type="submit" name="action" value="dislike" class="dislike-button <?php echo $dislike_class; ?>">Dislike</button>
</form>


    <?php
    

    

if ($row['user_id'] == $_SESSION['user_id'])
{
    echo '<br><a href="delete_post.php?post_id='.urlencode($row['post_id']).'"><button id="remove">Remove POST</button></a><br>' ;
} elseif (isset($_SESSION['admin'])) {
    echo '<br><a href="delete_post.php?post_id='.urlencode($row['post_id']).'"><button id="remove">Remove POST</button></a><br>' ;
}
echo '<hr>';


    ?>

        
    </div>
    

    <a href = '../index.php'>[Go Back] </a><br><br>

</body>
</html>

<?php mysqli_close($conn); ?>