<?php include('partials/adminnav.php');?>
    <style>
      body{
        padding:180px;
        margin-left:330px;
      }
    </style>
<body>
  <div class="py-5">
    <div class="container">
      <div class="col-md-6">
        <?php
        if(isset($_SESSION['status'])){
          ?>
          <div class="alert alert- success">
            <h5><?= $_SESSION['status'];?></h5>
          </div>
          <?php
          unset($_SESSION['status']);
        }
        ?>
      </div>
    </div>
  </div>
  <div class="card w-50 m-10">
    <div class="card-header">
      <h5>Send mail to user</h5>
    </div>
    <div class="card-body p-4">
      <form action="partials/db_action.php" method="POST">
        <div class="form-group mb-3">
          <label for="exampleFormControlInput1">Email Address</label>
          <input type="email" name="emailid" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group mb-3">
        <button type="submit" name="password_set_link" class="btn btn-primary btn-lg">Send Password Setting Link</button>
      </div>
      </form>
    </div>
  </div>
</body>
</html>