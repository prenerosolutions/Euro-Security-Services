<?php
include('config.php');
include ('header.php');
include('sidebar.php');
?>

        
  <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>All Employee</h2>                           
				<h5><a href="dashboard.php">Home</a> /Add New Employee</h5>      
                       
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
                                
                                    <form role="form" method="post" enctype="multipart/form-data" action="emp_process.php">
                                      
                                        <div class="form-group">
                                            <label>Employee Name</label>
                                            <input class="form-control" type="text" name="emp_name" placeholder="Enter Employee Name " required />
                                        </div>
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" required placeholder="demo@example.com" />
                                        </div>
										
										<div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" type="text" name="phone" required placeholder="+91 312 7524000" />
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="xxxxxxxx" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Adress / Emergency Contact Details</label>
                                            <textarea class="form-control" name="address" rows="3"></textarea>
                                        </div>
										
										<div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type" required> 
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Trans Gender</option>
                                              
                                            </select>
                                        </div>
										
										<div class="form-group">
                                            <label>Per Day Salery</label>
                                            <input class="form-control" name="pds" placeholder="0000" />
                                        </div>
										
										<div class="form-group">
                                            <label>ESI Number</label>
                                            <input class="form-control" name="esi_num" placeholder="ESI0000" />
                                        </div>
										
										<div class="form-group">
                                            <label>ESI %</label>
                                            <input class="form-control" name="esi" placeholder="%" />
                                        </div>
										
										<div class="form-group">
                                            <label>PF Number</label>
                                            <input class="form-control" name="pf_num" placeholder="PF0000" />
                                        </div>
                                      
										<div class="form-group">
                                            <label>PF %</label>
                                            <input class="form-control" name="pf" placeholder="%" />
                                        </div>
										
										<div class="form-group">
                                            <label>PAN Number</label>
                                            <input class="form-control" name="pan" placeholder="PAN000000" />
                                        </div>
										
                                        <button type="submit" class="btn btn-info">Add Employee</button>
                                       

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