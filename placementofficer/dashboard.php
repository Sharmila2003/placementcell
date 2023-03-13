
<?php include('partials/nav_bar.php');?>

	<style>
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
      transition: 0.3s ease-in-out;
      cursor:pointer;
  }
    </style>
<div class="grey-bg container-fluid mt-5">
  <section id="minimal-statistics">

    <div class="row" style="margin-top: 110px;">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fas fa-users primary fa-3x"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="success"></h3>
                  <span>No of Placement Officer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fas fa-users primary fa-3x"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="danger">1</h3>
                  <span>No of Students</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fas fa-users primary fa-3x"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="primary">1</h3>
                  <span>No of Staff</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                <i class="fas fa-users primary fa-3x"></i>
                </div>
                <div class="media-body text-right">
                  <h3 class="warning">0</h3>
                  <span>No of Company</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
</div>  
<?php include('partials/footer.php');?>