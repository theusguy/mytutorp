<?php

include("../inc/config.php");
include("../inc/functions.php");

// Check if the user is logged in or not
if(!isset($_SESSION['ADMIN_ID'])) {
	header('location: login.php');
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyTutorPlug - Admin Panel || Developed by Ali Softtech</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/datepicker3.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/select2.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/AdminLTE.min.css">
	<link rel="stylesheet" href="css/_all-skins.min.css">
	<link rel="stylesheet" href="css/on-off-switch.css">
	<link rel="stylesheet" href="css/summernote.css">
	<link rel="stylesheet" href="style.css">


</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="index.php" class="logo">
				<span class="logo-lg">Admin Panel</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								
								<span class="hidden-xs"><?php echo 'Admin'; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Log out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>

  		<?php $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  	if(isset($_SESSION['ADMIN_ID']) && $_SESSION['ADMIN_ID'] > 1) {
  	    if($cur_page != 'orders.php'){
  	        redirect('orders.php');
  	    }
  	    
  	    
}
  	?>

  		<aside class="main-sidebar">
    		<section class="sidebar">
      
      			<ul class="sidebar-menu">

			        <li class="treeview <?php if($cur_page == 'index.php') {echo 'active';} ?>">
			          <a href="index.php">
			            <i class="fa fa-home"></i> <span>Dashboard</span>
			          </a>
			        </li>

					<li class="treeview <?php if( ($cur_page == 'users.php') ) {echo 'active';} ?>">
			          <a href="users.php">
			            <i class="fa fa-group"></i> <span>Manage Users</span>
			          </a>
			        </li>
                     <li class="treeview <?php if( ($cur_page == 'writers.php') ) {echo 'active';} ?>">
			          <a href="writers.php">
			            <i class="fa fa-book"></i> <span>Manage Writers</span>
			          </a>
			        </li>
                    <li class="treeview <?php if( ($cur_page == 'orders.php') ) {echo 'active';} ?>">
			          <a href="orders.php">
			            <i class="fa fa-shopping-cart"></i> <span>Manage Orders</span>
			          </a>
			        </li>
                     <li class="treeview <?php if( ($cur_page == 'payments.php') ) {echo 'active';} ?>">
			          <a href="payments.php">
			            <i class="fa fa-credit-card"></i> <span>Manage Payments</span>
			          </a>
			        </li>
			        <li class="treeview <?php if( ($cur_page == 'category-add.php')||($cur_page == 'category.php')||($cur_page == 'category-edit.php') ) {echo 'active';} ?>">
			          <a href="category.php">
			            <i class="fa fa-newspaper-o"></i> <span>Manage Categories</span>
			          </a>
			        </li>
                        <li class="treeview <?php if( ($cur_page == 'withdraw.php') ) {echo 'active';} ?>">
			          <a href="withdraw.php">
			            <i class="fa fa-user"></i> <span>Withdraw Requests</span>
			          </a>
			        </li>

 <li class="treeview <?php if( ($cur_page == 'links.php') ) {echo 'active';} ?>">
			          <a href="links.php">
			            <i class="fa fa-globe"></i> <span>Registraion Links</span>
			          </a>
			        </li>

			         <li class="treeview <?php if( ($cur_page == 'admins.php') ) {echo 'active';} ?>">
			          <a href="admins.php">
			            <i class="fa fa-globe"></i> <span>Manage Admins</span>
			          </a>
			        </li>

				
                       <li class="treeview <?php if( ($cur_page == 'logout.php') ) {echo 'active';} ?>">
			          <a href="logout.php">
			            <i class="fa fa-sign-out"></i> <span>Logout</span>
			          </a>
			        </li>

			      
        
      			</ul>
    		</section>
  		</aside>

  		<div class="content-wrapper">