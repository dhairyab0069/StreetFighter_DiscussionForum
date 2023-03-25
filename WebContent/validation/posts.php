<?php
// Set up database connection
$servername = "cosc360.ok.ubc.ca";
$username = "username";
$password = "password";
$dbname = "mydatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Store form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $image = $_FILES["image-input"]["name"];

    // Upload image file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image-input"]["name"]);
    move_uploaded_file($_FILES["image-input"]["tmp_name"], $target_file);

    // Insert data into database
    $sql = "INSERT INTO posts (title, content, image) VALUES ('$title', '$content', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "New post created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>