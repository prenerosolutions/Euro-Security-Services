<?php
include('config.php');
include ('header.php');
include('sidebar.php');
$date = date("F, Y");

$month = $date;

$minusMonth = 1;
$plusMonth =1;

if(isset($_POST['previusMonth'])){
	$date = date("F, Y", strtotime("-$minusMonth month"));
	$minusMonth ++;
	$month = $date;
	echo $date;
}

if(isset($_POST['nextMonth'])){
	$date = date("F, Y", strtotime("$plusMonth month"));
	$plusMonth += 1;
	$month = $date;
	echo $date;
}


?>

        
<div id="page-wrapper" >          
	<div id="page-inner">                
		<div class="row">                    
			<div class="col-md-12">                     
				<h2>Salary</h2>                           
				<h5><a href="dashboard.php">Home</a> / Salary</h5>                    
			</div>                
		</div>              
                 <!-- /. ROW  -->
                  
		<hr />
    
    <div class="row", style="background-color: #fff9dd; margin: 20px; padding: 10px;">   
      
    <div class="col-md-1 col-sm-1 col-xs-1">           			
				<a class="employee_button1" >
				<div class=" noti-box1" style="text-align: center;">                
					         <form action="#" method="post">
					<button type="submit" name="previusMonth">
								 
								
					<i class="fa fa-arrow-left" style="font-size: 25px; line-height: 40px;" ></i> 
						
						 </button>
					</form>          
						               
						<!-- <p>SALARY</p> -->
			
				</div>	 
				</a>
				
			</div>
			<div class="col-md-10 col-sm-10 col-xs-10">           			
				<a href="#" class="employee_button1">
				<div class=" noti-box1" style="text-align: center; line-height: 40px;">                
					                   
						<!-- <i class="fa fa-users" style="font-size: 25px; padding-top: 5px;"></i> -->                
						<p>
					<?php 
							echo $month;
							?>
					</p>
			
				</div>	 
				</a>
				
			</div>
                    
			
             <div class="col-md-1 col-sm-1 col-xs-1"> 
				 <a href="#" class="employee_button1">
				<div class=" noti-box1 " style="text-align: center;">                
					         <form action="#" method="post">
					<button type="submit" name="nextMonth">
								 <i class="fa fa-arrow-right" style="font-size: 25px; line-height: 40px;"></i>        
								 
								 </button>
					</form>         
					
				</div>	 
				 </a>
				
			</div>       
			
		</div>


		<div class="row">                
			<div class="col-md-6 col-sm-6 col-xs-6">           			
				<a href="#" class="employee_button">
				<div class=" noti-box" style="text-align: center;">                
					                   
						<!-- <i class="fa fa-users" style="font-size: 25px; padding-top: 5px;"></i> -->
						<!-- <p>0</p> -->                
						<div style="font-size: 22px;">0</div>
						<p>SALARY PAID THIS MONTH</p>
			
				</div>	 
				</a>
				
			</div>
                    
			
             <div class="col-md-6 col-sm-6 col-xs-6"> 
				 <a href="#" class="employee_button">
				<div class=" noti-box " style="text-align: center;">                
					                   
						<i class="fa fa-print" style="font-size: 25px; padding-top: 5px;"></i>                
						<p>PRINT REPORT</p>
			
				</div>	 
				 </a>
				
			</div>       
			
		</div>
                 <!-- /. ROW  -->
                
		
		<hr />                
                
               
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
    $query=mysqli_query($connect,"select count(salary_id) from `salary`");
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
	$nquery=mysqli_query($connect,"select * from `salary` $limit");
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
                                            <th>Paid to</th>
                                            <th>Salary Amount</th>
                                            
											 <th>Status</th>
											 <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                    while($crow = mysqli_fetch_array($nquery)){
										$employeeCode = $crow['employee_code'];
                                    ?>
                                        <tr>
                                            <td><?php echo $crow['salary_id']; ?></td>
                                            <td><?php echo $crow['salary_paid_to']; ?></td>
                                           <!-- <td><?php// echo $crow['salary_amount']; ?> </td> -->
                                            <td>
                                            <?php
                                            	$salaryquery=mysqli_query($connect,"select * from `duties` WHERE employee_code = $employeeCode");
												$salaryAmount = 0;
												while($salaryrow = mysqli_fetch_array($salaryquery)){
													$salaryAmount += $salaryrow['guard_salary'];
												}
												echo $salaryAmount;
										
											?>
                                            </td>
                                           
                                            
                                            <td>
                                            	<a href="#">
												<button class="btn btn-info"> <?php echo $crow['salary_status']; ?></button>
												</a>
											</td>
												<td>
													<a href="employee-details.php?employee_code=<?php echo $crow['employee_code'];?>">
													
													<button class="btn btn-info"><i class="fa fa-add"></i>Generate Salary</button>
												</a>
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
                       
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
<?php
include('footer.php');
?>