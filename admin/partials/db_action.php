<?php

include('../../includes/db_connect.php');
include('../../includes/email_template.php');

//Load Composer's autoloader
require '../../vendor/autoload.php';


if(isset($_POST['password_set_link'])){
    $email=mysqli_real_escape_string($connect,$_POST['emailid']);
    $token=tokenGeneration();
    
    $check_email="SELECT emailid FROM users WHERE emailid='$email' LIMIT 1";
    $check_email_run=mysqli_query($connect,$check_email);

    if(mysqli_num_rows($check_email_run)>0)
    {
        $row=mysqli_fetch_array($check_email_run);
        $sql="SELECT * FROM users WHERE emailid='$email'";
        $result = $connect->query($sql);
        $user_firstname='';
        $user_lastname='';
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            $user_firstname=$row['firstname'];
            $user_lastname=$row['lastname'];
        }
    }
        $get_email=$email;
       

        $update_token="UPDATE users SET signuplink='$token' WHERE emailid='$get_email' LIMIT 1";
        $update_token_run=mysqli_query($connect,$update_token);

        $user_name=$user_firstname.' '.$user_lastname;
        if($update_token_run){

            send_password_reset($user_name,$get_email,$token);
        
            $_SESSION['status']="We e-mailed you a password setting link";
            header("Location:passwordlink.php");
            exit(0);
        }
        else{
            $_SESSION['status']="Something went wrong";
            header("Location:passwordlink.php");
            exit(0);
        }
    }
    else{
        $_SESSION['status']="No Email Found";
        header("Location:passwordlink.php");
    }
}



if(isset($_POST['addplacementofficer'])){
    $firstname= $_POST['fname'];
	$Lastname= $_POST['lname'];
    $dept = $_POST['dept'];
	$gender= $_POST['gender'];
    $phno = $_POST['phno'];
    $email_id = $_POST['email_id'];
	$role= $_POST['role'];
	$token=tokenGeneration();
	
	$query="INSERT INTO users(firstname,lastname,emailid,gender,phonenumber,roles,signuplink,departmentid) VALUES ('$firstname','$Lastname','$email_id','$gender','$phno','$role','$token','$dept')";
	$data=mysqli_query($connect,$query);

	if($data)
	{
		
		$user_name=$firstname.' '.$Lastname;
		$emailId=$email_id;
		userRestrationLinkEmailTemplate($user_name,$emailId,$token);
		echo"<script>window.alert('data inserted successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed insert data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
	<?php	
	}
}



// EDIT PLACEMENT-OFFICER
if(isset($_POST['update_placementoff'])){
	$e_id=$_POST['e_id'];
	$e_fname=$_POST['edit_fname'];
	$es_lname=$_POST['edit_lname'];
	$e_dept=$_POST['edit_dept'];
	$e_gender=$_POST['edit_gender'];
	$e_phno=$_POST['edit_phno'];
	$e_emailid=$_POST['edit_email_id'];



	$query="UPDATE users set firstname='$e_fname',lastname='$es_lname',departmentid='$e_dept',emailid='$e_emailid',gender='$e_gender',phonenumber='$e_phno'  WHERE id='$e_id'";
	$data=mysqli_query($connect,$query);

	if($data)
	{
		
		echo"<script>window.alert('data updated successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed to update data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
	<?php
	}

}

//  DELETING PLACEMENT-OFFICER
if (isset($_POST['place_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM users WHERE id='$id_delete'";
	$data=mysqli_query($connect,$query);
if($data)
{
	
	echo"<script>window.alert('The Placement Officer is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the Placement Officer')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
 <?php	
}
}

// EXCEL
if(isset($_POST["save_excel_data"]))
{
  $filename=$_FILES["import_file"]["tmp_name"];    
   if($_FILES["import_file"]["size"] > 0)
   {
      $file = fopen($filename, "r");
      while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
      {
        $result = mysqli_query($connect, $file);
        $num = mysqli_num_rows($result);
        if($num==1)
		    {
		      $flag=1;
          $sql = "UPDATE users SET confirmed='".$getData[0]."',male='".$getData[1]."',female='".$getData[2]."',active='".$getData[3]."',recovered='".$getData[4]."',death='".$getData[5]."'";
	    		$result = mysqli_query($connect,$sql);
		    }
		    else{
          $flag=0;
          $sql = "INSERT INTO users (`state_code`,`districts`, `confirmed`, `male`, `female`, `active`, `recovered`, `death`, `date`) VALUES('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."',CURDATE())";
          $result = mysqli_query($connect,$sql);
		    }
       
      }
      if($flag=1){
           echo "<script>window.confirm('The district in the csv file already exists in the db all the column in the db are updated whith the value that you have entered in csv')</script>";
      }else{
        echo "<script>window.confirm('The district in the csv file does not exists in the db all the data that you have entered in csv is insered as new row')</script>";
      }
      if(!isset($result))
      {    
          echo "<script>window.alert('Invalid File:Please Upload CSV File.')</script>";
          ?>
          <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
          <?php
      }
      else {
        echo "<script>window.alert('CSV File has been successfully Uploaded.')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../districts.php">
        <?php
      }
     fclose($file);  
  }
} 









if (isset($_POST['save_excel_data'])){
	$fileName=$_FILES['import_file']['name'];
	$fileExtension=explode('.',$fileName);
	$fileExtension=strtolower(end($fileExtension));
	 
	$newfilename=date("y.m.d"). "-" .date("h.i.sa"). "." .$fileExtension;
	
	$targetdirectory="C:/xampp/htdocs/placementcell/importExcelToMySQL/uploads/".$newfilename;
	move_uploaded_file($_FILES["import_file"]["tmp_name"],$targetdirectory);
	
	
	error_reporting(0);
	ini_set('display_errors',0);
	
	require "../../importExcelToMySQL/excelReader/excel_reader2.php";
	require "../../importExcelToMySQL/excelReader/SpreadsheetReader.php";
	
	$reader=  new spreadsheetReader($targetdirectory);
	foreach($reader as $key => $row){
		$firstname=$row[0];
		$Lastname= $row[1];
		$dept = $row[2];
		$gender= $row[3];
		$phno =$row[4];
		$email_id = $row[5];
		$role= $row[6];
		$excel="INSERT INTO users(firstname,lastname,emailid,gender,phonenumber,roles,departmentid) VALUES ('$firstname','$Lastname','$email_id','$gender','$phno','$role','$dept')";
		$data=mysqli_query($connect,$excel);
	}
	if($data){
		
		echo"<script>window.alert('Successfully Imported')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
		<?php
	}
	else
	{
	 echo"<script>window.alert('Failed to Importes')</script>";
	 ?>
	 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementoff.php">
	 <?php	
	}
	}
?>
