<html>
<head> 
<style>
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
    body{
      background-color:grey;
    }
    h1{
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
   $ID=$_SESSION["ID"];
   $name = $_SESSION["name"];
 
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "loginDB");
      
        //if session is set
        if(isset($_SESSION["ID"])){
          
          print('<span><a href="http://localhost/q4/profile.php">profile</a></span>');
          print('<span><a href="http://localhost/q4/home.php">Home</a></span>');
          print('<span><a href="http://localhost/q4/logout.php">Logout</a></span>'); 
           print("<h1>Welcome $name</h1>");
        }
        else print("error not logged in"); 
      
      ?>
      
  </body>
 
</html>