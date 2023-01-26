<html>
<head> 
<style>
  body{
    background-color:  #ADD8E6;
  }
  div{
    position: absolute;
      top: 25%;
      left: 50%;
      margin: -100 px 0 0 -150px;
      border: 1px solid black;
      border-collapse: collapse;
      background-color: wheat;
  }
  h1{
    position: absolute;
      top: 0%;
      left: 50%;
      width: 600px;
  }
</style>
</head>

<body>
 <?php
 //Check for name cookie
 if (isset($_COOKIE["name"])) 
 { $name=$_COOKIE["name"];   
 } 
 else $name="";
 //Check for address cookie
 if (isset($_COOKIE["address"])) 
 { $address=$_COOKIE["address"];   
 } 
 else $address="";
 ?>
 
<h1> Online Ordering </h1>
   <div>
   <form method="POST" action="http://localhost/q1/customer.php">
  <label><b>Order:</b></label><br><br>
  <input type="text" name="name12" value="<?php print "$name";?>">Name</input><br><br>

   <input type="text" name="card">Card</input><br><br>
   <input type="text" name="address" value="<?php print "$address";?>">Address</input><br><br>
   <label><b>Menu:</b></label>
    <br><br>
   <input type="checkbox" name="burger"> Burger($1.50)</input> 
   <input type="checkbox" name="pizza"> Pizza($1.00)</input> 
   <input type="checkbox" name="soda"> Soda($1.00)</input><br><br>
      <input type="submit" value="Complete Order"></input>
   </form>
  </div>
   </body>
</html>
