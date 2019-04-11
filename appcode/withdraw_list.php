<?php
include("headerlinks.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login');
}
if($_SESSION['USER_TYPE'] != 1){
redirect('index.php');
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
                    <h2 class="mb-3 h1 t300">Withdraw List</h2>
                      </div>


                </div>
              </div>
            </div>
          </div>



				<!-- Addition Service Section
				============================================= -->


		</section><!-- #content end -->
    <br><br>
    <?php
      $withdraw_requests = get($conn, 'tbl_withdraw', "where writer_id = '{$_SESSION['USER_ID']}'");
    ?>
    <section class="contact-info-area contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <?php echo flash_msg(); ?>
            <div class="contact-form-block">

            		<table id="example1" class="table table-bordered table-striped">
    						<thead>
    							<tr>
                                    <th width="20%">Date & Time</th>
    								<th width="40%">Account</th>
                                    <th width="20%">Amount</th>
                                    <th width="20%">Status</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php
                             // $withdraw_requests = $withdraw_requests->result_array();
    							$i=0;


    							while ($row = $withdraw_requests->fetch_assoc()) {

    								$i++;
    								?>
    								<tr>
    								<td><?php echo $row['created_date']; ?></td>
                                        <td><?php echo $row['account']; ?></td>
    									<td>$<?php echo $row['amount']; ?></td>

    									<td><?php if($row['status']==0){echo 'Panding';}else{echo 'Completed';} ?></td>

    								</tr>


    								<?php
    							}
    							?>
    						</tbody>
    					</table>
            </div>
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
