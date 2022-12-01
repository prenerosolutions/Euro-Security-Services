  <?php  
  include "config.php";
  
  
    if(isset($_POST['add-site']) ) {
		
	$site_title = $_POST['site_title'];
	$client_id = $_POST['client_id'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$date = date("Y-m-d h:i:s");

$sql = "INSERT INTO `sites`( `client_id`, 
								`site_title`, 
								`site_address`, 
								`site_city`, 
								`date_added`
								) VALUES (
								 '$client_id',
								 '$site_title',
								 '$address',
								 '$city',
								 '$date')";

		$result = $connect->query($sql);
		
		if($result){
	echo'<br>';
	echo ' ';
	header('location: sites.php');
} else {
	echo'error';
}
	}
    ?>