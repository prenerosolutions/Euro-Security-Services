<?php
include('config.php');
include ('header.php');
include('sidebar.php');
?>

        
  <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>Add New Client</h2>                           
				<h5><a href="dashboard.php">Home</a> /Add New Client</h5>      
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                      <!--  <div class="panel-heading">
                            Form Element Examples
                        </div>-->
                        <div class="panel-body">
                            <div class="row">
								<div class="col-md-3"></div>
                                <div class="col-md-6">
                                
                                    <form role="form" method="post" enctype="multipart/form-data" action="client_process.php">
                                      
                                        <div class="form-group">
                                            <label>Client Name</label>
                                            <input class="form-control" type="text" required name="cl_name" placeholder="Enter Client Name " />
                                        </div>
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="cl_email" placeholder="demo@example.com" required />
                                        </div>
										
										<div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" required name="cl_phone" placeholder="+91 312 7524000" />
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="cl_password" placeholder="xxxxxxxx" />
                                        </div>
                                        
										 <div class="form-group">
                                            <label>Other Details</label>
                                            <textarea class="form-control" name="cl_details" rows="3"></textarea>
                                        </div>
										
                                        <div class="form-group">
                                            <label>Adress / Emergency Contact Details</label>
                                            <textarea class="form-control" name="cl_address" rows="3"></textarea>
                                        </div>
										
										
                                      
										<div class="form-group">
                                            <label>GST Number</label>
                                            <input class="form-control" name="gst" placeholder="%" />
                                        </div>
										
										<div class="form-group">
                                            <label>PAN Number</label>
                                            <input class="form-control" name="cl_pan" placeholder="PAN000000" />
                                        </div>
										
                                        <button type="submit" class="btn btn-info">Add Client</button>
                                       

                                    </form>
                                  
                                 
    </div>
                                <div class="col-md-3"></div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
<?php
include('footer.php');
?>