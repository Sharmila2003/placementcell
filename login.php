<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center" style="min-height:100vh;">
    <form class="border shadow p-3 rounded" style="width:450px;" action="logincheck.php" method="post">
      <h1 class="text-center" p-3>LOGIN</h1>
       <?php if(isset($_GET['error'])){ ?>
      <div class="alert alert-danger" role="alert">
        <?=$_GET['error']?>
      </div>
      <?php }?> 
            <div class="mb-3">
              <label>Username</label>
              <input type="text" name="uname" class="form-control my-2" placeholder="Enter Username" autocomplete="off">
            </div>
            <div class="mb-3">
              <label>Password</label>
              <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">
            </div>
            <div class="mb-3">
              <label>Role</label>
            <select class="form-select my-2" name="role" aria-label="default select example">
              <option selected>Select Role</option>
              <option value="admin">Admin</option>
              <option value="placementofficer">Placement Officer</option>
              <option value="staff">Staff</option>
              <option value="student">Student</option>
            </select>
            </div>
            
            <button type="submit" class="btn btn-lg btn-primary my-2">Login</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>