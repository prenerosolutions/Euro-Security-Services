<?php
include('config.php');
include ('header.php');
include('sidebar.php');
?>

        
  <div id="page-wrapper" >         
	  <div id="page-inner">
		  <div class="row">                    
			  <div class="col-md-12">                    
				  <h2>Billing </h2>                           				
				  <h5><a href="dashboard.php">Home</a> |Billing</h5>                                                 
			  </div>                
		  </div>
                 <!-- /. ROW  -->
                 
		  <hr />               
		  <div class="row">                
			  <div class="col-md-12">
				  <ul class="area_arrow">
				  <li> <a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i> </a> </li>
					  <li>  <h2 align="center">Sep-2022</h2>  </li>
					  <li> <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> </a> </li>
				  
				  
				  </ul>
				 
			   
				
				 
  
					</div>
			 
				    <?php	
									
														
								$sql = "SELECT
										clients.client_id, 
										clients.client_name, 
										clients.client_email, 
										clients.client_phone, 
										clients.`password`, 
										clients.other_details, 
										clients.client_address, 
										clients.gst_num, 
										clients.pan_num, 
										clients.date_added, 
										locations.loc_id, 
										locations.client_id, 
										locations.duty_title, 
										locations.duty_address, 
										locations.duty_timing, 
										locations.guard_type, 
										locations.cost_client, 
										locations.date_added, 
										duties.duty_id, 
										duties.client_id, 
										duties.duty_status,
										duties.employee_code
									FROM
										clients
										INNER JOIN
										locations
										INNER JOIN
										duties
									WHERE
										clients.client_id = locations.client_id AND
										duties.client_id = clients.client_id "; 
				  
				  
							
									
							  
								$result = $connect->query($sql);							
															
									while($crow = mysqli_fetch_array($result)){
					 					$employee_code = $crow['employee_code'];	
									//echo($employee_code);
										//die;
										
										$count = "SELECT count(*) as total_duty FROM `duties` WHERE `employee_code`= $employee_code";
										$resultc = $connect->query($count);
										$countrow = mysqli_fetch_array($resultc);
										
				  
				  ?>
		   <div class="col-md-12" style="padding-bottom: 20px; padding-top: 20px; border: 1px solid #B7B7B7; margin-bottom: 30px;">
		  		<div class="col-lg-4 float-left" style="height: 250px;">
					<table class="table table-striped table-bordered table-hover">
					  <tbody>
						<tr>
						  <td><h2><?php echo $crow['client_name']; ?></h2></td>
						</tr>
						<tr>
						  <td><p><?php echo $crow['client_email']; ?> </p></td>
						</tr>
						<tr>
						  <td><p><?php echo $crow['client_phone']; ?> </p></td>
						</tr>
						<tr>
						  <td><p><?php echo $crow['client_address']; ?> </p></td>
						</tr>
					  </tbody>
					</table>

					
								
							  
							  
					
				  </div>
		  			<div class="col-lg-8 float-left" style="height: 250px;">
						
						<table class="table table-striped table-bordered table-hover">
						  <tbody>
							<tr>
							  <td><p><?php echo $crow['duty_title']; ?> </p></td>
							</tr>
							<tr>
							  <td><p><?php echo $crow['duty_address']; ?> </p></td>
							</tr>
							<tr>
                            <?php 
							$myClientId = $crow['client_id'];
								$salaryquery=mysqli_query($connect,"select * from `duties` ");
												$myDuties = 0;
												while($salaryrow = mysqli_fetch_array($salaryquery)){
													if($salaryrow['duty_status'] == 'Present' && $salaryrow['client_id'] == $myClientId){
													
													$myDuties += 1;
													
													}
												}
												
							?>
							  <td> <p><?php echo $myDuties //$countrow['total_duty']; ?> <strong>Total Duties</strong> </p></td>
							</tr>
							<tr>
							  <td><a href="client-details.php?client_id=<?php echo $crow['client_id'];?>"><input type="button" value="Generate Billing" class="btn btn-success"></a></td>
							</tr>
						  </tbody>
						</table>
						
				  </div>
		 
		
				  
				 </div> 
		  
		  <?php
       
									}
        ?>		  
				  
				  
			 
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
					
                    <div class="md-form mb-2">          
						<label class="ml-2">Duty Title</label>          
						<input type="text" id="duty_title" name="duty_title" class="form-control validate">        
					</div>
        
					<div class="md-form mb-2">          
						<label class="ml-2">Address</label>          
						<input type="text" id="duty_address" name="duty_address" class="form-control validate">        
					</div>     
                    <!--  Bootstrap table-->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center">
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
                                    <td><input class="form-control rounded-0" type="text" name="guard_type" placeholder="Guard Type"></td>
                                    <td><input class="form-control rounded-0" type="text" name="cost_client" placeholder="Cost for Client"></td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    <!-- Add rows button-->
                    <a class="btn btn-primary rounded-0 btn-block" id="insertRow" href="#">Add new row</a>
                
	
	
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
			   
				</div>
      
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-success">Add Location</button><br> 
				</div>
      
			</form>-->
		</div>
	</div>


