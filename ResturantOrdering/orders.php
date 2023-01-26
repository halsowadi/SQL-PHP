<html>
   <head>
    <style>
    body{
       background-color: grey;
      }

      table  {
        border: 5px solid black;
  border-collapse: collapse;
      }

    tr{
        background-color:white;
      }
   
    h1{
        font-size:40px;
        margin:auto;
        }
    table{
        margin: auto;
    }
    div {
      margin-left:1100px;
      margin-top:100px;
    }

    </style>
  </head>

<body>
<h1 class="center">Admin Page</h1><br>
<?php
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "orderDB");
        //Get passcode
        $passcode = $_POST["password"];
        $query = "SELECT * FROM password";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
        //check to see if it matches
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if ($passcode == $row["password"]){
              $match =true;
              break;
            }
            else {$match=false;}        
        }
        //Boolean for matching
        if($match==1){
          print("<h1>Success</h1>");
          $query = "SELECT * FROM orders";

          $result = mysqli_query($db, $query);
  
          $num_rows = mysqli_num_rows($result);
          //Pint orders
          for ($i = 0; $i < $num_rows; $i++)
          {
              $row = mysqli_fetch_assoc($result);
            $id = $row["id"];
            $name= $row["name"];
            $card = $row["card"];
            $address = $row["address"];
            $burger = (int)$row["burger"];
            $pizza = (int)$row["pizza"];
            $soda = (int)$row["soda"];
            print("<table>");
            print("<tr><td> Order ID:".$id."</td></tr>");
            print("<tr><td> Name:".$name."</td></tr>");
            print("<tr><td> Card:".$card."</td></tr>");
            print("<tr><td> Address:".$address."</td></tr>");
            if ($burger==1){
            print("<tr><td> Burger: Yes <td></tr>");
            }
            else print("<tr><td> Burger: No </td></tr>");
            if ($pizza==1){
              print("<tr><td> pizza: Yes </td></tr>");
              }
              else print("<tr><td> pizza: No </td></tr>");
              if ($soda==1){
                print("<tr><td> soda: Yes </td> </tr>");
                }
                else print("<tr><td> soda: No </td> </tr>");
                print("<br><br>");
        }
         
            print("</table><div>");
            print('<form method="POST" action="http://localhost//q14/update.php">');
            print('<input type="text" name="delete1">Delete</input><br>');
            print('<input type="submit"></input>');
            print('</form></div>');}
            else print("<h1>Incorrect passcode</h1>");
        
   ?>
 
</body>
</html>