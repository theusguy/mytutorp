<?php
include("headerlinks.php");
if(isset($_POST['email'])){
    $check_user = get($conn, 'tbl_users', "where email = '{$_POST['email']}'")->num_rows;
     $check_writer = get($conn, 'tbl_writers', "where email = '{$_POST['email']}'")->num_rows;

  if($check_user > 0){
       $getUser = get($conn, 'tbl_users', "where email = '{$_POST['email']}'")->fetch_assoc();
        function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
          }
        $new_password = randomPassword();
        $data = array(
			'password' => md5($new_password)
		);

        update($conn, 'tbl_users', $data, "where email = '{$_POST['email']}'");

       $full_name =  $getUser['name'];
        //Email Sent//

        $body = '
  <table>
  <tr>
  <td align="left">Hi '.$full_name.',</td>
  </tr>
  <tr>
    <td align="left" height="20"></td>
  </tr>
<tr>
    <td align="left">Below is the New password for your Mytutor account</td>
  </tr>
    <tr>
    <td align="left" height="10"></td>
  </tr>
<tr>
<td align="left">
Password: '.$new_password.'
</td>
</tr>
    <tr>
    <td align="left" height="10"></td>
  </tr>
  <tr>
    <td align="left"><b>Regards,</b><br />Account Department</td>
  </tr>
  <tr>
    <td align="left"></td>
  </tr>
  </table>
';

        $from = 'MyTutorPlug<noreply@mytutorplug.com>';
        $to = $_POST['email'];
        $subject = 'My Tutor Password Reset';
                $headers = "From: " .($from) . "\r\n";
                        $headers .= "Reply-To: ".($from) . "\r\n";
                        $headers .= "Return-Path: ".($from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                        mail($to,$subject,$body,$headers);

        $_SESSION['flash'] = '<div class="alert alert-success">New Password has been sent to your email.</div>';
        redirect('forget_password.php');
  }elseif($check_writer > 0){
      $getUser = get($conn, 'tbl_writers', "where email = '{$_POST['email']}'")->fetch_assoc();
        function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
          }
        $new_password = randomPassword();
        $data = array(
			'password' => md5($new_password)
		);

        update($conn, 'tbl_writers', $data, "where email = '{$_POST['email']}'");

       $full_name =  $getUser['name'];
        //Email Sent//

        $body = '
  <table>
  <tr>
  <td align="left">Hi '.$full_name.',</td>
  </tr>
  <tr>
    <td align="left" height="20"></td>
  </tr>
<tr>
    <td align="left">Below is the New password for your Mytutor account</td>
  </tr>
    <tr>
    <td align="left" height="10"></td>
  </tr>
<tr>
<td align="left">
Password: '.$new_password.'
</td>
</tr>
    <tr>
    <td align="left" height="10"></td>
  </tr>
  <tr>
    <td align="left"><b>Regards,</b><br />Account Department</td>
  </tr>
  <tr>
    <td align="left"></td>
  </tr>
  </table>
';

        $from = 'MyTutorPlug<noreply@mytutorplug.com>';
        $to = $_POST['email'];
        $subject = 'My Tutor Password Reset';
                $headers = "From: " .($from) . "\r\n";
                        $headers .= "Reply-To: ".($from) . "\r\n";
                        $headers .= "Return-Path: ".($from) . "\r\n";;
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $headers .= "X-Priority: 3\r\n";
                        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                        mail($to,$subject,$body,$headers);

        $_SESSION['flash'] = '<div class="alert alert-success">New Password has been sent to your email.</div>';
        redirect('forget_password.php');
  }else{
       $_SESSION['flash'] = '<div class="alert alert-danger">Email is not Exist in Our System.</div>';
        redirect('forget_password.php');

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
                    <h2 class="mb-3 h1 t300">Forget Password</h2>
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
                <h2>Forget Password</h2>
              </div>
              <div class="text">
                <p>Enter Your Email to Get New Password.</p>
              </div>
                <?php echo flash_msg(); ?>
              <form id="" action="" name="contact_form" class="default-form" method="post">
              <div class="form-group">
                    <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
                  </div>


                <button type="submit" class="btn-one style-one radi" class="form-control">Reset</button>
              </form>
            </div>
          </div>
            <div class="col-md-3">
          </div>
        </div>
      </div>
    </section>
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
