<?php
include "connection.php";
          
        $name = $_POST['name'];
        $marks= $_POST['marks'];
        $rollno=$_POST['roll_no'];
        $sub_id=$_POST['subject_id'];

        $sql = "UPDATE subject SET marks_obtained=$marks WHERE stud_roll=$rollno and subject_id=$sub_id";
          
        if(mysqli_query($conn,$sql)){
            // echo "<h3>data stored in a database successfully." 
            //     . " Please browse your localhost php my admin" 
            //     . " to view the updated data</h3>"; 
            header("Location: admin.php");
  
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
?>