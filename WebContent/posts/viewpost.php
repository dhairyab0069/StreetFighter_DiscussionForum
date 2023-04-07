<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$host = "localhost";
$user = "27754175";
$password = "27754175";
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

$sql = "SELECT * FROM posts WHERE post_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $row['title']; ?></title>
    <link rel = "stylesheet" href = "../css/postview.css">
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

    <!-- Form to add comment -->
    

    <!-- Display comments -->

        
    </div>

    <a href = '../index.php'>[Go Back] </a><br><br>

</body>
</html>

<?php mysqli_close($conn); ?>