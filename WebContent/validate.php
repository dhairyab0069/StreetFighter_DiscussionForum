$db = mysqli_connect('localhost', 'root', '', 'mydatabase');
if (!$db) {
  die('Failed to connect to database: ' . mysqli_connect_error());
}