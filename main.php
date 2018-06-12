<!DOCTYPE html>
<?php
  session_start();
  $_SESSION['loc'] = 'main.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylen1.css">
    <title>ABC Hospital</title>
  </head>
  <body>
    <section class="wave">
      <h1>ABC Hospital</h1>
      <a class="app" href="Book.php">BOOK AN APPOINTMENT</a>
    </section>
    <div class="lout">
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ echo"<a href='logout.php'>LOGOUT</a>";} else{echo "<a href='login.htm'>LOGIN</a>";}?>
    </div>
    <div class="lout" id="main">
      <a id="main" href="admin.php">ADMIN</a>
    </div>
  </body>
</html>
