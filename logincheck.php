<?php

include('./includes/db_connect.php');
if(isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['role'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $username=test_input($_POST['uname']);
      $password=test_input($_POST['pass']);
      $role=test_input($_POST['role']);

      if(empty($username)){
        header("location:./login.php?error=UserName is Required");
      }else if(empty($password)){
        header("location:./login.php?error=password is Required");
      }else if($role==='Select Role') 
      {
        header("location:./login.php?error=Role is Required");
      }
      else if(!empty($username) && !empty($password) && $role!=='Select Role'){
        session_start(); 
        $s = "select * from users where username='$username' && password='$password' &&  role='$role'";
            
        $result = mysqli_query($connect, $s);
    
        $num = mysqli_num_rows($result);
    
        if($num==1)
        {
            
            $_SESSION['username']=$username;
            if($role=='admin'){
              header('location:./admin/dashboard.php');
            }else if($role==='student'){
              header('location:./student/student.php');
            }else if($role==='staff'){
            header('location:./staff/staff.php');
            }else if($role==='placementofficer'){
            header('location:./placementofficer/placementofficer.php');
            }
        }
        else
        {
            header("location:./login.php?error=Entered Username or Password or role is  Wrong");
        }
      }
    }
    
      
      

else{
    header("location:./login.php");
}

?>