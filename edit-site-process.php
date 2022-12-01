  <?php  
  include "config.php";
  
  
    if(isset($_POST['edit-site']) ) {
		$site_id = $_POST['site_id'];
	$site_title = $_POST['site_title'];
	$client_id = $_POST['client_id'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$date = date("Y-m-d h:i:s");

$sql = "UPDATE `sites` SET   `client_id`='$client_id',
							`site_title`='$site_title',
							`site_address`='$address',
							`site_city`='$city',
							`date_added`='$date' WHERE `site_id`='$site_id'";

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