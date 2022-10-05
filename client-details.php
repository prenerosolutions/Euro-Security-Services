<?php
include('config.php');
include ('header.php');
include('sidebar.php');
?>

        
  <div id="page-wrapper" >         
	  <div id="page-inner">
		  <div class="row">                    
			  <div class="col-md-12">                    
				  <h2>Client Details</h2>                           				
				  <h5><a href="dashboard.php">Home</a> | <a href="clients.php">Clients</a> | Details</h5>                                                 
			  </div>                
		  </div>
                 <!-- /. ROW  -->
                 
		  <hr />               
		  <div class="row">
			  <div class="col-md-12">
			  
			  <?php								
								$client_id = $_GET['client_id']; 							
								$sql = "SELECT * FROM `clients` WHERE `client_id`= '$client_id'"; 							
								$result = $connect->query($sql);							
								if($result){							
									$crow = mysqli_fetch_array($result);
								?>
                     
								<table class="table table-hover table-striped">
						  
									<tbody>
							
										<tr>
							  
											<td  style="width: 15%;">
												<strong>Client Name</strong>
											</td>
							  
											<td  style="width: 15%;">
												<?php echo $crow['client_name']; ?>
											</td>
							  
											
										</tr>
							
							<tr>
							  <td><strong>Email</strong></td>
							  <td><?php echo $crow['client_email']; ?></td>
							 
							 
							</tr>
							<tr>
							  <td><strong>Phone Number</strong></td>
							  <td><?php echo $crow['client_phone']; ?></td>
							 
							</tr>
										
							<tr>
							  <td><strong>Address</strong></td>
							  <td><?php echo $crow['client_address']; ?></td>
							 
							</tr>
							
							
						  </tbody>
						</table>

						<?php
        }
        ?>

			  
			  </div>
			  
			  
			  
			  
			  <div class="col-md-12">					
				  <div id="exTab2" class="container">	
					  <ul class="nav nav-tabs">				
						  <li class="active"><a  href="#1" data-toggle="tab"><i class="fa fa-user"></i> Details</a></li>
						  <li><a href="#2" data-toggle="tab"><i class="fa fa-pencil"></i>Locations</a></li>
						  <li><a href="#3" data-toggle="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>Billing</a></li>
						  
					  </ul>
		
					  
					  <div class="tab-content ">				  
							<div class="tab-pane active" id="1">								
								<div class="col-md-6">
									<form role="form" method="post" enctype="multipart/form-data" action="client_process.php">
                                      
                                        <div class="form-group">
                                            <label>Client Name</label>
                                            <input class="form-control" type="text" required name="cl_name" placeholder="Enter Client Name " />
                                        </div>
										
										<div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="cl_email"  requiredplaceholder="demo@example.com" />
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
							</div>
				
							
							<div class="tab-pane" id="2">
								
								<table class="table table-striped table-bordered table-hover text-center">
									<?php
    $query=mysqli_query($connect,"select count(loc_id) from `locations`");
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 10;
	$last = ceil($rows/$page_rows);
	if($last < 1){
		$last = 1;
	}
	$pagenum = 1;
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	if ($pagenum < 1) { 
		$pagenum = 1; 
	} 
	else if ($pagenum > $last) { 
		$pagenum = $last; 
	}
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	$nquery=mysqli_query($connect,"SELECT * FROM `locations`  $limit");
	$paginationCtrls = '';
	if($last != 1){
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-default">Previous</a> &nbsp; &nbsp; ';
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-default">Next</a> ';
    }
	}

