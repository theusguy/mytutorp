
	<!-- / -->
	<?php include("headerlinks.php");
	if(isset($_POST['form_name'])){
	$name=$_REQUEST['form_name'];
	$email=$_REQUEST['form_email'];
	$subject=$_REQUEST['form_Subject'];
	$form_msg=$_REQUEST['form_message'];


	$msg=$_REQUEST['message'];
	// multiple recipients
	$to  = 'alisoftware66@gmail.com'; // note the comma
		$to  = 'rizwanmehar772@gmail.com'; // note the comma
	//$to .= 'wez@example.com';

	// subject

	// message
	$message = $form_msg;

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/plain; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$name.'<'.$email.'>' . "\r\n";
	// Additional headers

	// Mail it
	mail($to, $subject, $message, $headers);
	 set_flash('success', 'Your Message has been Sent.', 'index.php');
	}

	?>

		<section id="slider" class="slider-element ">

			<!-- Slider Background Map
			============================================= -->
			<img class="img-map parallax" src="images/svg/map-light.svg" alt="" data-0="opacity: 0.05;margin-top:0px" data-800="opacity: 0.5;margin-top:150px">

			<!-- Slider Background Cloud
			============================================= -->
			<div class="cloud-wrap">
				<div class="c1"><div class="cloud"></div></div>
				<div class="c2"><div class="cloud"></div></div>
				<div class="c3"><div class="cloud"></div></div>
				<div class="c4"><div class="cloud"></div></div>
				<div class="c5"><div class="cloud"></div></div>
			</div>

			<!-- Slider Titiles
			============================================= -->
			<div class="vertical-middle ignore-header dark">
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-md-5">
							<div class="slider-title">

								<h2 class="text-white text-rotater mb-3 wow bounceInLeft" data-wow-delay="0.3s" data-separator="," data-rotate="fadeIn" data-speed="3500">	Get your <span class="t-rotate text-white"> Essay, Research Paper, Writing</span>  <br>   completed by an expert.</h2>
								<!-- <p>Dramatically syndicate end-to-end leadership skills for virtual solutions. Assertively transform high-payoff ideas rather than virtual process improvements.</p> -->
							</div>
							<a href="signup.php" class="button bg-white text-dark button-light button-rounded button-large color ml-0 wow bounceInLeft" data-wow-delay="0.5s">Signup <i class="icon-line-arrow-right t600"></i></a>
						</div>
						<div class="col-md-5 d-none d-md-block">
							<img src="images/lightbulb.png" alt="">
						</div>
					</div>
				</div>
			</div>

		</section><!-- #slider end -->
		<!-- Content
		============================================= -->
		<div class="content">
			<div id="about">
			</div><br>
		<section  >
				<div class="heading-block center  divcenter topmargin-lg nobottomborder clearfix"  style="max-width: 800px;" >
					<h2>ABOUT ME</h2>
					<p style="text-align:justify;" > MyTutorPlug started because I had a problem similar to one, you’re probably facing as well.  I was attending college as a STEM major and was swamped with all my demanding math, science and engineering classes.  But I still had all of my general elective courses to worry about as well...  Mainly English.</p>
					<p style="text-align:justify;" >MyTutorPlug is a network of well-educated, native English writers who (all have master’s degrees of higher) and specialize in writing essays!  Now I can turn in top-notch English essays for my GE classes and not take excessive time away from the STEM classes that are my main focus. I personally used this free time to prepare for internships and interviews. It’s a win/win for everyone! </p>
					<p style="text-align:justify;" >If you’re struggling with the same problem, give our service a try today and see how much it frees up your time and helps you succeed in school!”
		</p>
			</div>
		</section>
		<section>
				<div class="heading-block center topmargin-lg divcenter nobottomborder clearfix "  style="max-width: 800px;" >
			<h2>HOW IT WORKS</h2>
					<ol>
						<li>	<p  style="text-align:justify;" >Students create an order with specific requirements and details on the essay or assignment.</p>
					</li>
					<li>
					<p  style="text-align:justify;"  >Students create an order with specific requirements and details on the essay or assignment.</p>
					</li>
					<li>	<p  style="text-align:justify;">The order enters into a queue where it remains until assigned to best tutor according to your subject and timeline. (Usually within 15 minutes)</p>
				</li>
				<li>	<p  style="text-align:justify;">Once the tutor and student are connected, they can use chat box to clarify any requirements.</p>
			</li>
			<li>	<p  style="text-align:justify;">The tutor gets started right away and usually submits essay before time limit so any needed revisions can be completed in a timely manner.</p>
		</li>
		<li><p  style="text-align:justify;"> Once the student is happy with final product, the tutor ends order.</p>
		</li>
	</ol>
				</div>
		</section>
	
			<section>

						<!-- Addition Service Section
						============================================= -->
						<div class="container clearfix">
							<div class="row clearfix">
								<div class="col-md-12">
									<!-- <div class="before-heading">Other Additional Services</div> -->
									<h3>Sample Essay</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="feature-box p-4 media-box" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed;">
												<div class="fbox-media">
													<img src="images/svg/balancing.svg" style="width: 42px;" alt="">
												</div>
												<div class="fbox-desc">
													<h3 class="ls0">Mongols Invasion</h3>
													<p class="mt-2">According to history, the Mongols exerted their dominance in most of Eurasia through invasions and conquests.</p>
												</div>
												<a href="https://docs.google.com/document/d/1XXjbdYe1tIJyi7dMKnTnGSTCPdAs-RUiJXLfPXIwYYU/edit" target="_blank" class="btn btn-link mt-3 t400 color p-0" style="font-size: 16px;">Read More <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>
											</div>

											<div class="feature-box p-4 topmargin-sm media-box" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed;">
												<div class="fbox-media">
													<img src="images/svg/location.svg" style="width: 42px;" alt="">
												</div>
												<div class="fbox-desc">
													<h3 class="ls0">Global Warming</h3>
													<p class="mt-2">Global warming and climate change are two terms, which are often used interchangeably in discourses. Undeniably, the two phenomenon have a close connection.</p>
												</div>
												<a href="https://docs.google.com/document/d/1wwKtirdNpc8ObtB6Nqkq6g4oztcbiJ2JHSudWnkEtsc/edit" target="_blank" class="btn btn-link mt-3 t400 color p-0" style="font-size: 16px;">Read More <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>
											</div>
										</div>

										<div class="col-md-6">
											<div class="feature-box p-4 mt-4 mt-sm-0 media-box" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed;">
												<div class="fbox-media">
													<img src="images/svg/ssl.svg" style="width: 42px;" alt="">
												</div>
												<div class="fbox-desc">
													<h3 class="ls0">UC Personal Essay</h3>
													<p class="mt-2"> Some people have healthy and positive childhoods, nurtured by loving parents and encouraged to pursue a wide range of academic and non-academic passions.</p>
												</div>
												<a href="https://docs.google.com/document/d/1DaRZj5xJ8QBqo50KBpP35HwaMf9jAG0mwFp2beBZa64/edit" class="btn btn-link mt-3 t400 color p-0" target="_blank" style="font-size: 16px;">Read More<i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>
											</div>

											<div class="feature-box p-4 topmargin-sm media-box" style="border-radius: 6px; box-shadow: 0 2px 4px rgba(3,27,78,.1); border: 1px solid #e5e8ed;">
												<div class="fbox-media">
													<img src="images/svg/team.svg" style="width: 42px;" alt="">
												</div>
												<div class="fbox-desc">
													<h3 class="ls0">Nurses and Substance Abuse</h3>
													<p class="mt-2">The term substance use disorder can refer to a full range of issues from addiction to drugs or alcohol to abuse of drugs and dependency.</p>
												</div>
												<a href="https://docs.google.com/document/d/1Dm9nzF9i47MzGmcNlSGmY6-xW9m3dtqc034FN_xImAg/edit" target="_blank" class="btn btn-link mt-3 t400 color p-0" style="font-size: 16px;">Read More <i class="icon-line-arrow-right position-relative" style="top: 2px"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>

		</section>
		<section>
				<div class="heading-block center  divcenter topmargin-lg nobottomborder clearfix"  style="max-width: 800px;" >
							<h2>SECURITY IS OUR PRIORITY</h2>
							<p  style="text-align:justify;">With our invite-only system, each student and tutor will be personally monitored to ensure full confidentiality and security. All essays are fully vetted through multiple plagiarism trackers and proofread by multiple tutors before submitted back to the student.</p>
							<p  style="text-align:justify;">We offer multiple payment options including PayPal to give students a full sense of confidence and security of their money’s worth. Venmo, Apple Pay, and WeChat Pay payment options are coming soon as well</p>
			</div>
		</section>
		<div class="section mt-3 mb-4 pt-0 nobg">
			<div class="container clearfix">
				<div class="divcenter" style="max-width: 1000px">
					<div class="heading-block center divcenter nobottomborder clearfix " style="max-width: 700px">
						<!-- <div class="before-heading">Already with Us</div> -->
						<h2>We currently accept</h2>
						</div>
					<!-- Clients Images -->
					<div class="row clearfix ">
						<div class="col-sm-3 col-6 center wow bounceInUp" data-wow-delay="0.6s"><a href="#"><img src="images/mastercard.png" alt="" width="80" class="clients"></a></div>
						<div class="col-sm-3 col-6 center wow bounceInUp" data-wow-delay="0.9s"><a href="#"><img src="images/credit.png" alt="" width="80" class="clients"></a></div>
						<div class="col-sm-3 col-6 center wow bounceInUp" data-wow-delay="1.2s"><a href="#"><img src="images/paypa.png" alt="" width="80" class="clients mt-5 mt-sm-0"></a></div>
						<div class="col-sm-3 col-6 center  wow bounceInUp" data-wow-delay="1.5s"><a href="#"><img src="images/visa.png" alt="" width="80" class="clients mt-5 mt-sm-0"></a></div>
					</div>
				</div>
			</div>
		</div>
		<div id="Refund_Policy">

		</div>
		<section>
				<div class="heading-block center  divcenter topmargin-lg nobottomborder clearfix"  style="max-width: 800px;" >
								<h2 >Refund Policy</h2>
								<h5>Can I get a refund if I don’t want the essay anymore?</h5>
								<p  style="text-align:justify;" >We value customer satisfaction over everything. <b>If you cancel your order before the essay is
									submitted by the tutor/writer, we will provide a full refund, no questions asked. </b> However, if the essay is already completed
									 and submitted, we will follow the process below to resolve the dispute and make it right.</p>
								<p  style="text-align:justify;">If the essay completed and submitted is not what you want, we’ll intervene and talk to both you
									 and the tutor.  We will check the Tutor/Student Chat to see if the problem is the tutor’s fault for not following directions
									  or the student’s fault for not providing clear directions.</p>
										<p  style="text-align:justify;">If it’s the <b> tutor’s fault</b>, the next step is to see if a revision can solve the problem.
											  If so, the tutor will provide a revised essay before the deadline.
												 <b>If the essay’s due date is passed, we understand and will provide a full refund</b>.</p>
												 <p style="text-align:justify;">If the dispute is determined to be the <b> student’s fault</b>, we will ask for further clarification
													  so the tutor can provide a revision as soon as possible.  In this situation, if we are not able to get the essay completed
														 in time for your deadline, <b> we will offer a half refund.</b>  (But, please keep in mind, we only offer one student-fault,
														 half refund per semester.  This is only for a sign of good will and should not be abused.)</p>
														 <p style="text-align:justify;">All in All, we are committed to our customers are satisfied with their purchase.
															  If you’re not satisfied, please let us know right away through our ‘Contact Us’ form --  <b>we want to make it right
																 and easy!</b> </p>	</div>
		</section>
		</div>
<div id="contact">

</div>
		<section>
				<div class="heading-block center  divcenter topmargin-lg nobottomborder clearfix"  style="max-width: 800px;" >
		<div class="contact-form-block">
			<div class="title">
				<h2>Get in Touch</h2>
			</div>
			<?php echo flash_msg(); ?>
			<form  action="" name="contact_form" class="default-form" method="post">
				<div class="form-group">
						<input type="text"class="form-control" name="form_name" value="" placeholder="Name" required>
					</div>
				<div class="form-group">
						<input type="email" class="form-control" name="form_email" value="" placeholder="Email" required>
					</div>

						<div class="form-group">
						<input type="text" class="form-control" name="form_Subject" value="" placeholder='Subject' required>
					</div>
					<div class="form-group">
						<textarea placeholder="Message" class="form-control" name="form_message" required></textarea>
					</div>

				<button type="submit" class="btn-one style-one radi">Send Message</button>
			</form>
		</div>
	</section>
	</div>
		<section id="content">

			<div class="content-wrap nopadding">




				<!-- Bottom Section
				============================================= -->


			</div>

		</section><!-- #content end -->

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
