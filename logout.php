<?php
  session_start();
  if($_SESSION['loc'] == 'admin.php' || $_SESSION['loc'] == 'app.php' || $_SESSION['loc'] == 'docdet.php' || $_SESSION['loc'] == 'doc.php'){
    header("location:login.htm"); }
  else{
    header("location:" .$_SESSION['loc']); }
  session_unset();
?>
