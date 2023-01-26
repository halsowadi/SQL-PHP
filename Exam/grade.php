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
        margin-left: 550px;
        margin-right: 500px;
        width: 1200px;
        height: auto;
        }
    h1{
        font-size:40px;
        margin:auto;
        }
    table{
        margin: auto;
    }

    </style>
  </head>

<body>

<?php
   session_start(); 
        $userCode = (int)$_SESSION["code"];
        $timeAllowed =$_SESSION["timeAllowed"];
        $currentTime = time();

        $db = mysqli_connect("127.0.0.1", "root", "Chicken1!", "examDB");
        $correct=0;
        
        $query = "SELECT * FROM students WHERE code=$userCode";
        $result = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($result);
          //Check and see correct answers
          for ($i = 0; $i < $num_rows; $i++)
          {
            $row = mysqli_fetch_assoc($result);
            $iscompleted=$row["complete"];
          }
          //if exam is not completed
          if ($iscompleted==0){
            //check time
            if ($timeAllowed >= $currentTime){
          $query = "SELECT * FROM exam";
          $result = mysqli_query($db, $query);
          $num_rows = mysqli_num_rows($result);
  
          //Check and see correct answers
          for ($i = 0; $i < $num_rows; $i++)
          {
            $answer =$_GET["$i"];
            $row = mysqli_fetch_assoc($result);
            if (isset($_GET["$i"])){
              if($answer==$row["correct"]){
             $correct=$correct+1;
              }
            
            }
          }
        }else {
          $correct=0;
          print("You have exeeded the allowed time". "<br>");
        }
    $query = "UPDATE students SET complete=1, score=$correct WHERE code=$userCode";
    $result = mysqli_query($db, $query);
          print("your score is".$correct. "/3");
        }else print("Exam already completed");

   ?>

 
</body>
</html>