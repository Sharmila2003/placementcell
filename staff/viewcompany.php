<?php
include('../includes/db_connect.php');
$query="select * from company";
$search_result=mysqli_query($connect,$query)


?>
<?php include('partials/staffnav.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase mt-3" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">Company</h4>
      </div>
    </div>
</section>
</div>
<!-- TABLE -->
<section id="table">
  <table class="table table-striped table-hover mt-4">
    <thead class="table-primary">
      <tr>
        <th scope="col">SNO</th>
        <th scope="col">CompanyLogo</th>
        <th scope="col">CompanyName</th>
        <th scope="col">CompanyDescription</th>
        <th scope="col">Location</th>
        <th scope="col">Package</th>
        <th scope="col">ContactNumber</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <?php 
    $sno=0;
while($row = mysqli_fetch_array($search_result)):
$sno=$sno+1;
?>
<tr>
  <td><?php echo $sno?></td>  
  <td>
    <img src="../assets/uploads/<?php echo $row['companylogo']?>" width="80px">
  </td>               
  <td><?php echo $row['companyname']?></td>
  <td><?php echo $row['companydescription']?></td> 
  <td><?php echo $row['companylocation']?></td>
  <td><?php echo $row['package']?></td>
  <td><?php echo $row['contactno']?></td>
  <td><?php echo $row['comemail']?></td>

</tr>
<?php endwhile;?>
</table>
</section>


