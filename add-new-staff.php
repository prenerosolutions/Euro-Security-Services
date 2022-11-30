<?php
include('header.php');
include('workforce_sidebar.php');

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
                  <li class="breadcrumb-item active">Add New Staff
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
                  <h4 class="card-title">Add New Staff Member</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="emp_process.php">
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Member Name:</i></small>
                          <input type="text" class="form-control" name="emp_name" placeholder="Enter Member Name " required >
                      </fieldset>
					   
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Email:</i></small>
                          <input type="text" class="form-control" name="email" required placeholder="demo@example.com">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Phone Number:</i></small>
                          <input type="text" class="form-control" name="phone" required placeholder="+xx xxx xxxxxxx"  required>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Password: </i></small>
                          <input type="password" class="form-control" name="password" placeholder="xxxxxxxx" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Address / Emergency Details: </i></small>
                          <textarea class="form-control" name="address" rows="3"></textarea>
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
                          <input type="text" class="form-control" name="pds" placeholder="0000">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>ESI Number:</i></small>
                          <input type="text" class="form-control" name="esi_num" placeholder="ESI0000" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>ESI %:</i></small>
                          <input type="text" class="form-control" name="esi" placeholder="%" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PF Number:</i></small>
                          <input type="text" class="form-control" name="pf_num" placeholder="PF0000">
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PF %:</i></small>
                          <input type="text" class="form-control" name="pf" placeholder="%" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PAN Number:</i></small>
                          <input type="text" class="form-control" name="pan" placeholder="PAN000000" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Add Member" name="add-staff">
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