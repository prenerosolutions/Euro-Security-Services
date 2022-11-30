<?php
include('header.php');
include('roaster_sidebar.php');
$_GET['job_id'];
$job_id = $_GET['job_id'];
?>


   

      <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Assign Guards</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Assign Guards
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
                  <h4 class="card-title">Assign Guards</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="assign_process.php">
						 <?php
								$query=mysqli_query($connect,"SELECT * FROM `jobs` WHERE `job_id`=$job_id");
								 $jrow = mysqli_fetch_array($query)
							?>	
						 
						 
						 
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Guard :</i></small>
						  	<select class="form-control" name="guard_name">
						  		<option value="" selected disabled>SELECT GUARD </option>
								<?php
								$query=mysqli_query($connect,"SELECT * FROM `employee`");
								 while($erow = mysqli_fetch_array($query)){
							?>	
						  		<option value="<?php echo $erow['employee_code']; ?>"> <?php echo $erow['employee_name']; ?> </option>
						  
						  <?php
								 }
									 ?>
						  
						  </select>
						  
						  
						  
                          
                      </fieldset>
					   <fieldset class="form-group">
                         
                          <input type="hidden" class="form-control" name="job_id" value="<?php echo $jrow['job_id']; ?>"  required>
                      </fieldset>
					  					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Start Time:</i></small>
                          <input type="text" class="form-control" name="start_time" value="<?php echo $jrow['start_time']; ?>" disabled>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>End Time: </i></small>
                          <input type="text" class="form-control" name="end_time" value="<?php echo $jrow['end_time']; ?>" disabled>
                      </fieldset>
					  
					 				  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Break Time:</i></small>
                          <input type="text" class="form-control" name="break_time" value="<?php echo $jrow['break_time']; ?>" disabled>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Job Date:</i></small>
                          <input type="text" class="form-control" name="job_date" value="<?php echo $jrow['job_date']; ?>" disabled>
                      </fieldset>
						 
						 <fieldset class="form-group">
                          <small class="text-muted"><i>Guard Cost:</i></small>
                          <input type="text" class="form-control" name="guard_cost">
                      </fieldset>
					  
					  
					  
					  <fieldset class="form-group">
                          
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Assign Guard" name="add-staff">
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
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>