<?php
include('config.php');
include ('header.php');
include('sidebar.php');
$employee_code = $_GET['employee_code']; 
$statusMsg = '';

//$date = date("Y-m-d h:i:s");

// start upload profile pic
if(isset($_POST["profile"])){
if( !empty($_FILES["profile_pic"]["name"]) ){
	
// File upload path
$targetDir = "uploads/profile_pic/";

$profile = time().($_FILES["profile_pic"]["name"]);
$targetFilePath1 = $targetDir . $profile;
$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType1, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $targetFilePath1)){
            // Insert image file name into database
            $insert = $connect->query("UPDATE `employee` SET `dp`= '$profile' WHERE `employee_code`= $employee_code");
            if($insert){
                $statusMsg = "Profile image has been uploaded successfully.";
            }else{
                $statusMsg = "Image upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your Image.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select Profiel Image to upload.';
}

// Display status message
echo $statusMsg;
echo "<script>alert('$statusMsg')</script>";
}
// end upload profile pic


//start upload signature
if(isset($_POST["signature"])){
if( !empty($_FILES["signature"]["name"]) ){
	
// File upload path
$targetDir = "uploads/signature/";

$sig = time().($_FILES["signature"]["name"]);
$targetFilePath1 = $targetDir . $sig;
$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType1, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["signature"]["tmp_name"], $targetFilePath1)){
            // Insert image file name into database
            $insert = $connect->query("UPDATE `employee` SET `signature`= '$sig' WHERE `employee_code`= $employee_code");
            if($insert){
                $statusMsg = "Signature image has been uploaded successfully.";
            }else{
                $statusMsg = "Image upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your Image.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select Signature Image to upload.';
}

// Display status message
echo $statusMsg;
echo "<script>alert('$statusMsg')</script>";
}
// end upload signature

// start upload adhaar card
if(isset($_POST["adhaar_card"])){
if( !empty($_FILES["adhaar_card"]["name"]) ){
	
// File upload path
$targetDir = "uploads/adhaar_card/";

$adharcard = time().($_FILES["adhaar_card"]["name"]);
$targetFilePath1 = $targetDir . $adharcard;
$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType1, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["adhaar_card"]["tmp_name"], $targetFilePath1)){
            // Insert image file name into database
            $insert = $connect->query("UPDATE `employee` SET `adhaar_card`= '$adharcard' WHERE `employee_code`= $employee_code");
            if($insert){
                $statusMsg = "Adhaar Card image has been uploaded successfully.";
            }else{
                $statusMsg = "Image upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your Image.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select Adhaar Card Image to upload.';
}

// Display status message
echo $statusMsg;
echo "<script>alert('$statusMsg')</script>";
}
// end upload adhaar card


// start update employee Profile

