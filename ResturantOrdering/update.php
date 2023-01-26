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

<?php

     $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "orderDB");
     $id = $_POST["delete1"]; 
     $query = "DELETE FROM orders WHERE id=$id";
     $result = mysqli_query($db, $query);
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

     
 ?>

</table>
   <div>
    <form method="POST" action="http://localhost//q14/update.php">

      <input type="text" name="delete1">Delete</input><br>
      <input type="submit"></input>
    </form>
    </div>
</body>
</html>