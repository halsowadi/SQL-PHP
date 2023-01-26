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
$credits = $_POST["credits"];
setcookie("credits", "$credits");
print '<form method="post" action="http://localhost//q2/form3.php">';
print '<input type="radio" id="id1" name="radioGroup" value="underGrad">';
print "UnderGrad </input>";
print '<input type="radio" id="id2" name="radioGroup" value="PostGrad">';
print "PostGrad </input><br>";
print '<input type="submit"></input></form>';
?>
 
</body>
 

      
      
</html>