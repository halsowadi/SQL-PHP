<html>
   <head>
    <style>
    body{
       background-color: grey;
      }

    td{
        text-align: left;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 25px;
      }

    tr{
        background-color:#F5F5DC;
      }
    .center{
      position: absolute;
      top: 0%;
      left: 50%;
      width: 600px;
        }
    h1{
        font-size:40px;
        }
    table{
      position: absolute;
      bottom: 0%;
      left: 50%;
      margin: -100 px 0 0 -150px;
    }
      .centerButton{
      position: absolute;
      top: 100%;
      left: 50%;
     
        }

    </style>
  </head>

<body>

<?php
if (isset($_COOKIE["credits"])) {
  $credits = $_COOKIE["credits"];
} else {
  $credits = "";
}
if (isset($_COOKIE["status"])) {
  $status = $_COOKIE["status"];
} else {
  $status = "";
}
if (isset($_COOKIE["state"])) {
  $inOrOutState = $_COOKIE["state"];
} else {
  $inOrOutState = "";
}

//Error Page
if ($credits <= 0 || $credits > 18 || $status == "" || $inOrOutState == "") {
  print "<h1>Please correct errors, credits must be between 1-18 and status and state must be selected.</h1>";
}
//Else return results
else {
  if ($status == "underGrad") {
    $statusCost = 200;
  } else {
    $statusCost = 300;
  }

  if ($inOrOutState == "outstate") {
    $statusCost = $statusCost * 2;
  }

  $cost = $statusCost * $credits;

  //Check extra packages
  if (isset($_POST["dorm"])) {
    $dorm = "yes";
    $cost = $cost + 1000;
  } else {
    $dorm = "no";
  }

  if (isset($_POST["dinning"])) {
    $dinning = "yes";
    $cost = $cost + 500;
  } else {
    $dinning = "no";
  }

  if (isset($_POST["parking"])) {
    $parking = "yes";
    $cost = $cost + 200;
  } else {
    $parking = "no";
  }

  //Create table
  print "<h1 class='center'>Here is a itemized bill</h1>";
  print "<table><tr><th>Item</th><th>Price</th></tr>";

  print "<tr>";
  print "<td><p># Credits</p></td>";
  print "<td>$credits</td>";
  print "</tr><br>";

  print "<tr>";
  print "<td><p>status</p></td>";
  print "<td>$status</td>";
  print "</tr><br>";

  print "<tr>";
  print "<td><p>in or out of state</p></td>";
  print "<td>$inOrOutState</td>";
  print "</tr><br>";

  print "<tr>";
  print "<td><p>dorm($1000)</p></td>";
  print "<td>$dorm</td>";
  print "</tr><br>";

  print "<tr>";
  print "<td><p>dinning($500)</p></td>";
  print "<td>$dinning</td>";
  print "</tr><br>";

  print "<tr>";
  print "<td><p>parking($200)</p></td>";
  print "<td>$parking</td>";
  print "</tr><br>";

  print "<tr>";
  print "<td><p>total</p></td>";
  print "<td>$cost</td>";
  print "</tr><br>";

  print "</table>";
}
?>
 
</body>
<form method="post" action="http://localhost//q2/form.php" >

      
      <input type="submit" value="Startover"class="centerButton"></input>
    </form>
</html>