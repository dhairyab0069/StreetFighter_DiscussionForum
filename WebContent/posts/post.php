<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <head>
      <link rel="stylesheet" href="../css/post.css" />
      
    </head>
    <title>POST on The Form</title>
  </head>
  <body>
    <div class="heading">POST</div>

    <form action="../validation/create_post.php" method="post">
      <label for="title">Title:</label><br />
      <input type="text" id="title" name="title" /><br />
      <label for="content">Content:</label><br />
      <textarea id="content" name="content"></textarea><br /><br />

      <div class="buttons">
        <input type="submit" value="Submit" id="submit" />
        <a href="index.php">
          <input type="submit" value="Cancel" id="Cancel"  ></a>
      </div>
    </form>
  </body>
</html>
