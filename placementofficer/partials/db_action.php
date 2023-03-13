<!-- ADD STAFF  -->
<?php    
	include('../../includes/db_connect.php');
	include('../../includes/email_template.php');
	require '../../vendor/autoload.php';

    // ADD STAFF
    if(isset($_POST['addstaff'])){
        $firstname= $_POST['fname'];
        $Lastname= $_POST['lname'];
        $dept = $_POST['dept'];
        $gender= $_POST['gender'];
        $phno = $_POST['phno'];
        $email_id = $_POST['email_id'];
        $role= $_POST['role'];
        $verify_token=md5(rand());

        $query="INSERT INTO users(firstname,lastname,emailid,gender,phonenumber,roles,signuplink,departmentid) VALUES ('$firstname','$Lastname','$email_id','$gender','$phno','$role','$verify_token','$dept')";
        $data=mysqli_query($connect,$query);

        if($data)
        {
			$user_name=$firstname.' '.$Lastname;
			$emailId=$email_id;
			userRestrationLinkEmailTemplate($user_name,$emailId,$token);
            echo"<script>window.alert('Staff data inserted successfully')</script>";
            ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../staff.php">
            <?php
        }
        else
        {
        echo"<script>window.alert('Failed to insert staff data')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../staff.php">
        <?php	
        }
    }

// UPDATE STAFF
if(isset($_POST['update_staff'])){
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
		
		echo"<script>window.alert('staff data updated successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../staff.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed to update staff data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../staff.php">
	<?php
	}

}

//  DELETING STAFF
if (isset($_POST['staff_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM users WHERE id='$id_delete'";
	$data=mysqli_query($connect,$query);
if($data)
{
	
	echo"<script>window.alert('Staff is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../staff.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the Staff')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../staff.php">
 <?php	
}
}

// ADD STUDENT
if(isset($_POST['addstudent'])){
    $firstname= $_POST['fname'];
	$Lastname= $_POST['lname'];
    $dept = $_POST['dept'];
	$gender= $_POST['gender'];
    $phno = $_POST['phno'];
    $email_id = $_POST['email_id'];
	$role= $_POST['role'];
	$token=tokenGeneration();

	$query="INSERT INTO users(firstname,lastname,emailid,gender,phonenumber,roles,signuplink,departmentid) VALUES ('$firstname','$Lastname','$email_id','$gender','$phno','$role','$token   ','$dept')";
	$data=mysqli_query($connect,$query);

	if($data)
	{
				
		$sql = "SELECT * FROM users WHERE emailid='$email_id'";
		$result = $connect->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$studed_id=$row['id'];
			$placement_statusquery="INSERT INTO placement_interested(stud_id,interested_status) VALUES ($studed_id,1)";
			$placement_statusdata=mysqli_query($connect,$placement_statusquery);
		}

		$user_name=$firstname.' '.$Lastname;
		$emailId=$email_id;
		userRestrationLinkEmailTemplate($user_name,$emailId,$token);

		} else {
		echo "0 results";
		}
		echo"<script>window.alert('Student data inserted successfully')</script>";
		?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../student.php">
	<?php
	}
	else
	{
	echo"<script>window.alert('Failed to insert Student data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../student.php">
	<?php	
	}
}



// UPDATE STUDENT
if(isset($_POST['update_student'])){
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
		echo"<script>window.alert('Student data updated successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../student.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed update student data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../student.php">
	<?php
	}

}

//UPDATE PLACEMENT DETAILS
if(isset($_POST['update_student_placement_details'])){
	$student_id=$_POST['student_id'];
	$company_id=$_POST['company_id'];
	$e_placement_status=$_POST['placement_status'];

	$placement_status=-1;
	if($e_placement_status){
		if($e_placement_status=='pending'){
			$placement_status=0;
		}
		elseif($e_placement_status=='selected'){
			$placement_status=1;
		}elseif($e_placement_status=='rejected'){
			$placement_status=2;
		}
	}
	$edit_file_name = $_FILES['edit_pdf_file']['name'];
	$edit_file_tmp = $_FILES['edit_pdf_file']['tmp_name'];
	$placement_status_data='';
	$update_callletter_data='';
	move_uploaded_file($edit_file_tmp,"../../assets/callletterpdf/".$edit_file_name);

	if(!empty($edit_file_name)){
		$update_callletter_query="UPDATE placement_status set pdf_filename='$edit_file_name' WHERE studentid='$student_id' AND company_id='$company_id'";
		$update_callletter_data=mysqli_query($connect,$update_callletter_query);
	}
if($placement_status!=-1){
	$placement_status_query="UPDATE placement_status set placement_status='$placement_status' WHERE studentid='$student_id' AND company_id='$company_id'";
	$placement_status_data=mysqli_query($connect,$placement_status_query);
}

	if($update_callletter_data!='' || $placement_status_data!='')
	{
		echo"<script>window.alert('Student placement details updated successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementdetails.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed update student placement details')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../placementdetails.php">
	<?php
	}

}

