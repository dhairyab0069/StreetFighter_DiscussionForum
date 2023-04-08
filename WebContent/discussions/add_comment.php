<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // database connection information
    $host = "localhost";
    $user = "27754175";
    $password = "27754175";
    $dbname = "db_27754175";

    $thread_id = $_POST['thread_id'];
    $body = $_POST['body'];
    $user_id = $_SESSION['user_id'];

    // connect to the database
    $conn = mysqli_connect($host, $user, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // add new comment
    $stmt = $conn->prepare("INSERT INTO comments (user_id, post_id, content, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iis", $user_id, $thread_id, $body);

    // Execute the SQL statement
    if (mysqli_stmt_execute($stmt)) {
        // Return the updated comments section as JSON data
        $sql = "SELECT * FROM comments WHERE post_id = $thread_id ORDER BY created_at DESC";
        $result = $conn->query($sql);

        $comments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comment = array(
                    'user_id' => $row['user_id'],
                    'content' => $row['content'],
                    'created_at' => $row['created_at']
                );
                array_push($comments, $comment);
            }
        }

        echo json_encode($comments);
    }

    mysqli_close($conn);
    exit();
}
?>

<script>
    document.getElementById('comment-form').addEventListener('submit', function(event) {
        event.preventDefault();
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_comment.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Update the comments section with the new comment
                var comments = JSON.parse(xhr.responseText);
                var commentsList = document.getElementById('comments-list');
                commentsList.innerHTML = '';
                for (var i = 0; i < comments.length; i++) {
                    var comment = comments[i];
                    var listItem = document.createElement('li');
                    listItem.innerHTML = '<strong>User ID:</strong> ' + comment.user_id + '<br><strong>Comment:</strong> ' + comment.content + '<br><strong>Timestamp:</strong> ' + comment.created_at;
                    commentsList.appendChild(listItem);
                }
                // Clear the comment form
                document.getElementById('body').value = '';
            } else {
                alert('There was a problem adding your comment.');
            }
        };
        xhr.send('thread_id=' + document.getElementById('thread_id').value + '&body=' + document.getElementById('body').value);
    });
</script>