</div>

 <!-- end Modal form --->

<!-- start Modal form -->
<div class="modal fade" id="adddutyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index: 999999">
  
	<div class="modal-dialog" role="document">
		<div class="modal-content">     
			<div class="modal-header text-center pt-2 pb-2" >        
				<h4 class="modal-title w-100 font-weight-bold">Add Location</h4>        
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">          
					<span aria-hidden="true">&times;</span>        
				</button>      
			</div>
      
			<form action="duty_process.php?id=<?php echo $client_id ?>" method="post">      
				<div class="modal-body mx-3">        
					<div class="md-form mb-2">          
					  <label class="ml-2">Requirments</label>   
						<p>
						  <label>
						    <input type="radio" name="requirement" value="10AM to 6PM : Male Guard : Cost: 500" id="requirement_0">
						    10AM to 6PM : Male Guard : Cost: 500</label>
						  <br>
						  <label>
						    <input type="radio" name="requirement" value="10AM to 6PM : Gun Man : Cost: 700" id="requirement_1">
						    10AM to 6PM : Male Guard : Cost: 500</label>
						  <br>
							<label>
						    <input type="radio" name="requirement" value="6PM to 10AM : Gun Man : Cost: 1000" id="requirement_1">
						    10AM to 6PM : Male Guard : Cost: 500</label>
						  <br>
							<label>
						    <input type="radio" name="requirement" value="6PM to 10AM : Gun Man : Cost: 1000" id="requirement_1">
						    Extra Duty</label>
						  <br>
					  </p>
					     
					</div>
        
					<div class="md-form mb-2">          
						<label class="ml-2">Duty Timing</label>          
						<input type="text" id="duty_timing" name="duty_timing" class="form-control validate">        
					</div>  
					
					<div class="md-form mb-2">          
						<label class="ml-2">Guard</label>          
						<select class="form-control validate" name="guard_name">
							
							<?php								
								$employee_code = $_GET['employee_code']; 							
								$sql = "select * from employee"; 							
								$result = $connect->query($sql);							
							while($crow = mysqli_fetch_array($result))	{							
								?>
						<option> <?php echo $crow['employee_name']; ?> (<?php echo $crow['emp_type']; ?>) - <?php echo $crow['per_day_salary']; ?> </option>
						
						<?php
        }
        ?>
					
						</select>      
					</div>  
		  
					  <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover text-center timing-table">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">Guard's Salary (this duty)</th>
                                    <th scope="col">Client Salary</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                    <td><input class="form-control rounded-0" type="text" name="guard_salary" placeholder="Guard's Salary"></td>
                                    <td><input class="form-control rounded-0" type="text" name="client_cost" placeholder="Client Salary"></td>
                                    
                                    
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
					
                  

			   
					
				
      
				</div>
      
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-info">Save</button><br> 
				</div>
      
			</form>
		</div>
	</div>
</div>

 <!-- end Modal form --->

<?php
include('footer.php');
?>