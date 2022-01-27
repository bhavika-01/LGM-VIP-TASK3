<?php 

session_start();
include "connection.php";


if (isset($_SESSION['stud_email']) && isset($_SESSION['stud_pass'])) {
    

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
  body{
    background-color:#95D1CC;

  }
  .btn{
    margin:20px;
  }
 
</style>
  
  


</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<h1 class="text-center">Result</h1>
<dl class="row" style="font-size:x-large">
  <dt class="col-sm-2  fw-bold" >Name</dt>
  <dd class="col-sm-10 "><?php echo $_SESSION['stud_name']?></dd>
  

  <dt class="col-sm-2 fw-bold" >Email-id</dt>
  <dd class="col-sm-10 "><?php echo $_SESSION['stud_email']?></dd>
 

  <dt class="col-sm-2  fw-bold">Roll no</dt>
  <dd class="col-sm-10"><?php echo $_SESSION['stud_roll']?></dd>
 


  
</dl>
     <div class="container">
     <div class="row justify-content-center mt-5">
     <div class="col-8">
     <table class="table table-hover">
     <thead class="table-dark">
     <tr>
          <th scope="col">Id</th>
          <th scope="col">Subject</th>
          <th scope="col">Total marks</th>
          <th scope="col">Marks obtained</th>
     </tr>
     </thead>

     <?php 
     $roll_no=$_SESSION['stud_roll'];
     $sql = "SELECT * FROM subject WHERE stud_roll=$roll_no";
     $result = mysqli_query($conn, $sql); 
     $total=0;
     while($row = $row = $result->fetch_assoc())
     
       {
          echo "<tr>";

          echo "<td>" . $row['subject_id'] . "</td>";
        
          echo "<td>" . $row['subject_name'] . "</td>";
        
          echo "<td>" . $row['total_marks'] . "</td>";
        
          echo "<td>" . $row['marks_obtained'] . "</td>";
        
          echo "</tr>"; 

          $total=$total+$row['marks_obtained'];
     
       }
     
     echo "</table>";

     echo  "<h3>Total Marks Of the Student Are:$total</h3>";
     
     ?>
     </div>
     </div>
     </div>

     <a href="logout.php" class="btn btn-dark d-grid gap-2 col-2 mx-auto" role="button">Logout</a>

</body>

</html>

<?php 

}
else{

     header("Location: index.php");

     exit();

}

 ?>