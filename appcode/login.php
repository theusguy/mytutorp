<?php
include("headerlinks.php");
if(isset($_POST['email']) && isset($_POST['password'])){
    $password = md5($_POST['password']);
           $check_user = get($conn, 'tbl_users', "where email = '{$_POST['email']}' && password = '$password'")->num_rows;
     $check_writer = get($conn, 'tbl_writers', "where email = '{$_POST['email']}' && password = '$password' && status = 'Active'")->num_rows;

    if($check_user > 0){
       $getUser = get($conn, 'tbl_users', "where email = '{$_POST['email']}' && password = '$password'")->fetch_assoc();
        $_SESSION['USER_ID'] = $getUser['id'];
        $_SESSION['USER_TYPE'] = 0;
         redirect('my_orders.php');
    }elseif($check_writer > 0){
      $getUser = get($conn, 'tbl_writers', "where email = '{$_POST['email']}' && password = '$password'")->fetch_assoc();
         $_SESSION['USER_ID'] = $getUser['id'];
        $_SESSION['USER_TYPE'] = 1;
         redirect('received_orders.php');
    }else{
        $_SESSION['flash'] = '<div class="alert alert-danger">Your Email or Password is Incorrect or your account is blocked by admin.</div>';
        redirect('login.php');
    }


}
?>
		<section id="slider" class="slider-element" style="height:200px;">


			<img class="img-map parallax" src="images/svg/map-light.svg" alt="" data-0="opacity: 0.05;margin-top:0px" data-800="opacity: 0.5;margin-top:150px">



		</section><!-- #slider end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="container clearfix">

					<!-- Slider negetive Box
					============================================= -->
          <!-- Slider negetive Box
          ============================================= -->
          <div class="row justify-content-center slider-box-wrap clearfix">
            <div class="col-10">
              <div class="slider-bottom-box">
                <div class="row align-items-center clearfix">
                  <div class="col-lg-4 mb-3 mb-lg-0">
                    <h2 class="mb-3 h1 t300">Login</h2>
                      </div>


                </div>
              </div>
            </div>
          </div>



				<!-- Addition Service Section
				============================================= -->


		</section><!-- #content end -->
    <br><br>


    <section class="contact-info-area contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <div class="contact-form-block">
              <div class="title">

              </div>
              <div class="text">
                <p>Login to create session.</p>
              </div>
                <?php echo flash_msg(); ?>
              <form id="" action="" name="contact_form" class="default-form" method="post">
                <div class="form-group">

                      <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
                  </div>
  <div class="form-group">

		<input type="password" name="password" class="form-control" value="" placeholder="Password" required>

                </div>
								<button type="submit" class="btn-one style-one radi" class="form-control">Login Now</button>
		            </form>
            </div>
          </div>
            <div class="col-md-3">
          </div>
        </div>
      </div>
    </section>
    <div class="row justify-content-center">
    <div class="col-md-4">
      <a href="forget_password.php">Forget Password</a> | <a href="signup.php">Signup</a>
    </div></div>
<br><br><br>
		<!-- Footer
		============================================= -->
		<?php include('footerlinks.php'); ?>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<script src="js/jquery.hotspot.js"></script>
	<script src="js/components/rangeslider.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

	<script>
		jQuery(document).ready( function() {
			var pricingCPU = 1,
				pricingRAM = 1,
				pricingStorage = 10,
				elementCPU = $(".range-slider-cpu"),
				elementRAM = $(".range-slider-ram"),
				elementStorage = $(".range-slider-storage");

			elementCPU.ionRangeSlider({
				grid: false,
				values: [1,2,4,6,8],
				postfix: ' Core',
				onStart: function(data){
					pricingCPU = data.from_value;
				}
			});

			elementCPU.on( 'change', function(){
				pricingCPU = $(this).prop('value');
				calculatePrice( pricingCPU, pricingRAM, pricingStorage );
			});

			elementRAM.ionRangeSlider({
				grid: false,
				step: 1,
				min: 1,
				from:1,
				max: 32,
				postfix: ' GB',
				onStart: function(data){
					pricingRAM = data.from;
					console.log(data);
				}
			});

			elementRAM.on( 'onStart change', function(){
				pricingRAM = $(this).prop('value');
				calculatePrice( pricingCPU, pricingRAM, pricingStorage );
			});

			elementStorage.ionRangeSlider({
				grid: false,
				step: 10,
				min: 10,
				max: 100,
				postfix: ' GB',
				onStart: function(data){
					pricingStorage = data.from;
				}
			});

			elementStorage.on( 'change', function(){
				pricingStorage = $(this).prop('value');
				calculatePrice( pricingCPU, pricingRAM, pricingStorage );
			});

			calculatePrice( pricingCPU, pricingRAM, pricingStorage );

			function calculatePrice( cpu, ram, storage ) {
				var pricingValue = ( Number(cpu) * 10 ) + ( Number(ram) * 8 ) + ( Number(storage) * 0.5 );
				jQuery('.cpu-value').html(pricingCPU);
				jQuery('.ram-value').html(pricingRAM);
				jQuery('.storage-value').html(pricingStorage);
				jQuery('.cpu-price').html('$'+pricingCPU * 10);
				jQuery('.ram-price').html('$'+pricingRAM * 8);
				jQuery('.storage-price').html('$'+pricingStorage * 0.5);
				jQuery('.pricing-price').html( '$'+pricingValue );
			}
		});

		jQuery(window).on( 'load', function(){
			$('#hotspot-img').hotSpot();
		});
	</script>

</body>
</html>
