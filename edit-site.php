<?php
include('header.php');
include('site_sidebar.php');
$site_id = $_GET['site_id'];
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
                  <li class="breadcrumb-item active">Edit Site
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
                  <h4 class="card-title">Edit Site</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="edit-site-process.php">
						 
						 <?php
						 $query=mysqli_query($connect,"SELECT * FROM `sites` WHERE site_id='$site_id'");
						$srow = mysqli_fetch_array($query)
						 ?>
						 <fieldset class="form-group">
                         
                          <input type="hidden" class="form-control" name="site_id" value="<?php echo $srow['site_id'];?>">
                      </fieldset>
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Site Title:</i></small>
                          <input type="text" class="form-control" name="site_title" value="<?php echo $srow['site_title'];?>">
						 </fieldset>
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Client Name:</i></small>
						  <select class="form-control" name="client_id" required> 
							  
							  <option value="<?php echo $srow['client_id']; ?>"> <?php $client_id=$srow['client_id'];
						 							$cquery=mysqli_query($connect,"SELECT * FROM `clients` WHERE client_id='$client_id'");
						$crow = mysqli_fetch_array($cquery)	;
								  echo $crow['client_name'];
								  
								  ?> </option>
							  <?php
								$query=mysqli_query($connect,"SELECT * FROM `clients`");
								 while($crow = mysqli_fetch_array($query)){
							?>	
							  
							  
                              <option value="<?php echo $crow['client_id']; ?>"><?php echo $crow['client_name']; ?> </option>
							  <?php
								 }
									 ?>
                                                  
						  </select>
                          
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Street Address:</i></small>
                          <input type="text" class="form-control" name="address" value="<?php echo $srow['site_address']  ?>" required>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>City: </i></small>
                          <input type="text" class="form-control" name="city" value="<?php echo $srow['site_city']  ?>" >
                      </fieldset>
					  
					  <fieldset class="form-group">               
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Update Site" name="edit-site">
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