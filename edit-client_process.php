  <?php  
  include "config.php";
  
  
    
		$client_id = $_POST['client_id'];
	$cl_name = $_POST['cl_name'];
	$cl_email = $_POST['cl_email'];
	$cl_phone = $_POST['cl_phone'];
	$cl_password = $_POST['cl_password'];
	$cl_details = $_POST['cl_details'];
	$cl_address = $_POST['cl_address'];
	$gst = $_POST['gst'];
	$cl_pan = $_POST['cl_pan'];
	//$status = $_POST['status'];
	$date = date("Y-m-d h:i:s");

$sql = "UPDATE `clients` SET  `client_name`='$cl_name',
							`client_email`='$cl_email',
							`client_phone`='$cl_phone',
							`password`='$cl_password',
							`other_details`='$cl_details',
							`client_address`='$cl_address',
							`gst_num`='$gst',
							`pan_num`='$cl_pan' WHERE `client_id`=$client_id ";

		$result = $connect->query($sql);
		
		if($result){
	echo'<br>';
	echo ' ';
	header('location: clients.php');
} else {
	echo'error';
}
	
    ?>