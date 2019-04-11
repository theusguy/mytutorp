<?php
include("headerlinks.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login.php');
}
if($_SESSION['USER_TYPE'] != 0){
redirect('index.php');
}
if(isset($_POST['cat'])){
    $cat = $_POST['cat'];
    $title = $_POST['title'];
    $pages = $_POST['pages'];
    $words = $pages * 250;
    $deadline = $_POST['deadline'];
    $amount = floatval($_POST['total_price']);


    $data = array(
    'user_id' => $_SESSION['USER_ID'],
        'cat_id' => $cat,
         'title' => $title,
         'pages' => $pages,
         'words' => $words,
         'deadline' => $deadline,
         'amount' => $amount,
         'created_date' => date('Y-m-d H:i:s'),
    );

    insert($conn, 'tbl_assignments', $data);
   // $_SESSION['ORDER_ID'] = $conn->insert_id;
    redirect('make_payment.php?ORDER_ID='.$conn->insert_id);
}

?>

<!-- <script>

	var category = "";
	var pricexx;
</script> -->


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
                    <h2 class="mb-3 h1 t300">New Order</h2>
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
           <?php echo flash_msg(); ?>

            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    <style>
    	.no-radius{
    		border-radius: 0px;
    	}
    	.btn-default {
    		color:#333 !important;
    	}
    </style>

    	<div class="divide60" id="reload"></div>
    	<div class="divide60"></div>
    	<div class="divide30"></div>

    	<section class="container m-t-40">
    		<div class="row">
    			<div class="col-md-8">
     <?php echo flash_msg(); ?>
    				<div class="row">
    					<div class="col-sm-12 p-b-40 m-b40">
    						<form enctype="multipart/form-data" method="post" action="" class="form-horizontal">
    							<input type="hidden" name="currency" id="currency" value="">


    							<!-- -->
    							<div class="form-group">
    								<label for="" class="col-sm-3 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Category:</font></font></label>
    								<div class="col-sm-9">
    									<select id="cat1" class="form-control" name="cat" style="display: block;">
                           <?php
                                               $cat2 = get($conn, 'tbl_category');
                                               while($row = $cat2->fetch_assoc()){ ?>
                                               <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                             <?php }
                                              ?>
                                        </select>




    								</div>
    							</div>
                  <div class="form-group">
                    <label for="" class="col-sm-3 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">delivery:</font></font></label>
                    <div class="col-sm-9">
                      <select id="myCat" class="form-control" name="del" style="display: block;">
                        <option value ="disable" selected>Choose Option</option>
                        <option value="Regular">Regular  1-7 days</option>
                        <option value="Rushed">Rushed  1-2 days</option>
                                        </select>
<script type="text/javascript">

