<script type="text/javascript">
  var price = 15;
</script>
	<!-- / -->
  <?php
  include("headerlinks.php");
  if(!isset($_SESSION['USER_ID'])){
  redirect('login.php');
  }
  if($_SESSION['USER_TYPE'] != 0){
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
                    <h2 class="mb-3 h1 t300">My Orders</h2>
                      </div>
                </div>
              </div>
            </div>
          </div>
				<!-- Addition Service Section
				============================================= -->


		</section><!-- #content end -->
    <br><br>
    <!-- Pricing Section
    ============================================= -->
    <div class="section  notopmargin" style="background: #F9F9F9 url('images/pattern-dark.png') repeat center center; padding: 80px 0">
      <div class="container clearfix">
        <div class="heading-block center mt-0 divcenter nobottomborder clearfix" style="max-width: 750px">
          <h2>Pricing Scheme</h2>
          <!-- <p>Competently recaptiualize multifunctional schemas without an expanded array of niches. Continually engage cooperative sources vis-a-vis web-enabled benefits.</p> -->
        </div>
        <div class="container">
          <div class="row">
            <label for="" class="offset-1 control-label"><font style="text-align-last:right;"> <br><br><br>Delivery Type:</font></font></label>

            <div class="col-md-4 ">
              <input type="checkbox" id="togBtn" data-toggle="toggle"  data-width="480" data-height="100" data-offstyle="success">
            </div>
          </div>
        </div>

        <br>
          <div class="container">
            <div class="row">
              <!-- <div class="offset-1">
              <p> <br> <br>Total pages: </p>
              </div> -->
              <label for="" class="offset-1 control-label"><font style=" text-indent: 15px;"> <br><br><br>&nbsp&nbspTotal Pages:</font></label>
              <div class="col-md-8 ">
                <div class="row align-items-stretch">
                  <div class="col-md-8 col-xs-7 ">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="mb-4">Pages: </h4>
                        </div>
                        <!-- CPU Slider
                        ============================================= -->
                        <input class="range-slider-cpu" />
                      </div>
                        <p id="words" style="text-indent:20px;">275 Words</p>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-5  card bgcolor text-white text-center mb-4">
                    <div class="card-body">
                      <h2 class="cpu-price text-white">$15</h2>
                      <p class="card-text mb-0" style="opacity: .8;">$15 <span class="font-italic">per Pages</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
<script type="text/javascript">
$("#togBtn").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        jQuery('.cpu-price').html('$'+20);
    price = 20;
    }
    else {
       switchStatus = $(this).is(':checked');
       jQuery('.cpu-price').html('$'+15);
       price = 15;
    }
});
</script>

        <div class="clear"></div>
      </div>
    </div>
  </section>
  <section>
    <section>

    <div class="container">
    <div class="row">
    <div class="col-md-8 offset-2">
        make payment
    </div>  </div></div>
    <?php
      $userDetail = get($conn, 'tbl_users', "where id = '{$_SESSION['USER_ID']}'")->fetch_assoc();
      $Orders = get($conn, 'tbl_assignments', "where user_id = '{$_SESSION['USER_ID']}' and status = '0'  ORDER BY id DESC  " );
      $Orders1 = get($conn, 'tbl_assignments', "where user_id = '{$_SESSION['USER_ID']}' and status = '1'  ORDER BY id DESC  " );
      $Orders2 = get($conn, 'tbl_assignments', "where user_id = '{$_SESSION['USER_ID']}' and status = '2'  ORDER BY id DESC  " );


    ?>
    <section class="contact-info-area contact-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <h2>My Account</h2>
              <p>Name : <?php echo $userDetail['name']; ?></p>
              <p>Username : <?php echo $userDetail['username']; ?></p>
              <p>Email : <?php echo $userDetail['email']; ?></p>
              <p>Total Orders : <?php echo $Orders->num_rows; ?></p>
              <a href="new_order.php" class="btn btn-primary">Make an Order</a>

          </div>
          <div class="col-md-8">
              <?php echo flash_msg(); ?>
            <div class="contact-form-block">
              <div class="title">
                <h2>Panding Orders</h2>
              </div>
            		<table id="example1" class="table table-bordered table-striped">
    						<thead>
    							<tr>
    								<th width="15%">Order ID</th>
    								<th width="45%">Homework Title</th>
    								<th width="15%">Amount</th>
    								<th width="15%">Status</th>
    								<th width="10%">Action</th>
                    	<th width="10%">message</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php

    							$i=0;


    							while ($row = $Orders->fetch_assoc()) {
                    $id= $row['id'];

    								$i++;
    								?>
    								<tr>
    									<td><?php echo $row['id']; ?></td>
    									<td><?php echo $row['title']; ?></td>
    									<td>$ <?php echo $row['amount']; ?></td>
    									<td><?php if($row['status']==0){echo 'Pending';}elseif($row['status']==1){echo 'In Process';}elseif($row['status']==2){echo 'Completed';} ?></td>
    									<td><a href="view_order.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-small">View Order</a></td>
                      <td> <a href="view_order.php?id=<?php echo $row['id']; ?>">
                        <?php $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_message where notify = '0' AND assignment_id = '$id'"));
                        echo $count; ?> unread message
                    </a>  </td>

    								</tr>
    								<?php
    							}
    							?>
    						</tbody>
    					</table
              <div class="title">
                <h2>In process Orders</h2>
              </div>
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="15%">Order ID</th>
                  <th width="45%">Homework Title</th>
                  <th width="15%">Amount</th>
                  <th width="15%">Status</th>
                  <th width="10%">Action</th>
                  <th width="10%">message</th>
                </tr>
              </thead>
              <tbody>
                <?php

                $i=0;


                while ($row1 = $Orders1->fetch_assoc()) {

                  $i++;
                  ?>
                  <tr>
                    <td><?php echo $row1['id']; ?></td>
                    <td><?php echo $row1['title']; ?></td>
                    <td>$ <?php echo $row1['amount']; ?></td>
                    <td><?php if($row1['status']==0){echo 'Pending';}elseif($row1['status']==1){echo 'In Process';}elseif($row1['status']==2){echo 'Completed';} ?></td>
                    <td><a href="view_order.php?id=<?php echo $row1['id']; ?>" class="btn btn-primary btn-small">View Order</a></td>
                    <td> <a href="view_order.php?id=<?php echo $row['id']; ?>">
                      <?php $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_message where notify = '0' AND assignment_id = '$id'"));
                      echo $count; ?> unread message
                  </a>  </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
            <div class="title">
              <h2>Completed Orders</h2>
            </div>
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="15%">Order ID</th>
                <th width="45%">Homework Title</th>
                <th width="15%">Amount</th>
                <th width="15%">Status</th>
                <th width="10%">Action</th>
                  <th width="10%">message</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $i=0;


              while ($row2 = $Orders2->fetch_assoc()) {

                $i++;
                ?>
                <tr>
                  <td><?php echo $row2['id']; ?></td>
                  <td><?php echo $row2['title']; ?></td>
                  <td>$ <?php echo $row2['amount']; ?></td>
                  <td><?php if($row2['status']==0){echo 'Pending';}elseif($row2['status']==1){echo 'In Process';}elseif($row2['status']==2){echo 'Completed';} ?></td>
                  <td><a href="view_order.php?id=<?php echo $row2['id']; ?>" class="btn btn-primary btn-small">View Order</a></td>
                  <td> <a href="view_order.php?id=<?php echo $row['id']; ?>">
                    <?php $count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_message where notify = '0' AND assignment_id = '$id'"));
                    echo $count; ?> unread message
                </a>  </td>
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
				values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],
				postfix: 'Pages',
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

      elementCPU.on( 'change', function(){
				pricingPages = $(this).prop('value');
				 var words = pricingPages * 275;
				 $('#words').text('' + words + ' Words');
				calculatePrice( pricingPages, pricingRAM, pricingStorage );
			});
  /*  var price = 15;
    //jQuery('.cpu-price').html('$'+price);
       if (switchStatus === true){
       price = 20;
       //	jQuery('.cpu-price').html('$'+price);
     }*/

			calculatePrice( pricingCPU, pricingRAM, pricingStorage );

			function calculatePrice( cpu, ram, storage ) {
				var pricingValue = ( Number(cpu) * price  ) + ( Number(ram) * 8 ) + ( Number(storage) * 0.5 );
				jQuery('.cpu-value').html(pricingCPU);
				jQuery('.ram-value').html(pricingRAM);
				jQuery('.storage-value').html(pricingStorage);
				jQuery('.cpu-price').html('$'+pricingCPU *price);
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
