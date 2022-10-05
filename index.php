<?php include('server.php') ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Security Guard Employee Management System</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
		<div class="container">
			<div class="row">
		<div class="col-md-6 left_side">
		
			<h1> <strong>Security</strong><br>
				<strong>Management</strong> <br>
				<strong>System</strong></h1>
		
			
			<p> An Employee Management System for Security Providers </p>
			<div class="col-md-6">
				<p> Secure</p>
			<p> Fast</p>
			<p> Responsive</p>
		
			</div>
			<div class="col-md-6">
					<img src="img/logo.png" alt="Horizantal Bar" class="logo">
			</div>
			
			
		
		</div>
		
		<div class="col-md-6 right_side">
		
			<h1 align="center" style="">Welcome</h1>
		
			
			<img src="img/horizantal_bar.png" alt="Horizantal Bar">
			
			
			<form method="post" action="server.php">
				<?php include('errors.php'); ?>
				<div class="form-group">
					<label> Your Email</label>		
					<input type="email" name="email">
				</div>
			
			
				<div class="form-group">
					<label> Your Password</label>
					<input type="password" name="password">
				</div>
				
				
					<!--<input type="checkbox">--> <label for="checkbox"> Remember Me.</label><br>
				<input type="submit" value="Sign in" name="login_user">
			</form>
			
			<p><a href="#">Forgot Password?</a></p>
			
			
			
		
		</div>
	
	
	
	
	
	
	</div>
	
	</div>
	
	</div>
	
</body>
</html>