<?php
include('header.php');
include('roaster_sidebar.php');
?>

<div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Roaster </h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Roaster
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
				<h4 class="card-title">All Roaster</h4>
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
						<table class="table">
							<thead>
								<tr>
									<th>Date</th>
									<th>Morning Shift</th>
									<th>Evening Shift</th>
									<th>Night Shift </th>
									<th>Over Time</th>									
									
								</tr>
							</thead>
							<tbody>
								<?php
										$query=mysqli_query($connect,"SELECT * FROM `jobs`");
										 while($jrow = mysqli_fetch_array($query)){
								?>									
								<tr>
									<th scope="row"><?php echo $jrow['job_date']; ?></th>
									<td><?php echo $jrow['job_title']; ?></td>
									<td><?php echo $jrow['site_id']; ?></td>
									<td><?php echo $jrow['start_time']; ?> - <?php echo $jrow['end_time']; ?></td>
									<td><?php echo $jrow['job_date']; ?></td>
									
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