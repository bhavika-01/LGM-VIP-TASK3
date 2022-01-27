<?php 

session_start(); 
include "connection.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){

       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Email is required");
        exit();

    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();

    }else{
        $sql = "SELECT * FROM student WHERE stud_email='$uname' AND stud_pass='$pass'";
        $sql1="SELECT * FROM admin WHERE Admin_email='$uname' AND Admin_pass='$pass'";

        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result) === 1 ) {

            $row = mysqli_fetch_assoc($result);
            if ($row['stud_email'] === $uname && $row['stud_pass'] === $pass) {

                $_SESSION['stud_name'] = $row['stud_name'];
                $_SESSION['stud_pass'] = $row['stud_pass'];
                $_SESSION['stud_email'] = $row['stud_email'];
                $_SESSION['stud_roll'] = $row['stud_roll'];
               
                header("Location: home.php");
                exit();
            }
            else{
                header("Location: index.php?error=Incorect email or password");
                exit();
            }

        }else if(mysqli_num_rows($result1) === 1){
            $row = mysqli_fetch_assoc($result1);
            if ($row['Admin_email'] === $uname && $row['Admin_pass'] === $pass) {

                $_SESSION['Admin_email'] = $row['Admin_email'];
                $_SESSION['Admin_pass'] = $row['Admin_pass'];
                $_SESSION['Admin_name'] = $row['Admin_name'];
                $_SESSION['subject_id'] = $row['subject_id'];
                $_SESSION['subject_name'] = $row['subject_name'];


                
                   
               
                header("Location: admin.php");
                exit();
            } 
            else{
                header("Location: index.php?error=Incorect email or password");    
                exit();    
            }
        }
        else{
            header("Location: index.php?error=Incorect email or password");
            exit();
        }
    }
}
else{
    header("Location: index.php");
    echo "hello";
    exit();
}