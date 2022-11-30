<?php
include('header.php');
//include('sidebar.php');

?>


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Euro Security admin logo" src="images/icon.png"/>
              <h3 class="brand-text">Euro Security </h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="clients.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">All Clients</span></a>
          </li>
          <li class=" nav-item"><a href="add-new-client.php"><i class="ft-plus"></i><span class="menu-title" data-i18n="">Add New Client </span></a>
          </li>
          
         
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

      <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Clients</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Add New client
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
                  <h4 class="card-title">Add New Client</h4>
              </div>
              <div class="card-block">
                  <div class="card-body">
                     <form method="post" enctype="multipart/form-data" action="client_process.php">
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Member Name:</i></small>
                          <input type="text" class="form-control" name="cl_name" placeholder="Enter Client Name" required >
                      </fieldset>
					   
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Email:</i></small>
                          <input type="text" class="form-control" name="cl_email" placeholder="demo@example.com" required>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Phone Number:</i></small>
                          <input type="text" class="form-control" name="cl_phone" placeholder="+xx xxx xxxxxxx"  required>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Password: </i></small>
                          <input type="password" class="form-control" name="cl_password" placeholder="xxxxxxxx" >
                      </fieldset>
						 
						 <fieldset class="form-group">
                          <small class="text-muted"><i>Other Details: </i></small>
                          <textarea class="form-control" name="cl_details" rows="3"></textarea>
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>Address / Emergency Details: </i></small>
                          <textarea class="form-control" name="cl_address" rows="3"></textarea>
                      </fieldset>
					  						  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>GST Number:</i></small>
                          <input type="text" class="form-control" name="gst" placeholder="GST0000" >
                      </fieldset>
					  
					  <fieldset class="form-group">
                          <small class="text-muted"><i>PAN Number:</i></small>
                          <input type="text" class="form-control" name="cl_pan" placeholder="PAN000000" >
                      </fieldset>
					  
					 
					  <fieldset class="form-group">
                          
                          <input type="submit" class="btn btn-bg-gradient-x-blue-cyan" value="Add Client" name="add-staff">
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