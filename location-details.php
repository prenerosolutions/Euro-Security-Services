<?php
include('config.php');
include ('header.php');
include('sidebar.php');

$client_id = $_GET['client_id'];
$loc_id = $_GET['loc_id'];

 // $client_id = $_GET['id'];
  //echo $client_id;

    if(isset($_POST['addLocation'])) {
		
	$duty_title = $_POST['duty_title'];
	//$duty_address = $_POST['duty_address'];
	$duty_timing = $_POST['timing'];
	$guard_type = $_POST['guard_type'];
	$cost_client = $_POST['cost_client'];
	
	$date = date("Y-m-d h:i:s");
	
	

$sql = "INSERT INTO `location_requirement`(`loc_id`, `client_id`, `duty_title`, `duty_timing`, `guard_type`, `cost_client`, `date_added`) VALUES ('$loc_id', '$client_id',
								'$duty_title',
								'$duty_timing',
								'$guard_type',
								'$cost_client',
								'$date')";

		$result = $connect->query($sql);
		
	if($result){
	echo'<br>';
	echo '';
	//header('location: locations.php');
} else {
	echo'error';
}
	}

?>

        
  <div id="page-wrapper" >         
	  <div id="page-inner">
		  <div class="row">                    
			  <div class="col-md-12">                    
				  <h2>Location-Details</h2>                           				
				  <h5><a href="dashboard.php">Home</a> | <a href="locations.php">Locations</a> |Location-Details</h5>                                                 
			  </div>                
		  </div>
                 <!-- /. ROW  -->
                 
		  <hr />               
		  <div class="row">                
			  <div class="col-md-12">					
				  <div id="exTab2" class="container">	
					  <ul class="nav nav-tabs">				
						  <li class="active"><a  href="#1" data-toggle="tab"><i class="fa fa-user"></i> Details</a></li>
						  <li><a href="#2" data-toggle="tab"><i class="fa fa-pencil"></i>Requirements</a></li>
						  <li><a href="#3" data-toggle="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>Monthly Schedule</a></li>
						  
					  </ul>
		
					  
					  <div class="tab-content ">				  
							<div class="tab-pane active" id="1">								
								<div class="col-md-12">
									
									<?php	
									
								$loc_id = $_GET['loc_id']; 							
								$sql = "SELECT * FROM `locations` where loc_id = '$loc_id'"; 							
								$result = $connect->query($sql);							
								if($result){							
									$crow = mysqli_fetch_array($result);
								?>
                     
								<table class="table table-hover table-striped">
						  
									<tbody>
							
										<tr>
							  
											<td>
												<strong>Location ID</strong>
											</td>
							  
											<td>
												<?php echo $crow['loc_id']; ?>
											</td>
							  
										 <td><strong>Location Name</strong></td>
							  		<td><?php echo $crow['duty_title']; ?></td>
							  
										
							
										</tr>
							
							<tr>
							  <td><strong>Duty Address</strong></td>
							  <td><?php echo $crow['duty_address']; ?></td>
							 
							  <td><strong>Duty Timing</strong></td>
							  <td><?php echo $crow['duty_timing']; ?></td>
							 
							</tr>
							<tr>
							  <td><strong>Guard Type</strong></td>
							  <td><?php echo $crow['guard_type']; ?></td>
							 
							  <td><strong>Per Day</strong></td>
							  <td><?php echo $crow['cost_client']; ?></td>
							 
							</tr>
							
						  </tbody>
						</table>

						<?php
        }
        ?>
					
				
									
									
									
									
								</div>	
							</div>
				
							
							<div class="tab-pane" id="2">
								
								<table class="table table-striped table-bordered table-hover text-center">
									<?php
    $query=mysqli_query($connect,"select count(loc_id) from `location_requirement`");
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
	$nquery=mysqli_query($connect,"SELECT * FROM `location_requirement` WHERE loc_id = '$loc_id'  $limit");
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
											<th>Duty Title</th>
                                            <th>Requirements</th>
											 
                                            
											 <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                    while($crow = mysqli_fetch_array($nquery)){
                                    ?>
                                        <tr>
                                            <td><?php echo $crow['req_id']; ?></td>
											<td><?php 
												$locationquery=mysqli_query($connect,"select * from `locations` WHERE loc_id = $loc_id");
												while($locRow = mysqli_fetch_array($locationquery)){
													$dutyTitle = $locRow['duty_title'];
													$dutyAddress = $locRow['duty_address'];
													
												}
										echo $dutyTitle;
										echo " \n";
										echo $dutyAddress;
												?></td>
                                            <td><?php echo $crow['duty_title']; ?></td>
											
                                            <td><?php echo $crow['duty_timing']; ?> : <?php echo $crow['guard_type']; ?> (<?php echo $crow['cost_client']; ?> Per Day) </td>
                                          							
                                           
                                            
                                            <td><a href="client-details.php?client_id=<?php echo $crow['client_id'];?>">
												<button class="btn btn-info"><i class="fa fa-pencil"></i> Details</button>
												</a>
												<button class="btn btn-info"><i class="fa fa-pencil"></i>Edit</button>
												<button class="btn btn-info"><i class="fa fa-basket-o"></i></button></td>
                                        </tr>
                                      <?php
                                    }		
                                ?>

                                    </tbody>
                                </table>

								
								<button class="btn btn-info" data-toggle="modal" data-target="#addlocationModal"><i class="fa fa-plus" aria-hidden="true"></i>Add Requirement</button>
				
							</div>
        
							<div class="tab-pane" id="3">	
								
								 
								<div class="row">                    
			  
									<div class="col-md-12">                    
				  
										<h2>Sep 2022</h2>                                                                     
			  
									</div>                
		  
								</div>
								
								
								
								
								<table class="table table-striped table-bordered table-hover text-center">									
									<thead>
								
										<th style="width: 5%;">Day</th>
								
										<th style="width: 95%;">Duties</th>
								
									</thead>
									
									<tbody>
										<tr>
										<td>1</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>2</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>3</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>4</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>5</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>6</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>7</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>8</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>9</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>10</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr><tr>
										<td>11</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>12</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr><tr>
										<td>13</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>14</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										
											<tr>
										<td>15</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>16</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>17</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>18</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>19</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>20</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>21</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>22</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>23</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>24</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr><tr>
										<td>25</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>25</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr><tr>
										<td>26</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										<tr>
										<td>27</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										
										<tr>
										<td>28</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										
										<tr>
										<td>29</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
										
										<tr>
										<td>30</td>
										
										<td><button  class="btn btn-info" data-toggle="modal" data-target="#adddutyModal"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
										</tr>
									
									
									</tbody>
								
								
								
								</table>
								
								
								
								
								</div>
          
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
      
			<form action="#" method="post">
				
						<div class="modal-body mx-3">  
                    <div class="md-form mb-2">          
						<label class="ml-2">Duty Title</label>          
						<input type="text" id="duty_title" required name="duty_title" class="form-control validate">        
					</div>
					<input type="hidden" id="" name="client_id" class="form-control validate" value="<?php echo $client_id; ?>">
					<input type="hidden" id="" name="loc_id" class="form-control validate" value="<?php echo $loc_id; ?>">
					<!--<div class="md-form mb-2">          
						<label class="ml-2">Address</label>          
						<input type="text" id="duty_address" required name="duty_address" class="form-control validate">        
					</div>    --> 
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

			   
				</div>
      
				<div class="modal-footer justify-content-center">
					<button type="submit" class="btn btn-success" name="addLocation">Add Requirement</button><br> 
				</div>
      
			</form>
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
						    <input type="radio" name="requirement" value="10AM to 6PM : Male Guard : Cost: 500" id="requirement_0" r>
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
						<input type="text" id="duty_timing" name="duty_timing" class="form-control validate" required>        
					</div>  
					
					<div class="md-form mb-2">          
						<label class="ml-2">Guard</label>          
						<select class="form-control validate" name="guard_name" required>
							
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
                                   
                                    <td><input class="form-control rounded-0" type="text" required name="guard_salary" placeholder="Guard's Salary"></td>
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