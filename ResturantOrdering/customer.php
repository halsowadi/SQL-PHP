<html>
<head> 
<style>
   body{
      background-color:  #ADD8E6;

   }
   h1 {
      text-align: center;
   }
   table {
      background-color:white;
      width: 350px; 
      border-style: solid; border-color: black; border-width: 2px; 
      border-collapse: collapse;
      position: absolute;
      top: 25%;
      left: 50%;
      margin: -100 px 0 0 -150px;
      border: 1px solid black;
      padding:8px;
   }
   td {
      background-color:white;
      padding:8px;
   }
   .center{
      position: absolute;
      top: 22%;
      left: 50%;
      margin: -100 px 0 0 -150px;

   }
</style>
</head>

<body>
   <h1> Recipt </h1>

   <table>

   <?php
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "orderDB");
        
        //Getting data from form
        $name = $_POST["name12"];
        $card = $_POST["card"];
        $address = $_POST["address"];
        //Setting Cookies
        setcookie("name", $name, time()+30*24*60*60);
        setcookie("address", $address,time()+30*24*60*60);

        $burger=(int)isset($_POST["burger"]);
        $pizza = (int)isset($_POST["pizza"]);
        $soda = (int)isset($_POST["soda"]);
        $total=0;
        //Insert into DB
        $query = "INSERT INTO orders(name,card,address,burger,pizza,soda) VALUES('$name', '$card','$address','$burger','$pizza','$soda')";
        $result = mysqli_query($db, $query);
         //Creating a recipt
        print("<div class='center'>");
        print("<label><b>Recipt</b></label>");
        print("</div>");
        print("<table>");
        print("<tr><td>Name</td>");
        print("<td>".$name. "</td></tr>");
        print("<tr><td>Card</td>");
        print("<td>".$card. "</td></tr>");
        print("<tr><td>Address</td>");
        print("<td>".$address. "</td></tr>");
        print("<tr><td>Burger</td>");
        print("<td>");
        if($burger==1){
        print("$1.50");
        $total= $total+1.5;
        }else print("$0");
        print("</td></tr>");

        print("<tr><td>pizza</td>");
        print("<td>");
        if($pizza==1){
        print("$1");
        $total= $total+1;
        }else print("$0");
        print("</td></tr>");

        print("<tr><td>soda</td>");
        print("<td>");
        if($soda==1){
        print("$1");
        $total= $total+1;
        }else print("$0");
        print("</td></tr>");

        print("<tr><td>total</td>");
        print("<td>");
        print("$".$total);
        print("</td></tr>");
        print("</table>");

   ?>

   </table>
   <br>
   </body>
</html>


