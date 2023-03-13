<?php
include('includes/db_connect.php');

$get_email=$_GET['emailid'];
if(isset($_POST['change_password'])){
  $password= $_POST['password'];

$update_password="UPDATE users SET password='$password' WHERE emailid='$get_email'";
$pass_word=mysqli_query($connect,$update_password);

if($pass_word)
{
  
  echo"<script>window.alert('Password Updated successfully')</script>";
  ?>
  <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/placementcell/login.php">
  <?php
}
else
{
echo"<script>window.alert('Failed to Update password')</script>";
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/placementcell/login.php">
<?php	
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Set your password</title>
    <style>
      body{
        padding:180px;
        margin-left:330px;
      }
    </style>
</head>
<body>
  <div class="card w-50 m-10">
    <div class="card-header">
      <h5>Set your Password</h5>
    </div>
    <div class="card-body p-4">
      <form action="" method="POST">
        <div class="form-group mb-3">
          <label for="exampleFormControlInput1">Email Id</label>
          <input type="text" value="<?php echo $get_email?>" class="form-control" id="exampleFormControlInput1" readonly>
        </div>
        <div class="form-group mb-3">
          <label for="exampleFormControlInput1">Password</label>
          <input type="password" name="password"class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group mb-3">
        <button type="submit" name="change_password" class="btn btn-primary btn-lg">Submit</button>
      </div>
    </form>
    </div>
  </div>
</body>
</html>