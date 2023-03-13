<?php
include('../includes/db_connect.php');
$query="select * from company";
$search_result=mysqli_query($connect,$query)


?>
<?php include('partials/nav_bar.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">Add Company Details</h4>
      </div>
    </div>
    <div class="row mt-3 justify-content-md-end">
      <div class="text-align-end">
        <!-- Button trigger modal -->
       <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD</button>
      </div>
    </div>
</section>
</div>  


<label for="exampleFormControlSelect1" style="color:#4649FF;font-family: 'Noto Sans', sans-serif;font-size:20px;">Select No.of.rows to display :</label>
<select class="custom-select custom-select-lg mb-3" name="company" id="maxRows">
    <option value="5000">Select All Rows</option>
      <option value="1">1</option>
      <option value="10">10</option>
      <option value="15">15</option>
      <option value="20">20</option>
      <option value="50">50</option>
      <option value="70">70</option>
      <option value="100">100</option>
</select>


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
        <th scope="col">RegLink</th>
        <th scope="col">ContactNumber</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
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
  <td><?php echo $row['registrationlink']?></td>
  <td><?php echo $row['contactno']?></td>
  <td><?php echo $row['comemail']?></td>
  <td>
    <div class="d-flex">
      <form method="GET" action='partials/db_action.php'>
        <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/><a href="company.php?id=<?php echo $row['id']?>" name='company_edit' class="px-3 btn btn-primary btn-sm">Edit</a>
      </form>
      <form method="POST" action='partials/db_action.php'>
        <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/>
        <?php
        echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' onclick()='return Delete_comapany();' name='company_delete' value='Delete' />";?>
        </form>
      </div>   
  </td>
</tr>
<?php endwhile;?>
</table>
</section>


<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Company Detail</h5>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/db_action.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Company Name</label>
            <input type="text" class="form-control" name="cname" placeholder="Enter company name" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company Description</label>
            <input type="text" class="form-control" name="cdescrip" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Company Logo</label>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"> 
          </div>         
          <div class="form-group">
            <label for="exampleInputEmail1">Company Location</label>
            <input type="text" class="form-control" name="caddress" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>        
          <div class="form-group">
            <label for="exampleInputEmail1">Package</label>
            <input type="tel" class="form-control" name="package" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">RegistrationLink</label>
            <input type="url" class="form-control" name="reglink" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contact Number</label>
            <input type="tel" class="form-control" name="contnum" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Company Email</label>
            <input type="email" class="form-control" name="cemail" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary"  data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="addcompany">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
	function Delete_company(){
		return confirm('Are You Sure You Want Delete this Staff');
	}
	</script>


<!-- EDIT -->
<?php
if (isset($_GET['id'])){
    include('../includes/db_connect.php');
   
    $id = $_GET["id"];
    $company = mysqli_query($connect, "SELECT * FROM company WHERE id = '$id'");
    $edit = mysqli_fetch_assoc($company);
   

   
   

    echo '<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
  $(document).ready(function(){
            $("#editcompanyModal").modal(); 
        });
    </script>
    ';
    echo '
    <div class="modal fade" id="editcompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Company Detail</h5>
          <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="partials/db_action.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
          <input type="hidden" class="form-control" name="edit_id" placeholder="Enter company name" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['id'].'">
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Company Name</label>
        <input type="text" class="form-control" name="edit_cname" placeholder="Enter company name" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['companyname'].'">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Company Description</label>
              <input type="text" class="form-control" name="edit_cdescrip" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['companydescription'].'">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Company Logo</label>
              <input type="file" name="edit_image" class="form-control-file" id="exampleFormControlFile1" value="'.$edit['companylogo'].'"> 
            </div>         
            <div class="form-group">
              <label for="exampleInputEmail1">Company Location</label>
              <input type="text" class="form-control" name="edit_caddress" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['companylocation'].'">
            </div>        
            <div class="form-group">
              <label for="exampleInputEmail1">Package</label>
              <input type="tel" class="form-control" name="edit_package" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['package'].'">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">RegistrationLink</label>
              <input type="url" class="form-control" name="edit_reglink" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['registrationlink'].'">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Contact Number</label>
              <input type="tel" class="form-control" name="edit_contnum" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['contactno'].'">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Company Email</label>
              <input type="email" class="form-control" name="edit_cemail" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['comemail'].'">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary"  data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="editcompany">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>';
}
?>

<?php include('partials/footer.php');?>
