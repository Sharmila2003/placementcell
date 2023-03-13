<?php
include('../includes/db_connect.php');
$viewcompany="select * from company";
$search_result=mysqli_query($connect,$viewcompany);
?>

<?php include('partials/studentnav.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-5 mb-1">
        <h4 class="text-uppercase" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">company</h4>
      </div>
    </div>

<!-- CARD -->
<div class="row row-cols-1 row-cols-md-3">
 
<?php 
    $sno=0;
while($row = mysqli_fetch_array($search_result)):
 
$sno=$sno+1;
?>
 <div class="col mb-4">
<div class="card mb-3" style="width: 22rem;">
  <img src="../assets/uploads/<?php echo $row['companylogo']?>" width="286px" alt="...">
  <div class="card-body">
    <h2 class="card-title"><?php echo $row['companyname']?></h2>
    <p class="card-text"><?php echo $row['companydescription']?></p>
    <h5 class="card-title"> Location : </h5><?php echo $row['companylocation']?>
    <h5 class="card-title">Package : <?php echo $row['package']?> </h5>
    <h5>RegLink : </h5><a class="card-title"><?php echo $row['registrationlink']?></a>
    <h5 class="card-title"><i class="fa-solid fa-phone"></i>  <?php echo $row['contactno']?></h5>
    <h5 class="card-title"><i class="fa-solid fa-envelope"></i>  <?php echo $row['comemail']?></h5>
    <?php 
    if($interested_status==1){?>
    <div>
      <form method="GET">
        <input type='hidden' name='id'  onclick="return companyid()" value='<?php echo $row['id'] ?>'/><a href="company.php?id=<?php echo $row['id'] ?>"  class="btn btn-primary my-3">Registered</a>
      </form>
    </div>
    <?php }?>
  </div>
</div>
</div>

<?php endwhile;?>
</div>
<script>
function openNewPage() {
  const dataId = document.getElementById("data").getAttribute("data-id");
  window.open("companydetails.php");
}
</script>
<script>
  function companyid(){
    <?php  
  
    $companyid=$_GET['id'];

    if($companyid!=''){
      
      $sql ="SELECT * FROM users WHERE emailid='$user_email'";
      $result = $connect->query($sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $studed_id=$row['id'];
      }
    }
      $insert_companyregistered="INSERT INTO placement_status(studentid,placement_status,company_id)VALUES('$studed_id',0,'$companyid')";
      $insert_search_regcompany=mysqli_query($connect,$insert_companyregistered);
    }
    ?>
  }

</script>
<?php include('partials/footer.php');?>