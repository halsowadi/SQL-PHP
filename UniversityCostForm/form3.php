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
print '<form method="post" action="http://localhost//q2/form4.php">';

if (isset($_POST["radioGroup"])) {
  $status = $_POST["radioGroup"];
} else {
  $status = "";
}
setcookie("status", "$status");

print '<input type="radio" id="id3" name="radioGroup2" value="instate">';
print "Instate </input>";
print '<input type="radio" id="id4" name="radioGroup2" value="outstate">';
print "Out of State </input><br>";
print '<input type="submit"></input></form>';
?>
 
</body>


      
     
</html>