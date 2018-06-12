<!DOCTYPE html>
<?php
$name = $password = "";
$con = mysqli_connect('localhost','root','') or die(mysqli_error($con));
$db = mysqli_select_db($con,'hms') or die(mysqli_error($con));
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = validate_input($_POST["username"]);
  $password = validate_input($_POST["password"]);
  $sql = "INSERT INTO users(username,password) VALUES('$name','$password');";
  if(!mysqli_query($con,$sql)){
    echo mysqli_error($con);
    echo"Couldn't be registered";
  }
  else{
    header("location:login.htm");
  }
}
function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
