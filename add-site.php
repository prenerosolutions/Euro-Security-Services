<?php
include('header.php');
include('site_sidebar.php');

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
                  <li class="breadcrumb-item active">Add New Site
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
                  <h4 class="card-title">Add New Site</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="add_site_process.php">
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Site Title:</i></small>
                          <input type="text" class="form-control" name="site_title" placeholder="Enter Site Name " required >
                      </fieldset>
					   
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Client Name:</i></small>
						  <select class="form-control" name="client_id" required> 
							  <option value=" "> SELECT Client </option>
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
                          <input type="text" class="form-control" name="address" placeholder="Street Adress"  required>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>City: </i></small>
                          <input type="text" class="form-control" name="city" placeholder="City" >
                      </fieldset>
					  
					  <fieldset class="form-group">               
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Add Site" name="add-site">
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