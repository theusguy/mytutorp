<?php
include("inc/config.php");
include("inc/functions.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,400i,700|Istok+Web:400,700" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />

	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="js/bootstrap-toggle.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

	 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	 <!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- Popper JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="animate.css">
	 <script src="wow.min.js"></script>

	 <script>
	 new WOW().init();
	 </script>
	<link rel="stylesheet" href="css/components/ion.rangeslider.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name='viewport' content='initial-scale=1, viewport-fit=cover'>

	<!-- Hosting Demo Specific Stylesheet -->
	<link rel="stylesheet" href="css/colors.php?color=44aaac" type="text/css" /> <!-- Theme Color -->
	<link rel="stylesheet" href="css/hostingfonts.css" type="text/css" />
	<link rel="stylesheet" href="css/hosting.css" type="text/css" />
	<title>MyTutorPlug || A Complete Eassy Writing Website</title>
	<style media="screen">
	html {
scroll-behavior: smooth;
}
	</style>
	<script>

	var category = "";
	var pricexx;
</script>
</head>
<body class="stretched">
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Top Bar
		============================================= -->

		<div id="top-bar" class="center dark" style="background-color: #15888a">
			<p class="mb-0 text-white" style="font-size: 14px;">Beta Release: Serving Bay Area Only</p>
        <!-- <a href="index.php" class="ml-2 font-primary t700 text-white">(01) 12345-456789</a> -->
		</div>
		<!-- Header
		============================================= -->
		<header id="header" class="full-header transparent-header dark" data-sticky-class="not-dark">
			<div id="header-wrap">
				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
					<!-- Logo
					============================================= -->
					<div id="logo" style="width:230px;">
						<!-- <a href="index.php">MyTutorPlug</a> -->
						<a href="index.php" class="standard-logo" data-dark-logo="images/logou.png"><img src="images/logou.png" alt="Canvas Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="images/logou.png"><img src="images/logou.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu" class="not-dark with-arrows">

						<ul class="not-dark">
							<li class="current"><a href="index.php"><div>Home</div></a></li>

							<li><a href="#about"><div>About Us</div></a></li>
								<li><a href="#Refund_Policy"><div>Refund Policy</div></a></li>
							<li><a href="#contact"><div>Contact</div></a></li>

                <?php if(isset($_SESSION['USER_ID'])) { ?>
									<li><a href="#"><div>My Account</div></a>
										<ul>

                   <?php if($_SESSION['USER_TYPE']==1){ ?>
                    <li><a href="received_orders.php">Received Orders</a></li>
                    <li><a href="withdraw_list.php">Withdraw List</a></li>
                    <li><a href="profile.php">My Profile</a></li>
                    <?php }else{ ?>

                  <li><a href="my_orders.php">My Orders</a></li>
                  <li><a href="new_order.php">Ask for Essay</a></li>
                    <li><a href="account.php">My Profile</a></li>
<?php } ?>

                    <li><a href="logout.php">Log Out</a></li>

                    <?php } ?>
                  <!-- <li><a href="forget_password.php">Forget Password</a></li> -->

										 <?php if(!isset($_SESSION['USER_ID'])) { ?>
										  <li><a href="signup.php">signup</a></li>
											<?php } ?>
                </ul>
              </li>
						</ul>

						<!-- Top Search
						============================================= -->
						  <?php if(!isset($_SESSION['USER_ID'])) { ?>
						<a href="login.php" class="button bg-white text-dark button-light button-rounded color">Login</a>
<?php } ?>
					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