if(isset($_POST["update_profile"])){
if( !empty($_POST["emp_name"]) ){
	
	//$empName = $_POST["emp_name"];
	$emp_name = $_POST['emp_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$type = $_POST['type'];
	$pds = $_POST['pds'];
	$esi_num = $_POST['esi_num'];
	$esi = $_POST['esi'];
	$pf_num = $_POST['pf_num'];
	$pf = $_POST['pf'];
	$pan = $_POST['pan'];
	



    $insert = $connect->query("UPDATE `employee` SET `employee_name`= '$emp_name', `emp_email`='$email',`emp_phone`='$phone', `password`='$password', `address`='$address', `emp_type`='$type', `per_day_salary`='$pds', `esi`='$esi_num', `esi_per`='$esi', `pf_num`='$pf_num', `pf_per`='$pf', `pan_num`='$pan' WHERE `employee_code`= $employee_code");
            if($insert){
                $statusMsg = "Employee Profile update successfully.";
            }else{
                $statusMsg = "Profile update failed, please try again.";
            } 
       
}else{
    $statusMsg = 'All fields are requied to update the Profile.';
}

// Display status message
echo $statusMsg;
echo "<script>alert('$statusMsg')</script>";
}

// end update employee Profile
?>

        
  <div id="page-wrapper" >         
	  <div id="page-inner">
		  <div class="row">                    
			  <div class="col-md-12">                    
				  <h2>Employee Details</h2>                           				
				  <h5><a href="dashboard.php">Home</a> / Employee-Details</h5>                                                 
			  </div>                
		  </div>
                 <!-- /. ROW  -->
                 
		  <hr />               
		  <div class="row">                
			  <div class="col-md-12">					
				  <div id="exTab2" class="container">	
					  <ul class="nav nav-tabs">				
						  <li class="active"><a  href="#1" data-toggle="tab"><i class="fa fa-user"></i> Details</a></li>
						  <li><a href="#2" data-toggle="tab"><i class="fa fa-pencil"></i>Edit Details</a></li>
						  <li><a href="#3" data-toggle="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>Photo</a></li>
						  <li><a href="#4" data-toggle="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>Signature</a></li>
						  <li><a href="#5" data-toggle="tab"><i class="fa fa-picture-o" aria-hidden="true"></i>Aadhaar Card</a></li>
						  <li><a href="#6" data-toggle="tab"><i class="fa fa-calendar" aria-hidden="true"></i>Schedule</a></li>
						  <li><a href="#7" data-toggle="tab"><i class="fa fa-inr" aria-hidden="true"></i>Salary</a></li>
					  </ul>

			
						
					  <div class="tab-content ">
						  
							<div class="tab-pane active" id="1">								
								<?php								
								$employee_code = $_GET['employee_code']; 							
								$sql = "select * from employee where employee_code = '$employee_code'"; 							
								$result = $connect->query($sql);							
								if($result){							
									$crow = mysqli_fetch_array($result);
									//$profileImage = 'this is start';
									$profileImage = $crow['dp'];
									$signatureImage = $crow['signature'];
									$adhaarCard = $crow['adhaar_card'];
								?>
                     
								<table class="table table-hover table-striped">
						  
									<tbody>
							
										<tr>
							  
											<td  style="width: 15%;">
												<strong>Employee Code</strong>
											</td>
							  
											<td  style="width: 15%;">
												<?php echo $crow['employee_code']; ?>
											</td>
							  
											<td  style="width: 35%;" rowspan="11">
												<img src="uploads/profile_pic/<?php echo $profileImage;?>" alt="" style="max-width: 500px">
								
												<p>Change Image</p>
											</td>
							  
											<td  style="width: 35%;" rowspan="11">
												<h2>Today</h2>
								
												<p><span>No Duty Set</span></p>
								
											</td>
							
										</tr>
							<tr>
							  <td><strong>Employee Name</strong></td>
							  <td><?php echo $crow['employee_name']; ?></td>
							 
						
							</tr>
							<tr>
							  <td><strong>Email</strong></td>
							  <td><?php echo $crow['emp_email']; ?></td>
							 
							 
							</tr>
							<tr>
							  <td><strong>Phone Number</strong></td>
							  <td><?php echo $crow['emp_phone']; ?></td>
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							
						  </tbody>
						</table>

						<?php
      //  }
        ?>
					
				
							</div>
				
							
							<div class="tab-pane" id="2">							
								<form role="form" method="post" enctype="multipart/form-data" action="#">
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>Employee Name</label>
												 <input class="form-control" type="text" name="emp_name" placeholder="Enter Employee Name " value="<?php echo $crow['employee_name']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="demo@example.com" value="<?php echo $crow['emp_email']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												  <label>Phone</label>
                                            <input class="form-control" type="text" name="phone" placeholder="+91 312 7524000" value="<?php echo $crow['emp_phone']; ?>"/>
											</div>
									</div>
										
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="xxxxxxxx" value="<?php echo $crow['password']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>Adress / Emergency Contact Details</label>
                                            <textarea class="form-control" name="address" rows="3">
                                            <?php echo $crow['address']; ?>
                                            </textarea>
											</div>
									</div>
									
									<!--<div class="form-group">
											 <div class="col-sm-6">
												<label>Type</label>
                                            <select class="form-control" name="type" >
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Trans Gender</option>
                                              
                                            </select>
											</div>
									</div>-->
                                    <div class="form-group">
                                         <div class="col-sm-6">
                                            <label>Type</label>
                                        <input class="form-control" name="type" placeholder="0000" value="<?php echo $crow['emp_type']; ?>" readonly/>
                                        </div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												<label>Per Day Salery</label>
                                            <input class="form-control" name="pds" placeholder="0000" value="<?php echo $crow['per_day_salary']; ?>"/>
											</div>
									</div>
										
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>ESI Number</label>
                                            <input class="form-control" name="esi_num" placeholder="ESI0000" value="<?php echo $crow['esi']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												<label>ESI %</label>
                                            <input class="form-control" name="esi" placeholder="%" value="<?php echo $crow['esi_per']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>PF Number</label>
                                            <input class="form-control" name="pf_num" placeholder="PF0000" value="<?php echo $crow['pf_num']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-6">
												 <label>PF %</label>
                                            <input class="form-control" name="pf" placeholder="%" value="<?php echo $crow['pf_per']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-12">
												  <label>PAN Number</label>
                                            <input class="form-control" name="pan" placeholder="PAN000000" value="<?php echo $crow['pan_num']; ?>"/>
											</div>
									</div>
									
									<div class="form-group">
											 <div class="col-sm-12">
												  
                                          <button type="submit" class="btn btn-info" style="margin-top: 25px;" name="update_profile">Update Employee</button>
											</div>
									</div>
									
									
									
                                      										
										
										
                                        
                                       

                                    </form>
                                    
                                    <?php
									}
									?>
				
							</div>
        
							<div class="tab-pane" id="3">
								<div class="col-md-6">
									<img src="uploads/profile_pic/<?php echo $profileImage;?>"
                                     alt="uploads/profile_pic/<?php echo $profileImage;?>" style="max-width: 500px;">
                                    <?php //echo $profileImage; ?>
                                    
								</div>
								
								
								<div class="col-md-6">
									<form action="#" enctype="multipart/form-data" method="post">
										
										<div class="form-group" style="padding-top: 50px;">
											<input type="file" class="form-control" name="profile_pic">
																							
									</div>
										<button type="submit" class="btn btn-info" name="profile">Update Image</button>
									</form>
								</div>
          
							</div>
							
							<div class="tab-pane" id="4">
          
								<div class="col-md-6">
									<img src="uploads/signature/<?php echo $signatureImage;?>" alt="" style="max-width: 500px">
								</div>
								
								
								<div class="col-md-6">
									<form action="#" enctype="multipart/form-data" method="post">
										
										<div class="form-group" style="padding-top: 50px;">
											<input type="file" class="form-control" name="signature">
                                            
																							
									</div>
                                    <button type="submit" class="btn btn-info" name="signature">Upload Signature</button>
										
									</form>
								</div>
          
				
							</div>
							
							<div class="tab-pane" id="5">
          
								<div class="col-md-6">
									<img src="uploads/adhaar_card/<?php echo $adhaarCard;?>" alt="" style="max-width: 500px">
								</div>
								
								
								<div class="col-md-6">
									<form action="" enctype="multipart/form-data" method="post">
										
										<div class="form-group" style="padding-top: 50px;">
											<input type="file" class="form-control" name="adhaar_card">
																							
									</div>
                                    <button type="submit" class="btn btn-info" name="adhaar_card">Upload Adhaar Card</button>
										
									</form>
								</div>
          
				
							</div>
							
							<div class="tab-pane" id="6">
          
							<!-- Start Employee Shadule session -->
								
								<div class="row" >
                  
                    <div class="col-md-12 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                           Responsive Table Example
                        </div>-->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover text-center">
									<?php
    $query=mysqli_query($connect,"select count(duty_id) from `duties`");
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
	$nquery=mysqli_query($connect,"select * from `duties` $limit");
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
	$n = 0;

?>    
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Client Name</th>
                                            <th>Requirement</th>
                                            
											 <th>Duty Time</th>
											 <th>Per Day Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                    while($crow = mysqli_fetch_array($nquery)){
										$clientId = $crow['client_id'];
										$n++;
                                    ?>
                                        <tr>
                                            <td><?php echo $n; ?></td>
                                            <td>
											<?php
                                            	$salaryquery=mysqli_query($connect,"select * from `clients` WHERE client_id = $clientId");
												
												while($salaryrow = mysqli_fetch_array($salaryquery)){
													//$salaryAmount += $salaryrow['guard_salary'];
													echo $salaryrow['client_name'];
												}
												
										
											?>
											</td>
                                           <!-- <td> </td> -->
                                            <td>
                                            <?php echo $crow['requirements']; ?>
                                            </td>
                                           
                                            
                                            <td>
                                            	
												<button class="btn btn-info"> <?php echo $crow['duty_timing']; ?></button>
												
											</td>
												<td>
													
													
													<button class="btn btn-info"><i class="fa fa-add"></i>
														<?php echo $crow['guard_salary']; ?>
														</button>
												
												</td>
                                        </tr>
                                      <?php
                                    }		
                                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                 <!-- /. ROW  -->
								
								
							<!-- End Employee Shadule session --->
				
							</div>
							
							<div class="tab-pane" id="7">
          <!--start salary-->
          <?php
				$salaryQuery = mysqli_query($connect,"select * from `duties` WHERE employee_code = $employee_code");
				$employeeSalaryAmount = 0;
				$clientBillAmount =0;
				$totalDuties = 0;
				$presentDuties = 0;
				$absentDuties = 0;
				while($salaryrow = mysqli_fetch_array($salaryQuery)){
					$employeeSalaryAmount += $salaryrow['guard_salary'];
					$clientBillAmount += $salaryrow['client_cost'];
					$totalDuties += 1;
					if($salaryrow['duty_status'] == 'Present'){
						$presentDuties += 1;
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
                                       
                            <h2><?php echo $presentDuties ?> / <?php echo $totalDuties ?></h2>
                            <p>Attendence</p>
                
                    </div>   
                </a>
            </div>

             <div class="col-md-3 col-sm-3 col-xs-3">                    
                <a href="#" class="employee_button">
                    <div class=" noti-box" style="text-align: center;">                
                                           
                            <h2><?php echo $employeeSalaryAmount ?></h2>
                            <p>SALARY</p>
                
                    </div>   
                </a>
            </div>

             <div class="col-md-3 col-sm-3 col-xs-3">                    
                <a href="#" class="employee_button">
                    <div class=" noti-box" style="text-align: center;">                
                                           
                            <h2> <?php echo $clientBillAmount ?></h2>
                            <p>Billed amount to customer</p>
                
                    </div>   
                </a>
            </div>

             <div class="col-md-3 col-sm-3 col-xs-3">                    
                <a href="#" class="employee_button">
                    <div class=" noti-box" style="text-align: center;">                
                                           
                            <h2><?php echo $absentDuties ?></h2>
                            <p>Dutes that need attention</p>
                
                    </div>   
                </a>
            </div>
            
        </div>

        
                 <!-- /. ROW  -->
                
        
        <hr />                
                
               
                <div class="row" >
                  
                    <div class="col-md-6 col-sm-6 col-xs-6">
               
                        <div class="form-group">
                            <label>Payment Information</label>
                            <textarea class="form-control" name="cl_details" rows="3"></textarea>
                        </div>
                    
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <div class="row" >
                  
                    <div class="col-md-6 col-sm-6 col-xs-6">
               
                        <div class="form-group">
                            <label>Payment Amount <br><?php echo $employeeSalaryAmount ?></label>
                            <input type="text" name="amount" class="form-control">
                            <!-- <textarea class="form-control" name="cl_details" rows="3"></textarea> -->
                        </div>
                    
                    </div>
                 </div>
                 <!-- /. ROW  -->
                 <button class="btn btn-info">I Payed the SALARY</button>
				
							</div>
			
						</div>
  
			

				
                <!--end salary-->
							</div>
			
						</div>
  
					</div>




					
					
					
					
                   <!-- Tabs navs -->
					 <!--  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>
                      
						<a class="nav-item nav-link" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="false">Edit Details</a>
                      
						<a class="nav-item nav-link" id="nav-photo-tab" data-toggle="tab" href="#nav-photo" role="tab" aria-controls="nav-photo" aria-selected="false">Photo</a>
                      
						<a class="nav-item nav-link" id="nav-signature-tab" data-toggle="tab" href="#nav-signature" role="tab" aria-controls="nav-signature" aria-selected="false">Signature</a>
						
						<a class="nav-item nav-link" id="nav-card-tab" data-toggle="tab" href="#nav-card" role="tab" aria-controls="nav-card" aria-selected="false">Adhaar Card</a>
						
						<a class="nav-item nav-link" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false">Schedule</a>
						
						<a class="nav-item nav-link" id="nav-salary-tab" data-toggle="tab" href="#nav-salary" role="tab" aria-controls="nav-salary" aria-selected="false">Salary</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					  
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<?php
							//	$employee_code = $_GET['employee_code']; 
								//$sql = "select * from employee where employee_code = '$employee_code'"; 
								//$result = $connect->query($sql);
								//	if($result){
								//	$crow = mysqli_fetch_array($result);
?>
                     <table class="table table-hover table-striped">
						  <tbody>
							<tr>
							  <td  style="width: 15%;"><strong>Employee Code</strong></td>
							  <td  style="width: 15%;"><?php //echo $crow['employee_code']; ?></td>
							  <td  style="width: 35%;" rowspan="11"><img src="img/dp.png" alt="">
								<p>Change Image</p></td>
							  <td  style="width: 35%;" rowspan="11">&nbsp;</td>
							</tr>
							<tr>
							  <td><strong>Employee Name</strong></td>
							  <td><?php// echo $crow['employee_name']; ?></td>
							 
						
							</tr>
							<tr>
							  <td><strong>Email</strong></td>
							  <td><?php //echo $crow['emp_email']; ?></td>
							 
							 
							</tr>
							<tr>
							  <td><strong>Phone Number</strong></td>
							  <td><?php //echo $crow['emp_phone']; ?></td>
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							
							</tr>
							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							 
							 
							</tr>
							
						  </tbody>
						</table>

						<?php
       // }
        ?>
						
						
                    </div>
					  
                    <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
					  
                    <div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-photo-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
					  
                    <div class="tab-pane fade" id="nav-signature" role="tabpanel" aria-labelledby="nav-signature-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
					  
					  <div class="tab-pane fade" id="nav-card" role="tabpanel" aria-labelledby="nav-card-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
					  
					  <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
					  
					  <div class="tab-pane fade" id="nav-salary" role="tabpanel" aria-labelledby="nav-salary-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                  </div>-->
<!-- Tabs content -->
					
					
					
					
                </div>
            </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
<?php
include('footer.php');
?>