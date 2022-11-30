<?php
include('header.php');
include('client_sidebar.php');


if (isset($_POST['del_client'])) {
	$client_id = $_POST['client_id'];

	$sql = "DELETE FROM `clients` WHERE `client_id` = '$client_id'";
	$result = $connect->query($sql);
	if($result){
		$statusMsg = 'Your Client has been deleted';
	} else {
		$statusMsg = 'Some error occurre! please try agian';
	}
	echo "<script>alert('$statusMsg')</script>";
}

?>
  

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Clients</h3>
          </div>
          <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <div class="breadcrumb-wrapper mr-1">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Our Clients
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
				<h4 class="card-title">Client List</h4>
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
									
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php
										
										$query=mysqli_query($connect,"SELECT * FROM `clients`");
										 while($nrow = mysqli_fetch_array($query)){
										?>	
								
								
								<tr>
									<th scope="row"><?php echo $nrow['client_id']; ?></th>
									<td><?php echo $nrow['client_name']; ?></td>
									<td><?php echo $nrow['client_email']; ?></td>
									<td><?php echo $nrow['client_phone']; ?></td>
									
									<td>
										<a href="edit-client.php?client_id=<?php echo $nrow['client_id'];?>">
										<button type="button" class="btn btn-primary btn-min-width mr-1 mb-1"><i class="ft-edit"></i> Edit</button>
										</a>
										
										<form accept="#" method="post">
                                            	<input type="hidden" name="client_id" value="<?php echo $nrow['client_id']; ?>">
											<button class="btn btn-danger btn-min-width mr-1 mb-1" name="del_client" type="submit"><i class="ft-trash"></i> Delete</button>
											</form>
										
									
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