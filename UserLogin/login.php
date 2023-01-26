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

      tr {
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
 
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "logindb");
        $ID = $_POST["ID"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);

        //check if id & password matches
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if ($ID == $row["id"] && $password == $row["password"]){
              $name = $row["name"];
             $match=true;
              break;
            }
            else {$match=false;}        
        }
        //Check if login for match
        if ($match==1){
        //setting id & name session
         $_SESSION["ID"] = $ID;
         $_SESSION["name"] = $name;
         
        //Homepage
        $ID=$_SESSION["ID"];
        $name = $_SESSION["name"];
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "loginDB");
        //if session is set
        if(isset($_SESSION["ID"])){
               
        print('<span><a href="http://localhost/q4/profile.php">profile</a></span>');
        print('<span><a href="http://localhost/q4/home.php">Home</a></span>');
        print('<span><a href="http://localhost/q4/logout.php">Logout</a></span>'); 
        print("<h1>Welcome $name</h1>");
        }else print("error not logged in"); 
        
      }else print("incorrect id or password");
        ?>
        </body>
        </html>