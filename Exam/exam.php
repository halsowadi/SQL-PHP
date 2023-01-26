<html>
<head> 
<style>
 body{
       background-color: grey;
      }

      table  {
        position: absolute;
        width: 1000px;
        height:500px;
        top: 50%;
        left: 40%;
        margin: -100px 0 0 -150px;
        background-color:white;
      }
      td{
        padding:5px;
        margin:5px;
        text-align:left;
      }
    
      th{
        padding:5px;
        margin:5px;
        text-align:left;
      }
      tr{
        padding:5px;
        margin:5px;
        text-align:left;
      }
  
    h1{
        font-size:40px;
        margin:auto;
        }
 
    a{
      color:white;
      font-size:20px;

    }
    a:visited {
      color:black;

    }
    h1{
      position: absolute;
        width: 700px;
        top: 5%;
        left: 50%;
    }
</style>
</head>

<body><table>
  
   <?php
      session_start(); 
      date_default_timezone_set("America/New_York");
      $currentTime = date("h:i:sa");
      $currentTimeInSecs = time();
      $_SESSION["time"] = $currentTimeInSecs; 
      //well say timelimit is 30 seconds
      $totalTimeAllowed = $currentTimeInSecs+(60*3);
      $_SESSION["timeAllowed"] = $totalTimeAllowed; 


       //Check if passcode matches
        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "examDB");
        $passcode = (int)$_POST["passcode"];
        $_SESSION["code"] = $passcode;
        $query = "SELECT * FROM students";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if ($passcode == $row["code"]){
             $match=true;
              break;
            }
            else {$match=false;}        
        }



        //update complete
        $query = "SELECT * FROM students WHERE code=$passcode";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if (1 == $row["complete"]){
             $completed=1;
              break;
            }
            else {$completed=0;}        
        }


        //update seen
        $query = "SELECT * FROM students WHERE code=$passcode";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            if (1 == $row["seen"]){
            $seen=1;
            break;
            }else {$seen=0;}        
             }



        if ($seen==1 && $completed!=1){
          print("Exam has been already seen but never submitted, your score is a 0");
          //SET SCORE TO 0
          $query = "UPDATE students SET  score=0 WHERE code=$passcode";
          $result = mysqli_query($db, $query);
        }

        //Check if passcode matches and exam is uncompleted
        else if ($match==1 && $completed!=1){
        //Update Seen
       
        print("<h1>Exam</h1>");
        print("<table>");
        print('<form method="GET" action="http://localhost/q3/grade.php">');
          
        //Return questions and aswers from DB  
        $query = "SELECT * FROM exam";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
        for ($i = 0; $i < $num_rows; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $question = $row["question"];
            $answer1 = $row["answer1"];
            $answer2 = $row["answer2"];
            $answer3 = $row["answer3"];
            print "<tr><th>";
            print "$question";
            print "</th>";
            //creating  dymanic radio button
            print("<td id='q'><input type='radio' value= $answer1 name=$i> $answer1</input></td>");
            print("<td id='q'><input type='radio' value= $answer2 name=$i> $answer2</input></td>");
            print("<td id='q'><input type='radio' value= $answer3 name=$i> $answer3</input></td></tr>");          
        }
        print('<tr><td><input type="submit" value="submit"></input></form></td</tr>');
        print("<tr><td>".$currentTime."</td></tr>");
        print("<tr><td> Your allowed 3 minutes to complete the exam</td></tr>");
        print("</table>");
      
         //UPDATE SEEN
         $query = "UPDATE students SET seen=1 WHERE code=$passcode";
         $result = mysqli_query($db, $query);
   
        }
        else if ($match==1 && $completed==1){
          print("Already completed");
        }
        else if ($match!=1){print("incorrect id or password");}
        ?>
           
        </body>
        </html>