$(document).ready(function(){

	 document.getElementById("plus_btn").disabled = true;
     document.getElementById("minus_btn").disabled = true;
  $("#myCat").change(function(){
      category = $(this).children("option:selected").val();
      document.getElementById("total_pages").value="1";
      document.getElementById("plus_btn").disabled = false;
      document.getElementById("minus_btn").disabled = false;
      if(category == 'Regular'){
    			$('.price').text('$' + 15 + 'USD');
    		}
    	else if(category == 'Rushed'){
    			$('.price').text('$' + 20 + 'USD');
     }


  });
});
</script>




                    </div>
                  </div>



    							<!-- -->
    							<div class="form-group">
    								<label for="" class="col-sm-3 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Title:</font></font></label>
    								<div class="col-sm-9">
    									<input type="text" name="title" id="subject_es" class="form-control" placeholder="Please Title">
    								</div>
    							</div>
    							<!-- -->

    							<!-- -->

    						<!-- -->

    						<div class="form-group">
    							<label for="" class="col-sm-3 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Pages:</font></font></label>
    							<div class="col-sm-3">
    								<div class="input-group">
    									<span class="input-group-btn">
    										<button type="button" id="minus_btn" class="btn btn-danger btn-number btn-pages" data-type="minus" data-field="pages" >
    											<label class="glyphicon glyphicon-minus"></label>
    										</button>
    									</span>
    									<input type="text" name="pages" id="total_pages" class="form-control input-number" onchange="calculatttt();" value="1" min="1" max="100">
    									<span class="input-group-btn">
    										<button type="button" id="plus_btn" class="btn btn-success btn-number btn-pages" data-type="plus" data-field="pages" >
    											<label class="glyphicon glyphicon-plus"></label>
    										</button>
    									</span>

    								</div>
                                     <p id="words">250 Words</p>
    							</div>
    						</div>

    						<!--<div class="form-group">-->
    						<!--		<label for="" class="col-sm-3 control-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Deadline:</font></font></label>-->
    						<!--		<div class="col-sm-9">-->
    						<!--			<input type="date" id="dead_line" name="deadline" value="<?php //echo date('Y-m-d', strtotime('+1 Day')); ?>" required  onchange="calculatttt();" class="form-control">-->
    						<!--		</div>-->
    						<!--	</div>-->
    						<!-- <hr>-->

    						<input type="hidden" class="total_price" name="total_price" value="5">
    						<div class="col-sm-9 col-md-offset-3 text-center">
    							<button type="submit" class="btn btn-primary btn-lg lgx sendButton text-center" disabled=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PROCEED TO PAYMENT</font></font></button>
    						</div>
    					</form><br><br><br><br>
    				</div>
    				<div class="col-sm-4"></div>
    			</div>




    		</div>


    		<div class="col-md-3 col-md-offset-1">
    			<h2 class="m-b-5 p-b-10"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TOTAL PRICE</font></font></h2>
                <h2 style="color:#000;" class="price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$0 USD</font></font></h2>
    			<h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Explanation</font></font></h2>
    			<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fill out the form to request a trial. </font><font style="vertical-align: inherit;">At the end of the form, click on the "Proceed to Payment" button. </font><font style="vertical-align: inherit;">Once the payment has been made, we will begin to work on your essay. </font><font style="vertical-align: inherit;">We invite you to be as specific as possible when giving the instructions of the essay, in order to provide a service that meets your expectations. </font><font style="vertical-align: inherit;">As soon as the payment is made, it will not be possible to change the details of your requirements.</font></font></p>
    			<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Note: Each page has </font></font><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">approx. </font><font style="vertical-align: inherit;">250 words</font></font></strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> at double spacing. </font><font style="vertical-align: inherit;">If you require simple spacing you must ask for twice as many pages.</font></font></p>
    		</div>
    	</div>
    </section>



          <script src="<?php echo base_url (); ?>js/jquery.min.js"></script>







    	<script type="text/javascript">

			var value2='disable';
			var value1 ='abc';


				$(document).ready(function() {
					$('.sendButton').prop('disabled', true);

				});


                /**
                 * Validations for New Order page
                 */
				$("#myCat").on('change', function() {

					value2 = myCat.value;
					if (value2 === 'disable' || value1 == 'abc' || value1 == null || value1 == '') {

						$('.sendButton').prop('disabled', true);
					} else {
						$('.sendButton').prop('disabled', false);

					}

				});

				$('#subject_es').keyup(function() {
					value1 = this.value;
					if (value2 === 'disable' || value1 == 'abc' || value1 == null || value1 == '') {

						$('.sendButton').prop('disabled', true);
					} else {
						$('.sendButton').prop('disabled', false);

					}

				});

    		/* var val1 = $("#subject_es").val();
    		 var val2 = '';





				if(val1 === '' || val2 === 'Choose Option'){
    		 	$('.sendButton').prop('disabled', true);
    		    }
    		    else{
    		    	$('.sendButton').prop('disabled', false);
    		    }
				});*/
    	/*
    	// Este coódigo no es necesario.
    	$('select[name="level"]').change(function() {
    	calculatePrice();
    });

    $('select[name="delivery"]').change(function() {
    calculatePrice();
    });

    $('input[name="pages"]').keyup(function() {
    calculatePrice();
    });

    function calculatePrice() {

    if ($('input[name="subject_es"]').val() != '') {
    var price = Number($('select[name="level"] :selected').attr('data-value') * $('input[name="subject_es"]').val()) + Number($('select[name="delivery"] :selected').attr('data-value'));
    if (!isNaN(price)) {
    $('#price').text(price);
    } else {
    $('#price').text("0");
    }
    } else {
    $('#price').text("0");
    }
    console.log($('input[name="subject_es"]').val());
    }
    calculatePrice();
    */
    </script>


    <script type="text/javascript">
    /* Modified area by S start*/

    /* Modified area by S end*/


    //plugin bootstrap minus and plus
    $('.btn-number').click(function(e){
    	e.preventDefault();

    	fieldName = $(this).attr('data-field');
    	type      = $(this).attr('data-type');
    	var input = $("input[name='"+fieldName+"']");
    	var currentVal = parseInt(input.val());
    	if (!isNaN(currentVal)) {
    		if(type == 'minus') {

    			if(currentVal > input.attr('min')) {
    				input.val(currentVal - 1).change();
    			}
    // 			if(parseInt(input.val()) == input.attr('min')) {
    // 				$(this).attr('disabled', true);
    // 			}

    		} else if(type == 'plus') {

    			if(currentVal < input.attr('max')) {
    				input.val(currentVal + 1).change();
    			}

    		}
    	} else {
    		input.val(0);
    	}
    });
    $('.input-number').focusin(function(){
    	$(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

    	minValue =  parseInt($(this).attr('min'));
    	maxValue =  parseInt($(this).attr('max'));
    	valueCurrent = parseInt($(this).val());

    	name = $(this).attr('name');
    	if(valueCurrent >= minValue) {
    		$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    	} else {
    		alert('Sorry, the minimum value was reached');
    		$(this).val($(this).data('oldValue'));
    	}
    	if(valueCurrent <= maxValue) {
    		$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    	} else {
    		alert('Sorry, the maximum value was reached');
    		$(this).val($(this).data('oldValue'));
    	}


    });
    $(".input-number").keydown(function (e) {
    	// Allow: backspace, delete, tab, escape, enter and .
    	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
    	// Allow: Ctrl+A
    	(e.keyCode == 65 && e.ctrlKey === true) ||
    	// Allow: home, end, left, right
    	(e.keyCode >= 35 && e.keyCode <= 39)) {
    		// let it happen, don't do anything
    		return;
    	}
    	// Ensure that it is a number and stop the keypress
    	if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
    		e.preventDefault();
    	}
    });

    </script>
            <script>



    $('#total_pages').change(function(){
    	calculatttt();
    });





//Calculate price for pages
    function calculatttt(){

    	var pages = Number($('#total_pages').val());
    	var price; var language =0;
    	var currency = 'USD';
        var deadline = $('#dead_line').val();




    	if ( currency == 'USD' ) {

    		if(category == 'Regular'){
    			price = pages * 15;
    		}
    		else if(category == 'Rushed'){
    			price = pages * 20;
    		}
    		price = price.toFixed(0);
    		pricexx = price;
            var words = pages * 275;

    	} else {
    		    pricexx = price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    	}

    	$('#currency').text(pricexx);
    	$('.price').text('$' + pricexx + 'USD');
        $('#words').text('' + words + ' Words');
    	$('input[type=hidden].total_price').val(pricexx);
    }


    </script>


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
