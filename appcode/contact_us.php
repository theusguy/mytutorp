<?php include("headerlinks.php");
if(isset($_POST['form_name'])){
$name=$_REQUEST['form_name'];
$email=$_REQUEST['form_email'];
$subject=$_REQUEST['form_Subject'];
$form_msg=$_REQUEST['form_message'];


$msg=$_REQUEST['message'];
// multiple recipients
$to  = 'alisoftware66@gmail.com'; // note the comma
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
 set_flash('success', 'Your Message has been Sent.', 'contact_us.php');
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
                    <h2 class="mb-3 h1 t300">Contact Us</h2>
                      </div>


                </div>
              </div>
            </div>
          </div>



				<!-- Addition Service Section
				============================================= -->


		</section><!-- #content end -->
    <br><br>

    <!-- contact-info-area -->
    	<section id="content">



    <!-- Content
    		============================================= -->



    			<div class="content-wrap">

    				<div class="container clearfix">

    					<!-- Contact Form
    					============================================= -->
              <div class="container">
                <div class="row">
                  <div class="col-md-6 contact-area contact-page">
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
                  </div>
                  <div class="col-md-6">
                    <section id="google-map" class="gmap" style="height: 410px;">
                    <iframe <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d60478599.010649286!2d73.1763878!3d22.3037064!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1520579339077" class="map" style="border:0" allowfullscreen="" height="200"></iframe>
                </section>
                  </div>
                </div>
              </div>

    					<!-- Google Map
    					============================================= -->
    					<!-- <div class="col_half col_last">

    						<section id="google-map" class="gmap" style="height: 410px;">
                <iframe <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d60478599.010649286!2d73.1763878!3d22.3037064!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1520579339077" class="map" style="border:0" allowfullscreen="" height="250"></iframe>
</section>
</div>-->


    					<div class="clear"></div>

    					<!-- Contact Info
    					============================================= -->
    					<div class="row clear-bottommargin">

    						<div class="col-lg-3 col-md-6 bottommargin clearfix">
    							<div class="feature-box fbox-center fbox-bg fbox-plain">
    								<div class="fbox-icon">
    									<a href="#"><i class="icon-map-marker2"></i></a>
    								</div>
    								<h3>Address<span class="subtitle">Faisalabad, Pakistan</span></h3>
    							</div>
    						</div>

    						<div class="col-lg-3 col-md-6 bottommargin clearfix">
    							<div class="feature-box fbox-center fbox-bg fbox-plain">
    								<div class="fbox-icon">
    									<a href="#"><i class="icon-phone3"></i></a>
    								</div>
    								<h3>Speak to Us<span class="subtitle">+123456677</span></h3>
    							</div>
    						</div>

    						<div class="col-lg-3 col-md-6 bottommargin clearfix">
    							<div class="feature-box fbox-center fbox-bg fbox-plain">
    								<div class="fbox-icon">
    									<a href="#"><i class="icon-skype2"></i></a>
    								</div>
    								<h3>Make a Video Call<span class="subtitle">CanvasOnSkype</span></h3>
    							</div>
    						</div>

    						<div class="col-lg-3 col-md-6 bottommargin clearfix">
    							<div class="feature-box fbox-center fbox-bg fbox-plain">
    								<div class="fbox-icon">
    									<a href="#"><i class="icon-google-plus"></i></a>
    								</div>
                    	<h3>Email<span class="subtitle"><a href="mailto:info@mytutorplug.com">info@mytutorplug.com</a></span></h3>

    							</div>
    						</div>

    					</div><!-- Contact Info End -->

    				</div>

    			</div>

    		</section><!-- #content end -->

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



</body>
</html>
