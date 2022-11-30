  <?php  
  include "config.php";
  
  
    if(isset($_POST['emp_name']) && isset($_POST['email']) && isset($_POST['phone'])) {
	$emp_name = $_POST['emp_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	$type = $_POST['type'];
	$pds = $_POST['pds'];
	$esi_num = $_POST['esi_num'];
	$esi = $_POST['esi'];
	$pf_num = $_POST['pf_num'];
	$pf = $_POST['pf'];
	$pan = $_POST['pan'];
	//$status = $_POST['status'];
	$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO `employee`( 
								`employee_name`, 
								`emp_email`, 
								`emp_phone`, 
								`password`, 
								`address`, 
								`emp_type`, 
								`per_day_salary`, 
								`esi`, 
								`esi_per`, 
								`pf_num`, 
								`pf_per`, 
								`pan_num`, 
								`date_added`) VALUES (
								'$emp_name',
								'$email',
								'$phone',
								'$password',
								'$address',
								'$type',
								'$pds',
								'$esi_num',
								'$esi',
								'$pf_num',
								'$pf',
								'$pan',
								'$date')";

		$result = $connect->query($sql);
		
		if($result){
	echo'<br>';
	echo ' ';
	header('location: workforce.php');
} else {
	echo'error';
}
	}
    ?>