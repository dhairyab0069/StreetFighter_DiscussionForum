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
        
        $file = fopen("usernames.txt", "r");
        $headers = fgetcsv($file);
        $data = array();
        while ($row = fgetcsv($file)) {
            $data[] = array_combine($headers, $row);
        }
        fclose($file);

        
        $match = false;
        foreach ($data as $user) {
            if ($user['username'] == $username && $user['password'] == $password) 
            {
                $match = true;
                break;
            }
        }

        if ($match)
         {
            $_SESSION['username'] = $username;
            echo "<p style='color:green;'>Login Sucessful</p>";
            header("Location: ../index.php");
            exit();
        }
         else 
        {
            echo "Incorrect username or password";
        }
    }
}
 else 
 {
    echo "Incorrect";
}

?>