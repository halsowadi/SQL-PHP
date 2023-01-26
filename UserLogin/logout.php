<html>
<head> 
<style>
   div{
      position: absolute;
        width: 700px;
        top: 50%;
        left: 50%;
        margin: -100px 0 0 -150px;
   }

</style>
</head>

<body>
   <?php
   session_start();
   $ID= $_SESSION["ID"];
   //unsetting ID
   unset($_SESSION["ID"]);
   $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "logindb");

     //SET DATE
     date_default_timezone_set("America/New_York");
     $date=date("Y/m/d h:i:sa");

    //select vists and Increment
    $query = "SELECT visits FROM users WHERE id='$ID'";
    $result = mysqli_query($db, $query);
    $num_rows = mysqli_num_rows($result);
    //get # of visits
    for ($i = 0; $i < $num_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        //Increment Visits
        $visits=$row["visits"] +1;        
    }
    //Update user 
    $query = "UPDATE users SET visits='$visits', last='$date' WHERE id='$ID'";
    $result = mysqli_query($db, $query);
?>
<div>
<h1>Your Logged Out, please login again</h1>
   <table>
   <form method="POST" action="http://localhost/q4/login.php">
   </table>
   <br>
   <input type="text" name="ID">ID</input>
   <input type="text" name="password">password</input><br>
      <input type="submit" value="login"></input>
   </form>
   </div>
  </body>
</html>