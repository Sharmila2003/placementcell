<?php
include('../includes/db_connect.php');
$viewcompany="select * from company";
$search_result=mysqli_query($connect,$viewcompany)


?>
<?php include('partials/studentnav.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-5 mb-1">
        <h4 class="text-uppercase" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">Guidelines</h4>
      </div>
    </div>



<?php include('partials/footer.php');?>