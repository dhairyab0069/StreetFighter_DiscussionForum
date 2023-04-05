<?php
session_start();


if (isset($_POST['username']) && isset($_POST['password']))
 {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password))
     {
        echo "Please enter both username and password";
    } 
    else 
    {
        
        $servername = "localhost";
        $dbusername = "dhairya";
        $dbpassword = "db19082002";
        $dbname = "forum";

        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) 
        {   
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            if(intval($row['user_id']/1000) == 3 ){
                $_SESSION['admin'] = true;
            }
            else{
                $_SESSION['admin'] = false;
                // Redirect to the admin login page
                header("Location: ../admin_login.php");
                exit();
            }
            // Redirect to the home page
            header("Location: ../index.php");
            exit();
        }
         else 
        {
            echo "Incorrect username or password";
        }

        mysqli_close($conn);
    }
}
 else 
 {
    echo "Incorrect";
}

?>
