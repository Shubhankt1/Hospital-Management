<?php
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $_SESSION['loc'] = 'doc.php'; }
  else{
    header("location:login.htm");
  }
  $name = $email = $dname = $gender = "";
  $con = mysqli_connect('localhost','root','') or die(mysqli_error($con));
  $db = mysqli_select_db($con,'hms') or die(mysqli_error($con));
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = validate_input($_POST["name"]);
    $email = validate_input($_POST["email"]);
    $dname = validate_input($_POST["dname"]);
    $gender = validate_input($_POST["gender"]);
    $sql = "INSERT INTO doc(name,email,gender,dname) VALUES('$name','$email','$gender','$dname');";
    if(!mysqli_query($con,$sql)){
      echo"Couldn't be added";
      mysqli_close($con);
    }
    mysqli_close($con);
  }
  function validate_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylen.css">
    <link rel="stylesheet" href="style6.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>ABC Hospital | Add Doctor</title>
  </head>
  <body>
    <div class="slant">
      <h1>ABC Hospital</h1>
      <div class="loginbox">
        <div class="glass">
          <center><img src="user.png" alt="" class="user" width="120px"></center>
          <h1>Doctor Details</h1>
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
              <input type="text" name="dname" value="<?php echo $dname;?>" placeholder="Department">
              <span><i class="fas fa-code-branch"></i></i></span>
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
