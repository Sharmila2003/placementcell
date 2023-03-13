<?php
include('../includes/db_connect.php');
$query="select * from users as u JOIN department as d on d.id=u.departmentid JOIN placement_status p_s on u.id=p_s.studentid JOIN company as c on c.id=p_s.company_id where u.roles='Student'";
$search_result=mysqli_query($connect,$query);


?>
<?php include('partials/staffnav.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase mt-3" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">Placement Details</h4>
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
        <th scope="col">FIRSTNAME</th>
        <th scope="col">LASTNAME</th>
        <th scope="col">DEPARTMENT</th>
        <th scope="col">GENDER</th>
        <th scope="col">PHNO</th>
        <th scope="col">EMAIL-ID</th>
        <th scope="col">COMPANYNAME</th>
        <th scope="col">PLACEMENT STATUS</th>
        <th scope="col">CALL LETTER</th>
              
      </tr>
    </thead>
    <?php 
    $sno=0;
while($row = mysqli_fetch_array($search_result)):
$sno=$sno+1;
  $stud_id=$row['id'];
  $placement_status=$row['placement_status'];
    
?>
<tr>
  <td><?php echo $sno?></td>                 
  <td><?php echo $row['firstname']?></td>
  <td><?php echo $row['lastname']?></td>
  <td><?php echo $row['departmentname']?></td>
  <td><?php echo $row['gender']?></td>
  <td><?php echo $row['phonenumber']?></td>
  <td><?php echo $row['emailid']?></td>
 

  <td>
      <?php echo $row['companyname']?>   
  </td>
  <td><?php  
  if($placement_status==0){
    echo 'Pending';
  }else if($placement_status==1){
    echo 'Selected';
  }else if($placement_status==2){
    echo 'Rejected';
  }
  
  ?></td>
   <td>
    <?php
     if($placement_status==1){
      echo '
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#calllettermodal">
      view
    </button>
      ';
     }else{
      echo '
      Not Available
      ';
     }
    
    ?>

<div class="modal fade" id="calllettermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content" style="width:1000px;height:800px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Call Letter </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="../assets/callletterpdf/<?php echo $row['pdf_filename']?>?zoom=60" style="width:950px;height:800px"></iframe>
      </div>

    </div>
  </div>
</div>
</td> 
</tr>
<?php endwhile;?>
</table>
</section>
<?php include('partials/footer.php');?>
