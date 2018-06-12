<?php
  session_start();
  $_SESSION['loc'] = 'admin.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style4.css">
    <title>ABC Hospital | Administration</title>
  </head>
  <body>
    <div class="slant">
      <h1>ABC Hospital</h1>
      <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          echo "<font face='ar bonnie' size='10px'>Welcome " . $_SESSION['username'] . "! </font>";}
        else {
          header("location:login.htm");}
      ?>
      <a class="app" href="app.php">APPOINTMENT DETAILS</a>
      <a class="app" id="doc" href="docdet.php">DOCTOR DETAILS</a>
      <a class="app" id="doc2" href="doc.php">ADD DOCTOR</a>
    </div>
    <div class="lout">
      <a href="logout.php">Logout</a>
    </div>
    <div class="lout" id="main">
      <a id="main" href="main.php">HOME</a>
    </div>
  </body>
</html>
