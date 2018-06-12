<?php
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  $con = mysqli_connect("localhost", "root", "") or die(mysqli_error($con));
  $db = mysqli_select_db($con,'hms') or die(mysqli_error($con));
  $sql = "SELECT * FROM users WHERE username = '$username' and password = '$password';";
  $result = mysqli_query($con,$sql);
  $count = mysqli_num_rows($result);
  if($count<1){echo "Wrong Username or Password";}
  else
  	{
  		$_SESSION[username]=$username;
      $_SESSION[loggedin] = true;
      $_SESSION[loc] = 'admin.php';
  		header("location:" .$_SESSION['loc']);
  	}
  mysqli_close($con);
?>
