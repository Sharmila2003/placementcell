<?php
if (isset($_GET['id'])){
include('../includes/db_connect.php');
$viewcompany="select * from company";
$search_result=mysqli_query($connect,$viewcompany);




}
?>
<?php include('partials/studentnav.php');?>



<?php include('partials/footer.php');?>