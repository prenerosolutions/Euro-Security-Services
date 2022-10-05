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
				<h5><a href="dashboard.php">Home</a> / Employee</h5>                    
			</div>                
		</div>              
                 <!-- /. ROW  -->
                  
		<hr />
                
		<div class="row">                
			<div class="col-md-6 col-sm-6 col-xs-6">           			
				<a href="#" class="employee_button">
				<div class=" noti-box" style="text-align: center;">                
					                   
						<i class="fa fa-users" style="font-size: 25px; padding-top: 5px;"></i>                
						<p>All Employee</p>
			
				</div>	 
				</a>
				
			</div>
                    
			
             <div class="col-md-6 col-sm-6 col-xs-6"> 
				 <a href="add_employee.php" class="employee_button">
				<div class=" noti-box " style="text-align: center;">                
					                   
						<i class="fa fa-plus" style="font-size: 25px; padding-top: 5px;"></i>                
						<p>Add New Employee</p>
			
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
    $query=mysqli_query($connect,"select count(employee_code) from `employee`");
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
	$nquery=mysqli_query($connect,"select * from `employee` $limit");
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
                                            <th>Name</th>
                                            <th>Email / Phone</th>
                                            <th>Type</th>
                                             <th>Today</th>
											 <th>Tomorow</th>
											 <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
                                    while($crow = mysqli_fetch_array($nquery)){
                                    ?>
                                        <tr>
                                            <td><?php echo $crow['employee_code']; ?></td>
                                            <td><?php echo $crow['employee_name']; ?></td>
                                            <td><?php echo $crow['emp_email']; ?> / <?php echo $crow['emp_phone']; ?></td>
                                            <td><?php echo $crow['emp_type']; ?></td>
                                            <td><button class="duty_btn"> No Duty Set</button></td>
											 <td><button class="duty_btn"> No Duty Set</button></td>
                                            <td><a href="employee-details.php?employee_code=<?php echo $crow['employee_code'];?>"><button class="btn btn-info"><i class="fa fa-pencil"></i> Edit</button></a>
											<button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
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