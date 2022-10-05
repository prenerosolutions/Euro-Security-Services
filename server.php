<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	if ($_SERVER['SERVER_NAME'] == 'localhost') {
	$db = mysqli_connect('localhost', 'root', '', 'euro_security');
	}else {
	$db = mysqli_connect('localhost', 'prenero_admin', 'Prenero1102/*', 'prenero_educators');	
	}
	


	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				//echo($username);
				//die;
				
				$_SESSION['success'] = "You are now logged in";
				header('location: dashboard.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>