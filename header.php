<?php
include('config.php');

	// session_start(); 

	if (!isset($_SESSION['email'])) {
		 //$_SESSION['first_name'] = $fname;
		//$_SESSION['last_name'] = $lname;
		$_SESSION['msg'] = "You must log in first";
		// header('location: index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}
    


?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content=" ">
    <meta name="keywords" content=" ">
    <meta name="author" content="Prenero Solutions">
    <title>Dashboard - Euro Security Services</title>
	  
    <link rel="apple-touch-icon" href="images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="css/vendors.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
				<li class="nav-item d-block d-md-none">
				  <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
					  <i class="ft-menu"></i>
				  </a>
				</li>
              
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href="#">
						<i class="ficon ft-maximize"></i>
					</a>
				</li>
              <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                    <form>
                      <div class="input-group search-box">
                        <div class="position-relative has-icon-right full-width">
                          <input class="form-control" id="search" type="text" placeholder="Search here...">
                          <div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href="workforce.php">
						<i class="ficon ft-users"></i> Work Force
					</a>
				</li>
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href="clients.php">
						<i class="ficon ft-user-plus"></i> Clients
					</a>
				</li>
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href="sites.php">
						<i class="ficon ft-map"></i> Sites
					</a>
				</li>
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href="roaster.php">
						<i class="ficon ft-calendar"></i> Roaster
					</a>
				</li>
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href='salary.php'>
						<i class="ficon ft-folder"></i> Salary
					</a>
				</li>
				<li class="nav-item d-none d-md-block">
					<a class="nav-link nav-link-expand" href="accounts.php">
						<i class="ficon ft-file-plus"></i> Accounts
					</a>
				</li>
				
				
            </ul>
			  
			  
            
            <ul class="nav navbar-nav float-right">
              <!--<li class="dropdown dropdown-notification nav-item">
				  <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
					  <i class="ficon ft-mail"></i>
				  </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right">
					  <a class="dropdown-item" href="#">
					  
						  <i class="ft-book"></i> Read Mail
					  </a>
					  <a class="dropdown-item" href="#">
						  <i class="ft-bookmark"></i> Read Later
					  </a>
					  <a class="dropdown-item" href="#">
						  <i class="ft-check-square"></i> Mark all Read
					  </a>
					</div>
                
				  </div>
              
				</li>-->
              
				<li class="dropdown dropdown-user nav-item">
					<a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
						<span class="avatar avatar-online">
							<img src="images/portrait/small/avatar-s-19.png" alt="avatar">
							<i></i>
						</span>
					</a>
                
					<div class="dropdown-menu dropdown-menu-right">
                  
						<div class="arrow_box_right">
							<a class="dropdown-item" href="#">
								<span class="avatar avatar-online">
									<img src="images/portrait/small/avatar-s-19.png" alt="avatar">
									<span class="user-name text-bold-700 ml-1">John Doe</span>
								</span>
							</a>
                    
						<!--	<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">
								<i class="ft-user"></i> Edit Profile
							</a>
							<a class="dropdown-item" href="#">
								<i class="ft-mail"></i> My Inbox
							</a>
							<a class="dropdown-item" href="#">
								<i class="ft-check-square"></i> Task
							</a>
							<a class="dropdown-item" href="#">
								<i class="ft-message-square"></i> Chats
							</a>-->
                    
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?logout='1'">
								<i class="ft-power"></i> Logout
							</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
