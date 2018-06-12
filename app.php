<?php
  session_start();
  $_SESSION['loc'] = 'app.php';
  if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    header("location:login.htm"); }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylen2.css">
    <title>ABC Hospital | Appointment Details</title>
  </head>
  <body>
    <div class="contain">
      <h1>ABC Hospital</h1>
        <?php
          $con = mysqli_connect('localhost','root','') or die(mysqli_error($con));
          $db = mysqli_select_db($con,'hms') or die(mysqli_error($con));
          $sql = 'SELECT * FROM app;';
          $retval = mysqli_query($con, $sql) or die(mysqli_error($con));
          if(mysqli_num_rows($retval) > 0){
            echo "<div class='res'><table>
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>EMail</th>
                  <th>Gender</th>
                  <th>Doctor</th>
                  <th>Comment</th>
                  </tr>";
            while($row = mysqli_fetch_assoc($retval)){
              echo"<tr>";
              echo"<td>" .$row["id"] ."</td>";
              echo"<td>" .$row["name"] ."</td>";
              echo "<td>" .$row["email"] ."</td>";
              echo "<td>" .$row["gender"] ."</td>";
              echo "<td>" .$row["dname"] ."</td>";
              echo "<td>" .$row["comm"] ."</td>";
            }
            echo "</table></div>";
              //echo "<tr><td>".$row["id"] ."</td><td>".$row["name"]."</td><td>".$row["age"]."</td></tr>";
              //echo "ID: " .$row["id"] ."  - Name: " .$row["name"] ."  - Age: " .$row["age"] ."<br>";
          }else
            echo "0 Results";

        mysqli_close($con);
        ?>
      </table>
    </div>
    <div class="lout">
      <a href="logout.php">Logout</a>
    </div>
    <div class="lout" id="main">
      <a id="main" href="main.php">HOME</a>
    </div>
  </body>
</html>
