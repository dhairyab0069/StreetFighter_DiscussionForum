<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'comments.php';

$host = "localhost";
$user = "dhairya";
$password = "db19082002";
$dbname = "forum";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get all threads in topic 1
$sql = "SELECT * FROM threads WHERE id = 1 ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Topic 1</title>
    <link rel = "stylesheet" href = "css/topic.css">
</head>
<body>
	<h1>Topic 1</h1>

	<!-- Display all threads in topic 1 -->
	<?php while($row = mysqli_fetch_assoc($result)): ?>
		<div>
			<h2><a href="posts.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h2>
			<p>Posted by <?php echo $row['user_id']; ?> on <?php echo $row['created_at']; ?></p>
			<p><?php echo $row['body']; ?></p>
		</div>
	<?php endwhile; ?>

    <form action="comments.php" method="post">
    <input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>">
    <textarea name="body"></textarea>
    <?php if (isset($errors['body'])): ?>
        <div><?php echo $errors['body']; ?></div>
    <?php endif; ?>
    <button type="submit" name="add_comment">Add comment</button>
    </form>


</body>
</html>

<?php mysqli_close($conn); ?>
