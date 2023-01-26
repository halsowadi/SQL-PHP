<html>
   <head>
    <style>
       body {
      background-color: bisque;
    }

    div {
      position: absolute;
      top: 25%;
      left: 50%;
      margin: -100 px 0 0 -150px;
    }

    .center {
      text-align: center;
    }

    td {
      text-align: left;
    }

    h1 {
      position: absolute;
      top: 0%;
      left: 45%;
      width: 600px;
    }
    </style>
  </head>

<body>

<?php
if (isset($_POST["radioGroup2"])) {
  $inOrOutState = $_POST["radioGroup2"];
} else {
  $inOrOutState = "";
}
print '<form method="post" action="http://localhost//q2/university.php">';
setcookie("state", "$inOrOutState");

print "<label>Additional packages: </label>";
print '<input type="checkbox" id="id5" name="dorm"> Dorm </input>';
print '<input type="checkbox" id="id6" name="dinning"> Dinning </input>';
print '<input type="checkbox" id="id7" name="parking"> Parking </input>';
print '<input type="submit"></input></form>';
?>
 
</body>


      
   

</html>