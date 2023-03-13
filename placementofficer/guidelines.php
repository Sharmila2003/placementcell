<?php include('partials/nav_bar.php');?>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-5 mb-1">
        <h4 class="text-uppercase" style="color:#4649FF;font-family: 'Noto Serif Ahom', serif;font-size:45px;">Add Guidelines</h4>
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


<!-- MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Guidelines</h5>
        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/db_action.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Courses</label>
            <input type="text" class="form-control" name="cname" placeholder="Enter company name" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Course link</label>
            <input type="text" class="form-control" name="cdescrip" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1"></label>
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

<?php include('partials/footer.php');?>
