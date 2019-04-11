<?php
include("headerlinks.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login');
}
if($_SESSION['USER_TYPE'] != 0){
redirect('index.php');
}
?>
<?php
if(isset($_POST['name'])){
    if(!empty($_POST['password'])){
          $data = array(
      'name' => $_POST['name'],
      'school' => $_POST['school'],
      'refer_name' => $_POST['refer_name'],
          'password' => md5($_POST['password']),
          );
    }else{
          $data = array(
      'name' => $_POST['name'],
      'school' => $_POST['school'],
      'refer_name' => $_POST['refer_name'],

      );
    }




    update($conn, 'tbl_users', $data, "where id = '{$_SESSION['USER_ID']}'");
    redirect('account.php');

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
                    <h2 class="mb-3 h1 t300">My Account</h2>
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
              <?php
               $userDetail = get($conn, 'tbl_users', "where id = '{$_SESSION['USER_ID']}'")->fetch_assoc();
                ?>
                <?php echo flash_msg(); ?>
              <form id="" action="" name="contact_form" class="default-form" method="post">

                  <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php echo $userDetail['name']; ?>" placeholder="Name" required>
                  </div>

                  <div class="form-group">
                    <input type="email" name="email" class="form-control" value="<?php echo $userDetail['email']; ?>" placeholder="Email" readonly>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="school" >
                        <option    selected="selected " required><?php echo $userDetail['school']; ?></option>
                        <option value="Berkeley City College">Berkeley City College</option>
                        <option value="CSU East Bay">CSU East Bay</option>
                        <option value="Contra Costa College">Contra Costa College</option>
                          <option value="College of San Mateo">College of San Mateo</option>
                            <option value="College of Marin">College of Marin</option>
                              <option value="College of Alameda">College of Alameda</option>
                                <option value="City College of San Francisco">City College of San Francisco</option>
                                  <option value="Chabot College">Chabot College</option>
                                    <option value="Canada College">Canada College</option>
                                    <option value="Diablo Valley College">Diablo Valley College</option>
                                            <option value="De Anza College">De Anza College</option>
                                            <option value="Evergreen Valley College">Evergreen Valley College</option>
                                              <option value="Foothill College">Foothill College</option>
                                              <option value="Gavilan College">Gavilan College</option>
                                              <option value="Los Medanos College">Los Medanos College</option>
                                                <option value="Laney College">Laney College</option>
                                                <option value="Las Positas College">Las Positas College</option>
                                                            <option value="Ohlone College">Ohlone College</option>
                                              <option value="San Francisco State University">San Francisco State University</option>
                                                <option value="Skyline College">Skyline College</option>
                                                        <option value="San Jose City College">San Jose City College</option>
                                                        <option value="UC Santa Cruz">UC Santa Cruz</option>
                                                            <option value="UC Berkeley">UC Berkeley</option>
                                                            <option value="San Jose State University">San Jose State University</option>
                                                            <option value="Santa Clara University">Santa Clara University</option>
                                                            <option value="West Valley College">West Valley College</option>
                    </select>    </div>
                    <div class="form-group">
                      <input type="text" name="refer_name" class="form-control" value="<?php echo $userDetail['refer_name']; ?>" placeholder="Enter refer name" >
                    </div>
                      <div class="form-group">
                    <input type="text" name="password" class="form-control" value="" placeholder="New Password. Leave Blank if don't want to change.">
                  </div>


                <button type="submit" class="btn-one style-one radi" class="form-control">Submit</button>
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
