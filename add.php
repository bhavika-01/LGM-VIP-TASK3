<!DOCTYPE html>
<head>
    <title>Result Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
  body{
    background-color:#95D1CC;

  }
  #p1 {
  font-family: "Times New Roman", Times, serif;
  padding-bottom:20px;
  padding-top:15px

}
 
</style>
</head>

<body>
<div class="container h-100">
<form action="insert.php" method="post">
        <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <h1 style="text-align:center" id="p1"> </h1>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Student Records</h2>
              <p class="text-white-50 mb-5">Please enter the details</p>
              <div class="form-outline form-white mb-4">
                <input type="text" placeholder="Name" name="name"class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="typePassword" name ="password"placeholder="Password" class="form-control form-control-lg" />

              </div>
              <div class="form-outline form-white mb-4">
                <input type="text" id="email" name ="email" placeholder="Email" class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
                <input type="number" id="roll" name ="Roll" placeholder="Roll Number" class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
                <input type="number" id="marks" name ="marks" placeholder="marks" class="form-control form-control-lg" />
              </div>
              <input class="btn btn-outline-light btn-lg px-5" type="submit"  value="Submit"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>