//  DELETE STUDENT
if (isset($_POST['student_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM users WHERE id='$id_delete'";
	$data=mysqli_query($connect,$query);
if($data)
{
	
	echo"<script>window.alert('Student is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../student.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the Student')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../student.php">
 <?php	
}
}



if(isset($_POST['addcompany'])){      
    
    $comname= $_POST['cname'];
    $comdescri= $_POST['cdescrip'];
    $comaddress= $_POST['caddress'];
    $com_pack= $_POST['package'];
    $com_reglink= $_POST['reglink'];
    $com_num= $_POST['contnum'];
    $com_email= $_POST['cemail'];


    $img_name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
    $img_ex_lc=strtolower($img_ex);
    $allowed_exs=array("jpg","jpeg","png");
    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
    $img_upload_path='../../assets/uploads/'.$new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);

    $query="INSERT INTO company(companyname,companydescription,companylogo,companylocation,package,registrationlink,contactno,comemail) VALUES ('$comname','$comdescri','$new_img_name','$comaddress','$com_pack','$com_reglink','$com_num','$com_email')";
    $data=mysqli_query($connect,$query);
    if($data)
    {
        
		$get_all_users="SELECT * FROM users WHERE roles='student' OR roles='staff'";
		$search_result=mysqli_query($connect,$get_all_users);
		while($row = mysqli_fetch_array($search_result)){
			$user_name=$row['firstname'].' '.$row['lastname'];
			$emailId=$row['emailid'];
			$token=tokenGeneration();
			comapanyRemainderEmailTemplate($user_name,$emailId,$token,$comname);
		}
		
        echo"<script>window.alert('company inserted successfully')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../company.php">
        <?php
    }
    else
    {
    echo"<script>window.alert('Failed insert data')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../company.php">
    <?php	
    }
} 



// EDIT COMPANY
if(isset($_POST['editcompany'])){
$e_id=$_POST['edit_id'];
$e_cname=$_POST['edit_cname'];
$es_cdescrip=$_POST['edit_cdescrip'];
$e_caddress=$_POST['edit_caddress'];
$e_package=$_POST['edit_package'];
$e_reglink=$_POST['edit_reglink'];
$e_contnum=$_POST['edit_contnum'];
$e_cemail=$_POST['edit_cemail'];

$img_name=$_FILES['edit_image']['name'];
$tmp_name=$_FILES['edit_image']['tmp_name'];
$img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
$img_ex_lc=strtolower($img_ex);
$allowed_exs=array("jpg","jpeg","png");
$edit_new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
$img_upload_path='../../assets/uploads/'.$edit_new_img_name;
move_uploaded_file($tmp_name, $img_upload_path);


$query="UPDATE company set companyname='$e_cname',companydescription='$es_cdescrip',companylogo='$edit_new_img_name',companylocation='$e_caddress',package='$e_package',registrationlink='$e_reglink',contactno='$e_contnum',comemail='$e_cemail' WHERE id='$e_id'";
$data=mysqli_query($connect,$query);

if($data)
{
    
    echo"<script>window.alert('Company data updated successfully')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../company.php">
    <?php
}
else
{
echo"<script>window.alert('Failed to update Company data')</script>";
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../company.php">
<?php
}

}


//  deleting company
if (isset($_POST['company_delete']))
{
$id_delete=$_POST['id'];
$companyquery="DELETE FROM users WHERE id='$id_delete'";
$companydata=mysqli_query($connect,$companyquery);
if($companydata)
{

echo"<script>window.alert('Company is successfully deleted')</script>";
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../company.php">
<?php
}
else
{
echo"<script>window.alert('Failed to delete Company')</script>";
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../company.php">
<?php	
}
}



?>


