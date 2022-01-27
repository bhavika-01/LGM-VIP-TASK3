<?php 

session_start();
include "connection.php";


if (isset($_SESSION['Admin_email']) && isset($_SESSION['Admin_pass'])) {
    

 ?>

<!DOCTYPE html>

<html>

<head>

    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
  body{
    background-color:#95D1CC;

  }
  #p1 {
  font-family: "Times New Roman", Times, serif;
  padding-top:30px;
}
#p2 {
  font-family: "Times New Roman", Times, serif;
}
#p3 {
  font-family: "Times New Roman", Times, serif;
}
#p4 {
  font-family: "Times New Roman", Times, serif;
}
#p5 {
  font-family: "Times New Roman", Times, serif;
}
 
</style>
   


</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form action="update.php" method="post">
        <?php if (isset($_GET['error'])) { ?>

          <p class="error"><?php echo $_GET['error']; ?></p>

          <?php } ?>
          <div class="mb-3">
            <label for="Name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="Marks" class="col-form-label">Marks Obtained:</label>
            <input type="text" class="form-control" id="marks" name="marks">
          </div>
          <input type="hidden" name="roll_no" id="rollno">
          <input type="hidden" name="subject_id" id="subject_id" value="<?php echo $_SESSION['subject_id']?>">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>
<script>
  var exampleModal = document.getElementById('exampleModal')
          exampleModal.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          var button = event.relatedTarget
          // Extract info from data-bs-* attributes
          var name = button.getAttribute('data-bs-name')
          var marks = button.getAttribute('data-bs-marks')
          var rollno = button.getAttribute('data-bs-rollno')
          
          var modalTitle = exampleModal.querySelector('.modal-title')
          var modalBodyInput1 = exampleModal.querySelector('.modal-body input#name')
          var modalBodyInput2 = exampleModal.querySelector('.modal-body input#marks')
          var modalBodyInput3 = exampleModal.querySelector('.modal-body input#rollno')

          modalTitle.textContent = 'Student Roll no ' + rollno
          //   modalBodyInput1.value = name
          //   modalBodyInput2.value = marks
               modalBodyInput3.value = rollno

          })
</script>
 <h1 class="text-center" id=p1>Admin Details</h1>
 <dl class="row" style="font-size:x-large">
  <dt class="col-sm-2  fw-bold" id=p2 > Teacher Name :</dt>
  <dd class="col-sm-10 " id=p3><?php echo $_SESSION['Admin_name']?></dd>
  

  <dt class="col-sm-2 fw-bold" id=p4>Email-id:</dt>
  <dd class="col-sm-10 " id=p5><?php echo $_SESSION['Admin_email']?></dd>
  
  


  
</dl>
     <div class="container">
     <div class="row justify-content-center mt-5">
     <div class="col-8">
     <table class="table table-hover">
     <thead class="table-dark">
     <tr>
          <th scope="col">Name</th>
          <th scope="col">Roll No</th>
          <th scope="col">Marks obtained</th>
         
          <th scope="col">Edit Marks</th>
     </tr>
     </thead>

     <?php 
     $subject_id=$_SESSION['subject_id'];
     

    
     $sql = "SELECT student.stud_roll, student.stud_name, subject.marks_obtained FROM student INNER JOIN subject ON student.stud_roll=subject.stud_roll where subject_id=$subject_id";
     $result = mysqli_query($conn, $sql); 
     while($row = $row = $result->fetch_assoc())
     
       {
        $name=$row['stud_name'];

        $rollno=$row['stud_roll'];

        $marks=$row['marks_obtained'];
          echo "<tr>";
          echo "<td>" . $row['stud_name'] . "</td>";
          echo "<td>" . $row['stud_roll'] . "</td>";
          echo "<td>" . $row['marks_obtained'] . "</td>";
         

          echo "<td>"."<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-name='$name' data-bs-rollno='$rollno' data-bs-marks='$marks' >"
          .'Edit'.
        "</button>"."</td>";

          
     
       }
     
     echo "</table>";

     
     
     ?>
     </div>
     </div>
     </div>
     &nbsp &nbsp
     <a href="add.php" class="btn btn-dark d-grid gap-2 col-2 mx-auto" role="button">Add New Records!</a>
     &nbsp &nbsp

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