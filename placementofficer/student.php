<?php
include('../includes/db_connect.php');
$query="select * from users as u JOIN department as d on u.departmentid=d.id JOIN placement_interested as p_i on p_i.stud_id=u.id where u.roles='Student'";
$search_result=mysqli_query($connect,$query);


?>
<?php include('partials/nav_bar.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase mt-3" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">ADD Students</h4>
      </div>
    </div>
    <div class="row mt-3 justify-content-md-end">
      <div class="text-align-end">
        <!-- Button trigger modal -->
       <!-- Button trigger modal -->
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD</button>
      </div>
    </div>
<!-- EXCEL MODAL -->
<div class="form-group">
    <div class="row mt-3 ">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadxcelModal">UPLOAD</button>
    </div>
  </div>
  </form>
</section>
</div>

<!-- EXCEL Modal -->
<div class="modal fade" id="uploadxcelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Click image to choose excel file</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
      <form action="partilas/db_action.php" method="POST" enctype="multipart/form-data">
        <label for="fileInput">
          <img src="../assets/images/home/download.png" width="120">
          <input id="fileInput" type="file" style="display: none;">
        </label>
      <div class="form-group d-flex justify-content-center mt-0">
        <h4>Select a file</h4>
      </div>
      <div class="form-group d-flex justify-content-center">
        <button type="button" class="btn btn-info">UPLOAD</button>
      </div>
    </form>
  </div>
    </div>
  </div>
</div>

<label for="exampleFormControlSelect1" style="color:#4649FF;font-family: 'Noto Sans', sans-serif;font-size:20px;">Select No.of.rows to display :</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Select All Rows</option>
      <option>5</option>
      <option>10</option>
      <option>15</option>
      <option>20</option>
      <option>50</option>
      <option>70</option>
      <option>100</option>
    </select>





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
        <th scope="col">PLACEMENT INTERESTED STATUS</th>
        <th scope="col">ACTION</th>
        
      </tr>
    </thead>
    <?php 
    $sno=0;
while($row = mysqli_fetch_array($search_result)):
$sno=$sno+1;
  $stud_id=$row['id'];
  $interested_status=$row['interested_status'];    
?>
<tr>
  <td><?php echo $sno?></td>                 
  <td><?php echo $row['firstname']?></td>
  <td><?php echo $row['lastname']?></td>
  <td><?php echo $row['departmentname']?></td>
  <td><?php echo $row['gender']?></td>
  <td><?php echo $row['phonenumber']?></td>
  <td><?php echo $row['emailid']?></td>
 
  <td><?php echo $interested_status==1?'Interested':'Not Intereseted'?></td>
<td>
    <div class="d-flex">
      <form method="GET" action='partials/db_action.php'>
        <input type='hidden' name='id' value='<?php echo $row['stud_id'] ?>'/><a href="student.php?id=<?php echo $row['stud_id']?>" name='student_edit' class="px-3 btn btn-primary btn-sm">Edit</a>
      </form>
      <form method="POST" action='partials/db_action.php'>
        <input type='hidden' name='id' value='<?php echo $row['stud_id'] ?>'/>
        <?php
        echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' onclick='return Delete_student();' name='student_delete' value='Delete' />";?>
        </form>
      </div>   
  </td>
</tr>
<?php endwhile;?>
</table>
</section>



<!-- PAGINATION -->
<section id="pagination">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</section>


<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students Details</h5>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/db_action.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Firstname</label>
            <input type="text" class="form-control" name="fname" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Lastname</label>
            <input type="text" class="form-control" name="lname" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Department</label>
            <?php
            $dept="select * from department";
            $dept_list=mysqli_query($connect,$dept);
            ?>
            <select class="form-control"  name="dept" aria-label="Default select example">
              <?php
              while($d = mysqli_fetch_array($dept_list)):
              ?>
              <option></option>
              <option value="<?php echo $d['id']?>"><?php echo $d['departmentname']?></option>
              <?php endwhile;?>
            </select>
         
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Gender</label>
            <select class="form-control"  name="gender" aria-label="Default select example">
              <option></option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="others">Others</option>
            </select>
          </div>          
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="tel" class="form-control" name="phno" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email Address</label>
            <input type="email" class="form-control" name="email_id" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <input type="text" class="form-control" value="Student" name="role" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary"  data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="addstudent">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- DELETE FUNCTION -->
<script>
	function Delete_student(){
		return confirm('Are You Sure You Want to Delete this Student');
	}
	</script>




<!-- EDIT -->
<?php
if (isset($_GET['id'])){
    include('../includes/db_connect.php');
   
    $id = $_GET["id"];
    $users = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
    $edit = mysqli_fetch_assoc($users);
    $dept="select * from department";
    $dept_list=mysqli_query($connect,$dept);

   
   

    echo '<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
  $(document).ready(function(){
            $("#editstudentModal").modal(); 
        });
    </script>
    ';
    echo '
<div class="modal fade" id="editstudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Details</h5>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/db_action.php" method="post" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="e_id" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['id'].'">
          <div class="form-group">
            <label for="exampleInputEmail1">Firstname</label>
            <input type="text" class="form-control" name="edit_fname" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['firstname'].'">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Lastname</label>
            <input type="text" class="form-control" name="edit_lname" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['lastname'].'">
          </div>

          <div class="form-group">
          <label for="exampleInputEmail1">Department</label>';
          
              echo '<select class="form-control"  name="edit_dept" aria-label="Default select example">';
              while($d = mysqli_fetch_array($dept_list)):
            echo' 
              <option value='.$d['id'].' ';echo $d['id'] === $edit['departmentid'] ? "selected" : "";echo'/>'.$d['departmentname'].'</option>';
              endwhile;
            echo '</select>
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Gender</label>
          <select class="form-control" id="gender"  name="edit_gender" aria-label="Default select example">';
          echo '<option value="male"';echo $edit['gender'] ==='male' ? "selected" : "";echo'/>Male</option>
          <option value="female"' ;
          echo $edit['gender'] ==='female' ? "selected" : "";
          echo'/>Female</option>
          <option value="other"' ;
          echo $edit['gender'] ==='other' ? "selected" : "";
          echo'/>Other</option>
          </select>
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="tel" class="form-control" name="edit_phno" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['phonenumber'].'">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="edit_email_id" id="exampleInputEmail1" aria-describedby="emailHelp" value="'.$edit['emailid'].'">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <input type="text" class="form-control" value="student" name="role" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-secondary"  data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="update_student">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>';
}
?>
        

<?php include('partials/footer.php');?>