?>    
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Location Details</th>
                                            <th>Requirements</th>
											 
                                            
											 <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                    while($crow = mysqli_fetch_array($nquery)){
                                    ?>
                                        <tr>
                                            <td><?php echo $crow['loc_id']; ?></td>
                                            <td><?php echo $crow['duty_title']; ?><br> <?php echo $crow['duty_address']; ?></td>
											
                                            <td><?php echo $crow['duty_timing']; ?> : <?php echo $crow['guard_type']; ?> (<?php echo $crow['cost_client']; ?> Per Day) </td>
                                          							
                                           
                                            
                                            <td><a href="client-details.php?client_id=<?php echo $crow['client_id'];?>">
												<button class="btn btn-info"><i class="fa fa-pencil"></i> Details</button>
												</a>
												<button class="btn btn-info"><i class="fa fa-pencil"></i>Edit</button>
												<button class="btn btn-info"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                        </tr>
                                      <?php
                                    }		
                                ?>

                                    </tbody>
                                </table>

								
								<button class="btn btn-info" data-toggle="modal" data-target="#addlocationModal"><i class="fa fa-plus" aria-hidden="true"></i>Add Location</button>
				
							</div>
        
							<div class="tab-pane" id="3">
								<!--<div class="col-md-6">
									<img src="img/dp.png" alt="">
									
								</div>-->
								
								
								<!--<div class="col-md-6">
									<form action="" enctype="multipart/form-data" method="post">
										
										<div class="form-group" style="padding-top: 50px;">
											<input type="file" class="form-control">
																							
									</div>
										
									</form>
								</div>-->
                                
                               <!-- start client Billing -->
                               
           <?php
				$salaryQuery = mysqli_query($connect,"select * from `duties` WHERE `client_id`= '$client_id'");
				$employeeSalaryAmount = 0;
				$clientBillAmount =0;
				$totalDuties = 0;
				$presentDuties = 0;
				$absentDuties = 0;
				while($salaryrow = mysqli_fetch_array($salaryQuery)){
					$employeeSalaryAmount += $salaryrow['guard_salary'];
					
					$totalDuties += 1;
					if($salaryrow['duty_status'] == 'Present'){
						$presentDuties += 1;
						$clientBillAmount += $salaryrow['client_cost'];
					} else {
						$absentDuties += 1;
						}
				}
				
			?>    
                               
                               	<div class="row", style="background-color: #fff9dd; margin: 20px; padding: 10px;">   
      
    <div class="col-md-1 col-sm-1 col-xs-1">                    
                <a href="#" class="employee_button1">
                <div class=" noti-box1" style="text-align: center;">                
                                       
                        <i class="fa fa-arrow-left" style="font-size: 25px; line-height: 40px;"></i>                
                        <!-- <p>SALARY</p> -->
            
                </div>   
                </a>
                
            </div>
            <div class="col-md-10 col-sm-10 col-xs-10">                     
                <a href="#" class="employee_button1">
                <div class=" noti-box1" style="text-align: center;">                
                                       
                        <!-- <i class="fa fa-users" style="font-size: 25px; padding-top: 5px;"></i> -->                
                        <p>September 2022</p>
            
                </div>   
                </a>
                
            </div>
                    
            
             <div class="col-md-1 col-sm-1 col-xs-1"> 
                 <a href="#" class="employee_button1">
                <div class=" noti-box1 " style="text-align: center;">                
                                       
                        <i class="fa fa-arrow-right" style="font-size: 25px; line-height: 40px;"></i>                
                        <!-- <p>PRINT</p> -->
            
                </div>   
                 </a>
                
            </div>       
            
        </div>
        
        
        <div class="row">                
            <div class="col-md-3 col-sm-3 col-xs-3">                    
                <a href="#" class="employee_button">
                    <div class=" noti-box" style="text-align: center;">                
                                       
                            <h2><?php echo $presentDuties ?> / 30 </h2>
                            <p>Duties</p>
                
                    </div>   
                </a>
            </div>

             <div class="col-md-3 col-sm-3 col-xs-3">                    
                <a href="#" class="employee_button">
                    <div class=" noti-box" style="text-align: center;">                
                                           
                            <h2><?php echo $clientBillAmount ?></h2>
                            <p>Billing Amount</p>
                
                    </div>   
                </a>
            </div>
         </div>
         
         
         <div class="row" >
                  
                    <div class="col-md-6 col-sm-6 col-xs-6">
               
                        <div class="form-group">
                            <label>Billing Information</label>
                            <textarea class="form-control" name="cl_details" rows="3"></textarea>
                        </div>
                    
                    </div>
                </div>
                 <!-- /. ROW  -->
                 
                 
                 <div class="row" >
                  
                    <div class="col-md-6 col-sm-6 col-xs-6">
               
                        <div class="form-group">
                            <label>Billing Amount <br><?php echo $clientBillAmount; ?></label>
                            <input type="text" name="amount" class="form-control">
                            <!-- <textarea class="form-control" name="cl_details" rows="3"></textarea> -->
                        </div>
                    
                    </div>
                 </div>
                 <!-- /. ROW  -->
                 
               
                 	<button class="btn btn-info m-4">Generate Bill</button>
                    
                    <label> Bill cann't be altered after being generated. </label>
               
                               
                              <!-- End Client Billing -->
          
							</div>
						
			
						</div>
  
					</div>




				
					
                </div>
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->

