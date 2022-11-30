  <?php  
  include "config.php";
  
  
    if(isset($_POST['job_id']) ) {
	$job_id = $_POST['job_id'];
	$guard_name = $_POST['guard_name'];
	$guard_cost = $_POST['guard_cost'];
	//$status = $_POST['status'];
	$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO `duties`( `job_id`, 
								`employee_code`, 
								`guard_cost`,  
								`date_added`
								) VALUES (
							'$job_id',
							'$guard_name',
							'$guard_cost',
							'$date')";

		$result = $connect->query($sql);
		
		if($result){
	echo'<br>';
	echo ' ';
	header('location: client_roaster.php');
} else {
	echo'error';
}
	}
    ?>