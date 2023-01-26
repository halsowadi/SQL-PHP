<html>
<head> 
<style>

</style>
</head>

<body>
   <?php
 
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "logindb");
        $ID = $_POST["ID"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $email = $_POST["email"];



        $query = "SELECT * FROM users";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);

        //check if id already exists
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if ($ID == $row["id"]){
             $match=true;
              break;
            }
            else {$match=false;}        
        }
        //Check boolean for match
        if ($match==1){
        
          print "user already exists";
  
         
        }
        else {
          $query = "INSERT INTO users(id,password,name,email, visits, last) VALUES('$ID', '$password', '$name', '$email', 0, 'NA')";
          $result = mysqli_query($db, $query);
          print("account created");

        }



?>
 <form method="GET" action="http://localhost/q4/login.html">

   <input type="submit" value="login"></input>

   </form>
      </body>
      </html>



        