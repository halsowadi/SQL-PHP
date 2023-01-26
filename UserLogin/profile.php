<html>
<head> 
<style>
 body{
       background-color: grey;
      }

      table  {
  border: 1px solid black;
  border-collapse: collapse;
      }

    tr{
        background-color:beige;
      }
      td{
        padding:10px;
        font-size:20px;
        margin:5px;
        text-align:left;
      }
      th{
        padding:10px;
        margin:5px;
        text-align:left;
      }
   
    h1{
        font-size:40px;
        margin:auto;
        }
    table{
        margin: auto;
    }
    span {
      background-color:lightblue;
      border: 1px solid black;
      border-collapse: collapse;
      color:white;
      width: 30px;
      height:13px;
    }
    a{
      color:white;
      font-size:20px;

    }
    a:visited {
      color:black;

    }
</style>
</head>

<body>
   <?php
   session_start(); 
   if(isset($_SESSION["ID"])){
    $ID= $_SESSION["ID"];
    $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "logindb");
    $query = "SELECT * FROM users WHERE id='$ID'";
    $result = mysqli_query($db, $query);
    $num_rows = mysqli_num_rows($result);
    //get # of visits
    for ($i = 0; $i < $num_rows; $i++)
    {
        $row = mysqli_fetch_assoc($result);
       print("<table><tr><th>Something</th><th>Value:</th></tr>");
       print("<tr><td>ID</td><td>".$row['id']."</td></tr>");
       print("<tr><td>Name</td><td>".$row['name']."</td></tr>");
       print("<tr><td>email</td><td>".$row['email']."</td></tr>");
       print("<tr><td>visits</td><td>".$row['visits']."</td></tr>");
       print("<tr><td>Last</td><td>".$row['last']."</td></tr>");
       
       print('<span><a href="http://localhost/q4/profile.php">profile</a></span>');
       print('<span><a href="http://localhost/q4/home.php">Home</a></span>');
       print('<span><a href="http://localhost/q4/logout.php">Logout</a></span>');
       print("</table>"); 
   
    }



   }else print("not logged in");
?>
   
  </body>
</html>