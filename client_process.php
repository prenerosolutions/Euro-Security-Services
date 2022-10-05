  <?php  
  include "config.php";
  
  
    if(isset($_POST['cl_name']) && isset($_POST['cl_email']) && isset($_POST['cl_phone'])) {
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

$sql = "INSERT INTO `clients`(
								`client_name`, 
								`client_email`, 
								`client_phone`, 
								`password`, 
								`other_details`, 
								`client_address`, 
								`gst_num`, 
								`pan_num`, 
								`date_added`
								) VALUES (
								'$cl_name',
								'$cl_email',
								'$cl_phone',
								'$cl_password',
								'$cl_details',
								'$cl_address',
								'$gst',
								'$cl_pan',
								'$date')";

		$result = $connect->query($sql);
		
		if($result){
	echo'<br>';
	echo ' ';
	header('location: client-details.php');
} else {
	echo'error';
}
	}
    ?>