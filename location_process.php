  <?php  
  include "config.php";
  
 // $client_id = $_GET['id'];
  //echo $client_id;
    //if(isset($_POST['duty_address']) && isset($_POST['duty_timing']) && isset($_POST['cost_client'])) {
		$client_id = $_POST['client_id'];
		$loc_id = $_POST['loc_id'];
	$duty_title = $_POST['duty_title'];
	//$duty_address = $_POST['duty_address'];
	$duty_timing = $_POST['timing'];
	$guard_type = $_POST['guard_type'];
	$cost_client = $_POST['cost_client'];
	
	$date = date("Y-m-d h:i:s");
	
	echo $client_id;
	echo "\n";
	echo $duty_title;
	echo "\n";
	echo $duty_address;
	echo "\n";
	echo $duty_timing;
	echo "\n";
	echo $guard_type;
	echo "\n";
	echo $cost_client;
	echo "\n";
	echo $date;

$sql = "INSERT INTO `location_requirement`(`loc_id`, `client_id`, `duty_title`, `duty_timing`, `guard_type`, `cost_client`, `date_added`) VALUES ('$loc_id', '$client_id',
								'$duty_title',
								'$duty_timing',
								'$guard_type',
								'$cost_client',
								'$date')";

		$result = $connect->query($sql);
		
	if($result){
	echo'<br>';
	echo '';
	header('location: locations.php');
} else {
	echo'error';
}
	//}
    ?>