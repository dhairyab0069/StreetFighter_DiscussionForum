<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>

<html>
  <head>
    <title>Create New Thread</title>
  </head>
  <body>
    <h1>Create New Thread</h1>
    <form method="post" action="add_thread.php">
      <label for="title">Thread Title:</label><br>
      <input type="text" id="title" name="title" required><br><br>
      <label for="body">Thread Body:</label><br>
      <textarea id="body" name="body" rows="10" cols="50" required></textarea><br><br>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>