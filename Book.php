<!DOCTYPE html>
<?php
session_start();
$_SESSION['loc'] = 'Book.php';
$name = $email = $comm = $gender = $doctor = "";
$con = mysqli_connect('localhost','root','') or die(mysqli_error($con));
$db = mysqli_select_db($con,'hms') or die(mysqli_error($con));
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = validate_input($_POST["name"]);
  $email = validate_input($_POST["email"]);
  $comm = validate_input($_POST["comm"]);
  $gender = validate_input($_POST["gender"]);
  $doctor = validate_input($_POST["doctor"]);
  $sql = "INSERT INTO app(name,email,gender,dname,comm) VALUES('$name','$email','$gender','$doctor','$comm');";
  if(!mysqli_query($con,$sql)){
    echo"Couldn't be added";
  }
}
function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$sql = 'SELECT * FROM doc;';
$retval = mysqli_query($con, $sql) or die(mysqli_error($con));
?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylen.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>ABC Hospital | Book Appointment</title>
  </head>
  <body>
    <div class="slant">
      <h1>ABC Hospital</h1>
      <div class="loginbox">
        <div class="glass">
          <center><img src="user.png" alt="" class="user" width="120px"></center>
          <h1>Appointment Form</h1>
          <form id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="inputbox">
              <input type="text" name="name" value="<?php echo $name;?>" placeholder="Full Name">
              <span><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <div class="inputbox">
              <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email">
              <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <div class="inputbox">
              <input type="text" name="gender" value="<?php echo $gender;?>" placeholder="Gender">
              <span><i class="fas fa-male"></i><i class="fas fa-female"></i></span>
            </div>
            <div class="inputbox">
              <select class="sel" name="doctor">
                <option value="" disabled selected>Select Doctor</option>
                <?php
                  while($row = mysqli_fetch_assoc($retval)){
                    echo "<option value=" .$row['name'] .">" .$row['name'] ."</option>";
                  }
                  mysqli_close($con);
                ?>
              </select>
              <span><i class="fas fa-user-md"></i></span>
            </div>
            <div class="inputbox">
              <textarea name="comm" rows="8" cols="72" placeholder="Comments"></textarea>
              <!--<input type="text" name="" value="" placeholder="Email">-->
              <span id="cm"><i class="fa fa-comments" aria-hidden="true"></i></span>
            </div>
            <input type="submit" name="" value="Submit">
          </form>
        </div>
      </div>
    </div>
    <div class="lout">
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ echo"<a href='logout.php'>LOGOUT</a>";} else{echo "<a href='login.htm'>LOGIN</a>";}?>
    </div>
    <div class="lout" id="main">
      <a id="main" href="main.php">HOME</a>
    </div>
  </body>
</html>
