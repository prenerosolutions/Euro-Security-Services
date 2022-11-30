<?php
include('header.php');
include('workforce_sidebar.php');

?>


  

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Workforce</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Work Force
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
				<h4 class="card-title">Work Force Team</h4>
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
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Job Type</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
										
										$query=mysqli_query($connect,"SELECT * FROM `employee`");
										 while($nrow = mysqli_fetch_array($query)){
										?>	
								
								
								<tr>
									<th scope="row"><?php echo $nrow['employee_code']; ?></th>
									<td><?php echo $nrow['employee_name']; ?></td>
									<td><?php echo $nrow['emp_email']; ?></td>
									<td><?php echo $nrow['emp_phone']; ?></td>
									<td><?php echo $nrow['emp_type']; ?></td>
									<td><a href="edit-staff.php?employee_code=<?php echo $nrow['employee_code'];?>">
										<button type="button" class="btn btn-primary btn-min-width mr-1 mb-1"><i class="ft-edit"></i> Edit</button>
										</a>
									<button type="button" class="btn btn-danger btn-min-width mr-1 mb-1"><i class="ft-trash"></i>Delete</button></td>
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