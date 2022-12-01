  <?php  
  include "config.php";
  
  
	$emp_code = $_POST['emp_code'];	
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

$sql = "UPDATE `employee` SET `employee_name`='$emp_name',
								`emp_email`='$email',
								`emp_phone`='$phone',
								`password`='$password',
								`address`='$address',
								`emp_type`='$type',
								`per_day_salary`='$pds',
								`esi`='$esi_num',
								`esi_per`='$esi',
								`pf_num`='$pf_num',
								`pf_per`='$pf',
								`pan_num`='$pan' WHERE `employee_code`='$emp_code' ";

		$results = $connect->query($sql);

//echo $sql;
//die;
		
		if($results){
	echo'<br>';
	echo ' ';
	header('location: workforce.php');
} else {
	echo'error';
}
	
    ?>