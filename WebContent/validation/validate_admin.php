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
        $dbusername = "27754175";
        $dbpassword = "27754175";
        $dbname = "db_27754175";

        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);


        if (mysqli_num_rows($result) > 0) 
        {   
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id'];
            if(intval($row['user_id']/1000) == 3 ){
                $_SESSION['admin'] = 'admin';
                header("Location: ../index.php");
                exit();
            }
            else{
                // Redirect to the admin login page
                
                $_SESSION['error'] ='Not an admin ';
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
