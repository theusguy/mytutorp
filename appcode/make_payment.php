<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<!-- Error Exception: PHP logic to redirect once landed on this page in case user isn't logged in or student 
===========================================-->
<?php
    include("headerlinks.php");
    if(!isset($_SESSION['USER_ID'])){
        redirect('login.php');
    }
    if($_SESSION['USER_TYPE'] != 0){
        redirect('index.php');
    }
?> <!-- end of error exception -->

<?php
    // Getter for order ID or redirects back to my_orders page
    if(isset($_REQUEST['ORDER_ID'])){
        $order_id = $_REQUEST['ORDER_ID'];
    }else{
        redirect('my_orders.php');
    }

    if($order_id != 0){
        $get_orderDtl =  get($conn, 'tbl_assignments', "where id = '$order_id' && user_id = '{$_SESSION['USER_ID']}'");

        if($get_orderDtl->num_rows == 0){
            redirect('my_orders.php');
        }else{
            $order = $get_orderDtl->fetch_assoc();
            $payment_check =  get($conn, 'tbl_payments', "where assignment_id = '$order_id'")->num_rows;
            if($payment_check > 0){
                redirect('my_orders.php');
            }
        }
    }else{
        redirect('my_orders.php');
    }

    // Start of STRIPE Payment Logic
    require 'stripe/Stripe.php';
    $stripe_sk = "sk_live_Y8OBKHaRIcjETCMO68rAnmMw";
    $stripe_pk = "pk_live_qAexOsxn6ZdHRhGHmvjUh2h3";


    Stripe::setApiKey($stripe_sk);
    $pubkey = $stripe_pk;
    if(isset($_POST['stripeToken'])) {
        $amount_cents = $_POST['amount'];                // Invoice ID
        $description = $_POST['discription'];
        try {
            // Stripe_Charge create method call
            $charge = Stripe_Charge::create(array(
                "amount" => $amount_cents,                   //param
                "currency" => "usd",                         //param
                "source" => $_POST['stripeToken'],           //param
                "description" => $description,               //param
                "statement_descriptor" => "MyTutorPlug",     //param
                ), array("stripe_account" => CONNECTED_STRIPE_ACCOUNT_ID)
            ); // end of Stripe_Charge create method call

            if ($charge->card->address_zip_check == "fail") {
                throw new Exception("zip_check_invalid");
            } else if ($charge->card->address_line1_check == "fail") {
                throw new Exception("address_check_invalid");
            } else if ($charge->card->cvc_check == "fail") {
                throw new Exception("cvc_check_invalid");
            }

            // Payment has succeeded, no exceptions were thrown or otherwise caught
            $transection_id = $charge['balance_transaction'];
            $now = date("Y-m-d H:i:s");
            $orderDtl = $conn->query("select * from tbl_assignments WHERE id = '$order_id'");
            $orderDtl = $orderDtl->fetch_assoc();
            $orderDtl = $orderDtl['user_id'];
            $amount_ce = $amount_cents/100;
            $conn->query("insert into tbl_payments set assignment_id = '$order_id', user_id = '$orderDtl', payment_method = 'Card', transection_id = '$transection_id', amount = '$amount_ce', created_date = '$now'");
            $_SESSION['flash'] = '<div class="alert alert-success">Thanks for Placing your Order. Payment Completed Successfully.</div>';
            redirect('my_orders.php');

        } catch(Stripe_CardError $e) {

            $error = $e->getMessage();
            $result = "CardError. Try Again Later";
        } catch (Stripe_InvalidRequestError $e) {
            $result = "Stripe_InvalidRequestError";
        } catch (Stripe_AuthenticationError $e) {
            $result = "AuthenticationError. Try Again Later";
        } catch (Stripe_ApiConnectionError $e) {
            $result = "Stripe_ApiConnectionError";
        } catch (Stripe_Error $e) {
            $result = "Stripe_Error. Try Again Later";
        } catch (Exception $e) {

            if ($e->getMessage() == "zip_check_invalid") {
                $result = "Zip Invalid. Try Again Later";
            } else if ($e->getMessage() == "address_check_invalid") {
                $result = "Address Invaild. Try Again Later";
            } else if ($e->getMessage() == "cvc_check_invalid") {
                $result = "CVS Invalid. Try Again Later";
            } else {
                $result = "Unknown Error";
            }
        } //end of try-catch

        //unset($_SESSION['ORDER_ID']);
        $_SESSION['flash'] = '<div class="alert alert-danger">'.$result.'</div>';
        redirect('my_orders.php');

    } //end of if statement
    // END OF STRIPE PAYMENT LOGIC


    // why is this here?
    $paypal_email   = "theusguy@gmail.com";



?> <!-- end of php logic -->

