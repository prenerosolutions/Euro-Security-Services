<?php
include('header.php');
include('sidebar.php');



if(isset($_GET['client_id']))
{
	$client_id=$_GET['client_id'];
	$month_name=$_GET['month_name'];
	$monthly_client_cost=$_GET['monthly_client_cost'];
	$pay_method=$_GET['pay_method'];

	$Q="INSERT INTO `client_cost`(`client_id`, `job_id`, `total_amount`, 	`month`, 		`pay_method`, `date_added`)
						VALUES ('$client_id', '0', '$monthly_client_cost', '$month_name', '$pay_method', now())";
	mysqli_query($connect, $Q);

}

?>

    
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Accounts </h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Accounts
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Tables start -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">All Accounts</h4>
				<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="card-body">
					
					<div class="table-responsive">
						<table class="table ">
									<?php
    $query=mysqli_query($connect,"select count(id) from `client_cost`");
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
	$nquery=mysqli_query($connect,"select * from `client_cost` $limit");
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
                                            <th>Client Name</th>
                                            <th>Total Amount</th>
                                             <th>Month</th>
											 <th>Status</th>
											 <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$serial=0;
										$Q="SELECT client_name, clients.client_id, SUM(jobs.client_cost) as monthly_client_cost, SUBSTRING(job_date,1,7) as month_name
											FROM `jobs`
											INNER JOIN sites ON sites.site_id=jobs.site_id
											INNER JOIN clients ON clients.client_id=sites.client_id
											GROUP BY clients.client_id, SUBSTRING(job_date,1,7)";
										$Q=mysqli_query($connect, $Q);
                                    while($crow = mysqli_fetch_array($Q))
                                    {
                                    	$serial++;
										$client_id = $crow['client_id'];
										$month_name = $crow['month_name'];
										$monthly_client_cost = $crow['monthly_client_cost'];
                                    ?>
                                        <tr align="center">
                                            <td><?php echo $serial;?></td>
                                            <td><?php echo $crow['client_name']; ?></td>
											<td>
                                            	 <?php echo $crow['monthly_client_cost']; ?>
											</td>


											<td>
                                            	 <?php echo date('M Y', strtotime($crow['month_name'])); ?>
											</td>
                                           <!-- <td><?php// echo $crow['salary_amount']; ?> </td> -->
                                            <td>
                                            <?php
												$costquery=mysqli_fetch_assoc(mysqli_query($connect,"select ifnull(count(*),0) as already_paid from client_cost WHERE client_id = $client_id AND month='$month_name'"));
												$already_paid=$costquery['already_paid']; 
											?>
                                            	<a href="#">
												<button class="btn btn-info"><?php echo ($already_paid==0) ? 'Un-paid' : 'Paid';?></button>
												</a>
											</td>
												<td>
													<!--<a href="salary_slip.php?employee_code=<?php //echo $crow['employee_code'];?> && salary=<?php// echo $crow['salary_id']; ?>">-->
													<?php
													if($already_paid==0)
													{ ?>
													
														<a href="accounts.php?post_bill&client_id=<?=$client_id?>&month_name=<?=$month_name?>&monthly_client_cost=<?=$monthly_client_cost?>&pay_method=online"><button class="btn btn-info"><i class="fa fa-add"></i>Online</button></a>
														<a href="accounts.php?post_bill&client_id=<?=$client_id?>&month_name=<?=$month_name?>&monthly_client_cost=<?=$monthly_client_cost?>&pay_method=cash"><button class="btn btn-info"><i class="fa fa-add"></i>Cash</button></a>
													
													<?php 
													}
													else
													{
														echo 'Already Paid';
													}
													?>
												<!--</a>-->
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
</div>
<!-- Basic Tables end -->

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

<?php
include('footer.php');
?>