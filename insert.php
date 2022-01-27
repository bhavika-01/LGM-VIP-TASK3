<?php
session_start();
include "connection.php";
$s= $_SESSION['subject_id'];
$x=$_SESSION['subject_name'];
//$subject_name="Select subject_name from subject where subject_id=$s";
$sql2="SELECT subject_name from subject where subject_id='$s'";
$result = mysqli_query($conn, $sql2);
$row1=mysqli_fetch_array($result);
$x=json_encode($row1);
$y=json_decode($x);


          
        $name = $_POST['name'];
        $email= $_POST['email'];
        $Roll=$_POST['Roll'];
        $password=$_POST['password'];
        $marks=$_POST['marks'];


        $sql = "INSERT into student (stud_roll,stud_name , stud_email , stud_pass) values('$Roll','$name' , '$email' , '$password')";
        $sql1= "INSERT into subject (subject_id,subject_name , total_marks , marks_obtained , stud_roll) values('$s','$y->subject_name' ,100, '$marks' , '$Roll')";
        

        if(mysqli_query($conn,$sql)){ 
            if(mysqli_query($conn,$sql1)){


            
            // echo "<h3>data stored in a database successfully." 
            //     . " Please browse your localhost php my admin" 
            //     . " to view the updated data</h3>"; 
            header("Location: admin.php");
            }
  
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
?>