<html>
   <head>
    <style>
   body{
       background-color: bisque;

      }
      tr{
        background-color:#D3d3d3;
      }
      td{
        text-align: left;
        padding: 25px;
      }
      th{
        text-align: left;
        padding: 25px;
      }
      .center{
        margin-left: 800px;
        margin-top:300px;
        width: 1200px;
        height: auto;
        }
     
      div {
        margin:auto;
      }
  </style>
  </head>

<body>

<?php
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "examDB");
        //Get the passcode
        $passcode = $_POST["password"];
        $query = "SELECT * FROM password";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);

        //check if passcode matches
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if ($passcode == $row["password"]){
             $match=true;
              break;
            }
            else {$match=false;}        
        }
        //Check boolean for match
        if ($match==1){
          $query = "SELECT * FROM students";
          $result = mysqli_query($db, $query);
          $num_rows = mysqli_num_rows($result);
          print("<div class='center'>");
          print("<h1>Exam Results</h1>");
          print "<table>
          <tr> <th>Name</th> <th>Code</th> <th>Completed</th> <th>Score</th></tr>";
  
          //return results
          for ($i = 0; $i < $num_rows; $i++){
          $row = mysqli_fetch_assoc($result);
          $name = $row["name"];
          $code = $row["code"];
          $taken = $row["complete"];
          if($taken==1){
            $completed="True";
          }else $completed="False";

          $score = $row["score"];
          $totalScore= round(($score/3)*100);
          print "<tr><td>".$name."</td>";
          print "<td>".$code. " </td>";
          print "<td>".$completed. " </td>";
          print "<td>".$totalScore."% </td>";
          print"</tr>";
        }
      }else print("incorrect password");
 
   ?>

 
</body>
    </table>
    </div>
</html>