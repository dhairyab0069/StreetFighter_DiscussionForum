<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    //connect to database
    $host = "localhost";
    $user = "27754175";
    $password = "27754175";
    $dbname = "forum";

    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_SESSION['user_id'];

    $conn = mysqli_connect($host, $user, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    #getting thread id
    $sql = "SELECT COUNT(*) as count FROM threads";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'] +1;

    #inserting thread into database
    $stmt = $conn->prepare("INSERT INTO threads (user_id, title, body, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iss", $user_id, $title, $body);



    if (mysqli_stmt_execute($stmt)) {
        // Store the user_id in the session and redirect to success page
        header("Location: ../index.php" );
        exit();
      }


      mysqli_close($conn);


}
else{
    echo "Incorrect form submission";
}

?>