<?php

include('./includes/db_connect.php');
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['role'])){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      $emailid=test_input($_POST['email']);
      $password=test_input($_POST['pass']);
      $role=test_input($_POST['role']);

      if(empty($emailid)){
        header("location:./login.php?error=Emailid is Required");
      }else if(empty($password)){
        header("location:./login.php?error=password is Required");
      }else if($role==='Select Role') 
      {
        header("location:./login.php?error=Role is Required");
      }
      else if(!empty($emailid) && !empty($password) && $role!=='Select Role'){
        session_start(); 
        $s = "select * from users where emailid='$emailid' && password='$password' &&  roles='$role'";
            
        $result = mysqli_query($connect, $s);
    
        $num = mysqli_num_rows($result);
    
        if($num==1)
        {
            
            $_SESSION['emailid']=$emailid;
            if($role=='admin'){
              header('location:./admin/welcomeadmin.php');
            }else if($role==='student'){
              header('location:./student/welcomestudent.php');
            }else if($role==='staff'){
            header('location:./staff/welcomestaff.php');
            }else if($role==='placementofficer'){
            header('location:./placementofficer/welcomeplacementofficer.php');
            }
        }
        else
        {
            header("location:./login.php?error=Emailid or Password or role is  Wrong");
        }
      }
    }
    
      
      

else{
    header("location:./login.php");
}

?>