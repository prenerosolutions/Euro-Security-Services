  <?php  
  include "config.php";
  
  
    if(isset($_POST['job_title']) ) {
	$job_title = $_POST['job_title'];
	$site_id = $_POST['site_id'];
		$client_id=$_POST['client_id'];
	$start_time = $_POST['start_time'];
	$end_time = $_POST['end_time'];
	$break_time = $_POST['break_time'];
	$job_date = $_POST['job_date'];
		$client_cost = $_POST['client_cost'];
	
	//$status = $_POST['status'];
	$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO `jobs`( `site_id`, 
							`client_id`, 
							`job_title`, 
							`start_time`, 
							`end_time`, 
							`break_time`, 
							`job_date`, 
							`client_cost`, 
							`date_added`
							) VALUES (
							'$site_id',
							'$client_id',
							'$job_title',
							'$start_time',
							'$end_time',
							'$break_time',
							'$job_date',
							'$client_cost',
							'$date')";

		$result = $connect->query($sql);
		
		if($result){
	echo'<br>';
	echo ' ';
	header('location: jobs.php');
} else {
	echo'error';
}
	}
    ?>