  <?php  
  include "config.php";
  
  $client_id = $_POST['client_id'];
    if(isset($_POST['requirement']) && isset($_POST['duty_timing']) && isset($_POST['guard_name'])) {
	$requirement = $_POST['requirement'];
	$duty_timing = $_POST['duty_timing'];
	$guard_name = $_POST['guard_name'];
	$guard_salary = $_POST['guard_salary'];
	$client_cost = $_POST['client_cost'];
	
	$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO `duties`(
								`requirements`, 
								`duty_timing`, 
								`employee_name`, 
								`guard_salary`, 
								`client_cost`, 
								`date_added`
								) VALUES (
								'$requirement',
								'$duty_timing',
								'$guard_name',
								'$guard_salary',
								'$guard_type',
								'$client_cost',
								'$date')";

		$result = $connect->query($sql);
		
	if($result){
	echo'<br>';
	echo '';
	header('location: location-details.php');
} else {
	echo'error';
}
	}
    ?>