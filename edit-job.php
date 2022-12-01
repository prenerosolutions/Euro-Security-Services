<?php
include('header.php');
include('site_sidebar.php');
$job_id = $_GET['job_id'];

?>
      <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Job Shifts</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Job
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Inputs start -->
<section class="basic-inputs">
  <div class="row match-height">
      
      <div class="col-xl-6 col-lg-6 col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Edit Job</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="edit_job_process.php">
						 <?php
						 $jquery=mysqli_query($connect,"SELECT * FROM `jobs` WHERE job_id='$job_id'");
								$jrow = mysqli_fetch_array($jquery);
						 
						 ?>
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Job Title:</i></small>
                          <input type="text" class="form-control" name="job_title"  value="<?php echo $jrow['job_title'];  ?>" >
                      </fieldset>
					   
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Site Name:</i></small>
						  <select class="form-control" name="site_id" required> 
							  <option value="<?php echo $srow['site_id']; ?> "> 
								  <?php
								  $site_id = $jrow['site_id'];
							  $squery=mysqli_query($connect,"SELECT * FROM `sites` WHERE site_id='$site_id'");
								 $srow = mysqli_fetch_array($squery);
							  $client_id = $srow['client_id'];
								  $cquery=mysqli_query($connect,"SELECT * FROM `clients` WHERE client_id='$client_id'");
								 $crow = mysqli_fetch_array($cquery);
								  
							  	echo $srow['site_title'].' '.$srow['site_address'].' '.$srow['site_city'].' ('.$crow['client_name'].')';
							  
							  ?>
							  </option>
							  <?php
								$query=mysqli_query($connect,"SELECT * FROM `sites`");
								 while($srow = mysqli_fetch_array($query)){
							?>	
							  
							  
                                                <option value="<?php echo $srow['site_id']; ?>"><?php echo $srow['site_title']; ?> - <?php echo $srow['site_address']; ?> - <?php echo $srow['site_city']; ?> - <?php echo $crow['client_name']; ?> </option>
							  <?php
								 }
									 ?>
                                                  
						  </select>
                          
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Start Time:</i></small>
                          <input type="time" class="form-control" name="start_time"  value="">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>End Time: </i></small>
                          <input type="time" class="form-control" name="end_time" value="">
                      </fieldset>
					  
					 				  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Break Time:</i></small>
                          <input type="text" class="form-control" name="break_time"  value="">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Job Date:</i></small>
                          <input type="text" class="form-control" name="job_date" value="">
                      </fieldset>
					  
					  
					  
					  <fieldset class="form-group">
                          
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Update Job" name="edit-job">
                      </fieldset>
					  </form>
					  
					  
					  
					  
                  </div>
              </div>
          </div>
      </div>
      
  </div>
</section>
<!-- Basic Inputs end -->


        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


<?php
include('footer.php');
?>