<!-- start Modal form -->
<div class="modal fade" id="addlocationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 999999">
  
	<div class="modal-dialog" role="document">
		<div class="modal-content">     
			<div class="modal-header text-center pt-2 pb-2" >        
				<h4 class="modal-title w-100 font-weight-bold">Add Location</h4>        
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">          
					<span aria-hidden="true">&times;</span>        
				</button>      
			</div>
      
			<form action="location_process.php?id=<?php echo $client_id ?>" method="post">      
				<div class="modal-body mx-3">        
					<div class="md-form mb-2">          
						<label class="ml-2">Duty Title</label>          
						<input type="text" id="duty_title" required name="duty_title" class="form-control validate">        
					</div>
        
					<div class="md-form mb-2">          
						<label class="ml-2">Address</label>          
						<input type="text" id="duty_address" required name="duty_address" class="form-control validate">        
					</div>     
		  
					  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center timing-table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Timing</th>
                                    <th scope="col">Gaurd Type</th>
                                    <th scope="col">Cost For Client</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    <td><input class="form-control rounded-0" type="text" name="timing" placeholder="Timing"></td>
                                    <td><input class="form-control rounded-0" type="text" required name="guard_type" placeholder="Guard Type"></td>
                                    <td><input class="form-control rounded-0" type="text" name="cost_client" placeholder="Cost for Client"></td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
					 <!-- Add rows button-->
                   <!-- <a class="btn btn-primary rounded-0 btn-block" id="insertRow" href="#">Add new row</a>
                
	
	
	<script>
	$(function () {

    // Start counting from the third row
    var counter = 3;

    $("#insertRow").on("click", function (event) {
        event.preventDefault();
        var newRow = $("<tr>");
        var cols = '';

        // Table columns
        cols += '<td><input class="form-control rounded-0" type="text" name="timing" placeholder="Timing"></td>';
        cols += '<td><input class="form-control rounded-0" type="text" name="guard_type" placeholder="Guard Type"></td>';
        cols += '<td><input class="form-control rounded-0" type="text" name="cost_client" placeholder="Cost for Client"></td>';
        cols += '<td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button</td>';

        // Insert the columns inside a row
        newRow.append(cols);
        // Insert the row inside a table
        $("table").append(newRow);
        // Increase counter after each row insertion
        counter++;
    });

    // Remove row when delete btn is clicked
    $("table").on("click", "#deleteRow", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
});
	
	
	
	</script>
			   -->
					
					<!--<table class="table table-hover table-striped">
						<tbody>    
							<tr>      
								<td><strong>Timing:</strong></td>      
								<td><strong>Guard Type:</strong></td>      
								<td>Cost for Client</td>		
								<td></td>    
							</tr>
    	  					
							<tr>      		  
								<td> 		  
									<div class="form-group">                               			  
										<input class="form-control" type="text" name="duty_timing" placeholder="10AM to 6PM " />       		  
									</div>		  
								</td>
      
								<td>
									<div class="form-group">                                            
										<select class="form-control" name="guard_type">                                                
											<option>Male</option>                                                
											<option>Female</option>                                                
											<option>Trans Gender</option>                                                                
										</select>                                        
									</div>
								</td>
      
								<td>
									<div class="form-group">                                                                              
										<input class="form-control" name="cost_client" placeholder="300" />                                        
									</div>
								</td>
      
								<td>
									<button><i class="fa fa-trash-o"></i></button>
								</td>
    
							</tr>	
							
						</tbody>
					</table>-->

					<!--<button onclick="myCreateFunction()" style="text-align: center;">
						<i class="fa fa-plus"></i>
					</button>-->

      
				</div>
      
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-success">Add Location</button><br> 
				</div>
      
			</form>
		</div>
	</div>
</div>

 <!-- end Modal form --->


<?php
include('footer.php');
?>