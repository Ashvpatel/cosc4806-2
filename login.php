<?php

session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 1) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>

  <body>

    <h1>Login Form</h1>

    <form action="/validate.php" method = "post">
      <label for="username">Username:</label>
      <br>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <br>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Submit">
    </form>

  </body>
</html>