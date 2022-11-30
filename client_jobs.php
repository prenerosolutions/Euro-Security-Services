<?php
include('header.php');
include('roaster_sidebar.php');
$_GET['site_id'];
$site_id = $_GET['site_id'];

?>

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Jobs </h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Jobs
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
				<h4 class="card-title">
					<?php
										$query=mysqli_query($connect,"SELECT * FROM `sites` WHERE `site_id`=$site_id");
										 $jrow = mysqli_fetch_array($query)
								?>	
					All Jobs on <strong><?php echo $jrow['site_title']; ?> <?php echo $jrow['site_address']; ?></strong>
					
					
					</h4>
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
						<?php
						//echo $client_id;
//die;
						?>
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>Job Date</th>
									<th>Start Time</th>
									<th>End Time </th>
									<th>Break Time</th>	
									<th>Actions</th>		
									
								</tr>
							</thead>
							<tbody>
								<?php
										$query=mysqli_query($connect,"SELECT * FROM `jobs` WHERE `site_id`=$site_id");
										 while($jrow = mysqli_fetch_array($query)){
								?>									
								<tr>
									<th scope="row"><?php echo $jrow['job_id']; ?></th>
									<td><?php echo $jrow['job_date']; ?></td>
									<td>
										
										<?php echo $jrow['start_time']; ?>
														
									
									
									
									
									</td>
									<td><?php echo $jrow['end_time']; ?></td>
									<td>  <?php echo $jrow['break_time']; ?> </td>
									<td>
										<?php
											 $job_id = $jrow['job_id'];
											 $dquery=mysqli_query($connect,"SELECT * FROM `duties` WHERE `job_id`=$job_id");
										 $drow = mysqli_fetch_array($dquery);
											 if($drow['job_id']==0){
												 
												 ?>
												 
											
										
										<a href="assign_guard.php?job_id=<?php echo $jrow['job_id']; ?>">  <button type="button" class="btn btn-success btn-min-width mr-1 mb-1"><i class="ft-plus"></i>Add Guard</button> </a>
										<?php
											
											 }else{
												 ?>
												 <button type="button" class="btn btn-success btn-min-width mr-1 mb-1" disabled><i class="ft-plus"></i>Guard Assigned</button> 
												 
												 <?php
											 }
											 
											 
											 ?>
											
											
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