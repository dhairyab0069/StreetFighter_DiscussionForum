<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "dhairya";
$password = "db19082002";
$dbname = "forum";


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

$sql = "SELECT * FROM threads WHERE id = $id ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $row['title']; ?></title>
    <link rel = "stylesheet" href = "css/topic.css">
</head>
<body>

    <!-- Display thread -->
    <div>
        <?php

            $sql = "SELECT * FROM threads WHERE id = $id ORDER BY created_at DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
            {   $row = mysqli_fetch_assoc($result);
                $duserid = $row['user_id'];

            }
            

            $sql = "SELECT username FROM users WHERE user_id = {$duserid}";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) 
        {   $row = mysqli_fetch_assoc($result);
            $dusername = $row['username'];
            
        }

        $sql = "SELECT * FROM threads WHERE id = $id ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>
        
        <h2><?php echo $row['title']; ?></h2>
        <p>Posted by <?php echo $dusername; ?> on <?php echo $row['created_at']; ?></p>
        <p><?php echo $row['body']; ?></p>
    </div>

    <!-- Form to add comment -->
    <form action="add_comment.php" method="post">
        <input type="hidden" name="thread_id" value="<?php echo $id; ?>">
        <textarea name="body"></textarea>
        <button type="submit" name="add_comment">Add comment</button>
    </form>

    <!-- Display comments -->
    <div class = "comment">
        <?php
        $sql = "SELECT * FROM comments WHERE post_id = $id ORDER BY created_at DESC";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo '<b><i><h4>'.$row['content'].'</h4></i></b>';
            
            echo 'Posted at : '.$row['created_at'].'<br>';
            if ($row['user_id'] == $_SESSION['user_id'])
            {
                echo '<br><a href = "delete_comment.php?comment_id='.urlencode($row['comment_id']).'"><button id = "remove" '.'>Remove</button></a><br>' ;
            }
            echo '<hr>';
           /* else if ($_SESSION['admin'])
            {
                echo '<a href = "delete_comment.php?comment_id='.urlencode($row['comment_id']).'"><button id = "remove" '.'>Remove</button></a><br>' ;
            }
            echo "<br><hr>";
            echo $_SESSION['admin'];*/
        }
        ?>
        
    </div>

    <a href = '../index.php'>[Go Back] </a><br><br>

</body>
</html>

<?php mysqli_close($conn); ?>
