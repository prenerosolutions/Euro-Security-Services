<?php
include('header.php');
include('workforce_sidebar.php');
$employee_code = $_GET['employee_code'];
?>

      <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Staff Member</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Edit Staff
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
                  <h4 class="card-title">Edit Staff Member</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
					  
					  
					     <?php
										
										$query=mysqli_query($connect,"SELECT * FROM `employee` WHERE `employee_code`=  $employee_code");
										$srow = mysqli_fetch_array($query);
										
										?>
                     <form method="post" enctype="multipart/form-data" action="edit_staff_process.php">
						  <fieldset class="form-group">
                         
                          <input type="text" class="form-control" name="emp_code" value="<?php echo $srow['employee_code']; ?>" required >
                      </fieldset>
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Member Name:</i></small>
                          <input type="text" class="form-control" name="emp_name" value="<?php echo $srow['employee_name']; ?>" required >
                      </fieldset>
					   
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Email:</i></small>
                          <input type="text" class="form-control" name="email" required value="<?php echo $srow['emp_email']; ?>">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Phone Number:</i></small>
                          <input type="text" class="form-control" name="phone" value="<?php echo $srow['emp_phone']; ?>" required>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Password: </i></small>
                          <input type="password" class="form-control" name="password" value="<?php echo $srow['password']; ?>" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Address / Emergency Details: </i></small>
                          <textarea class="form-control" name="address" rows="3"> <?php echo $srow['address']; ?></textarea>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Guard Type:</i></small>
						  <select class="form-control" name="type" required> 
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Trans Gender</option>
                                              
                                            </select>
                          
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Per Day Sallery:</i></small>
                          <input type="text" class="form-control" name="pds" value="<?php echo $srow['per_day_salary']; ?>" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>ESI Number:</i></small>
                          <input type="text" class="form-control" name="esi_num" value="<?php echo $srow['esi']; ?>" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>ESI %:</i></small>
                          <input type="text" class="form-control" name="esi" value="<?php echo $srow['esi_per']; ?>">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PF Number:</i></small>
                          <input type="text" class="form-control" name="pf_num" value="<?php echo $srow['pf_num']; ?>">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PF %:</i></small>
                          <input type="text" class="form-control" name="pf" value="<?php echo $srow['pf_per']; ?>" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PAN Number:</i></small>
                          <input type="text" class="form-control" name="pan" value="<?php echo $srow['pan_num']; ?>">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Update Member" name="add-staff">
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