<body>
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
                                    <h2 class="mb-3 h1 t300">Make Payment</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Addition Service Section
                ============================================= -->
    </section><!-- #content end -->

    <br><br>

    <?php  $userDetail = get($conn, 'tbl_users', "where id = '{$_SESSION['USER_ID']}'")->fetch_assoc(); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div class="title">
                        <h2>Select Payment Method to Pay</h2>
                    </div>
                </div>  
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="contact-form-block">
                    <?php echo flash_msg(); ?>
                </div>

                <div class="col-md-4 offset-2">
                    <h4>Pay With Your Card</h4>
                    <form action="" method="POST">
                        <input type="hidden" value="<?php echo $order['amount']*100; ?>" name="amount" />
                        <input type="hidden" value="Payment for Order # <?php echo $_REQUEST['ORDER_ID']; ?>" name="discription" />
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo $pubkey; ?>"
                            data-amount="<?php echo $order['amount']*100; ?>"
                            data-name="MyTutorPlug"
                            data-description="Payment For Order # <?php echo $_REQUEST['ORDER_ID']; ?>"
                            data-image=""
                            data-locale="auto"
                            data-zip-code="false"
                            data-email="<?php echo $userDetail['email']; ?>">
                        </script>
                    </form>
                </div>

                <!-- Start of Paypal Code ..written in body unlike stripe written above in php code -->
                <div class="col-md-4 offset-1">

                    <h4>Pay With Paypal</h4>
                    <div id="paypal-button-container">

                    </div>
	   
	               <!-- PAYMENT CODE -->
	   
                    <script src="https://www.paypal.com/sdk/js?client-id=AS8Mtf1RFFlVhfz4i--SmeoFN2rMaFtfaHY5TwsNuFtMLZSCs6lekXqXWZOMqrWoh_v1OaSf5nNVYkgb"></script>
                    <script>paypal.Buttons(
                        {
                            createOrder: function(data, actions) {
                                // Set up the transaction
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?php echo $order['amount']; ?>'
                                        }
                                    }]
                                });
                            }   
                        }

                    ).render('#paypal-button-container');</script>

                    <!-- <form action="https://www.paypal.com/cgi-bin/webscr" id="paypal-button-container" target="_top" method="post" id="2">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="business" value="<?php echo $paypal_email; ?>">
                    <input type="hidden" name="item_name" value="Payment for Order # <?php echo $_REQUEST['ORDER_ID']; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $_REQUEST['ORDER_ID']; ?>">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" value="1" name="no_note"/>
                    <input type="hidden" value="1" name="no_shipping"/>
                    <input type="hidden" name="amount" id="amount" value="<?php echo $order['amount']; ?>">
                    <input type="hidden" name="return" value="<?php echo base_url(); ?>thanks_payment.php">
                    <input type="hidden" name="cancel_return" value="<?php echo base_url(); ?>make_payment.php?ORDER_ID=<?php echo $_REQUEST['ORDER_ID']; ?>">
                    <input type="hidden" name="notify_url" value="<?php echo base_url(); ?>ppstatus.php">
                    <input type="submit"   name="submit" value="Pay Now" />

                    </form> -->
                </div>
            </div> <!-- end of row div -->
        </div> <!-- end of container div -->
              <!--<section class="contact-info-area contact-page">-->

              <!--  <div class="container">-->
              <!--    <div class="row">-->
              <!--         <div class="title">-->
              <!--          <h2>Select Payment Method to Pay</h2>-->
              <!--          </div>-->
              <!--           <div class="col-md-6">-->
              <!--              <h4>Pay With Your Card</h4>-->

              <!--			  <form action="" method="POST">-->
              <!--				  <input type="hidden" value="<?php //echo $order['amount']*100; ?>" name="amount" />-->
              <!--				  <input type="hidden" value="Payment for Order # <?php //echo $_REQUEST['ORDER_ID']; ?>" name="discription" />-->
              <!--  <script-->
              <!--    src="https://checkout.stripe.com/checkout.js" class="stripe-button"-->
              <!--    data-key="<?php echo $pubkey; ?>"-->
              <!--    data-amount="<?php //echo $order['amount']*100; ?>"-->
              <!--    data-name="MyTutorPlug"-->
              <!--    data-description="Payment For Order # <?php //echo $_REQUEST['ORDER_ID']; ?>"-->
              <!--    data-image=""-->
              <!--    data-locale="auto"-->
              <!--    data-zip-code="false"-->
              <!--		   data-email="<?php //echo $userDetail['email']; ?>">-->
              <!--  </script>-->
              <!--</form>-->
              <!--			</div>-->
              <!--      <div class="col-md-6">-->

              <!--        <div class="contact-form-block">-->
              <!--        <?php //echo flash_msg(); ?>-->
              <!--        </div>-->

              <!--               <div class="col-md-12">-->
              <!--              <h4>Pay With Paypal</h4>-->
              <!--              <form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post" id="2">-->
              <!--<input type="hidden" name="cmd" value="_xclick">-->
              <!--<input type="hidden" name="business" value="<?php //echo $paypal_email; ?>">-->
              <!--<input type="hidden" name="item_name" value="Payment for Order # <?php //echo $_REQUEST['ORDER_ID']; ?>">-->

              <!--<input type="hidden" name="item_number" value="<?php// echo $_REQUEST['ORDER_ID']; ?>">-->
              <!--<input type="hidden" name="currency_code" value="USD">-->
              <!--<input type="hidden" value="1" name="no_note"/>-->
              <!--<input type="hidden" value="1" name="no_shipping"/>-->
              <!--<input type="hidden" name="amount" id="amount" value="<?php //echo $order['amount']; ?>">-->
              <!--<input type="hidden" name="return" value="<?php //echo base_url(); ?>thanks_payment.php">-->
              <!--<input type="hidden" name="cancel_return" value="<?php// echo base_url(); ?>make_payment.php?ORDER_ID=<?php //echo $_REQUEST['ORDER_ID']; ?>">-->
              <!--<input type="hidden" name="notify_url" value="<?php //echo base_url(); ?>ppstatus.php">-->
              <!--                  <input type="submit" class="btn btn-success btn-xs" name="submit" value="Pay Now" />-->
              <!--</form>-->

              <!--			</div>-->
              <!--      </div>-->

              <!--    </div>-->
              <!--  </div>-->
              <!--</section>-->
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

        <!-- why do we need this whole script code below? -->
        <!-- ATTENTION !!!!! SOS !!!!!!! -->
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
