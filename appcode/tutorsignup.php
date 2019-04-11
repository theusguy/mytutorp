<?php include("headerlinks.php"); ?>
<?php
	// session_start();

  if (isset($_POST['register_btn'])) {
    $a = mysqli_real_escape_string($conn, $_POST["name"]);
    $b = mysqli_real_escape_string($conn, $_POST["email"]);
    $e = mysqli_real_escape_string($conn, $_POST["password_1"]);
    $ce = mysqli_real_escape_string($conn, $_POST["password_2"]);
    $f = date('Y-d-m H:i:s');
    $user_check_query = "SELECT * FROM tbl_users  WHERE  email='$b' LIMIT 1";
    $writers_check_query = "SELECT * FROM tbl_writers  WHERE  email='$b' LIMIT 1";
    $result_writers = mysqli_query($conn, $writers_check_query);
    $writers = mysqli_fetch_assoc($result_writers);
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

      if ($user['email'] === $b || $writers['email'] === $b) {
          $error = "<div class='text-danger'>email already exists</div>";
      }else {
        $password = md5($e);
            $query = "INSERT INTO tbl_writers (name,email,password,status,created_date)
            VALUES('$a', '$b', '$password','Active','$f')";
            $query = mysqli_query($conn, $query);
            if($query)
            {
              echo "<script> alert('Your Account has been Created successfully'); </script>";
            }
            // echo "<script> location='login.php'; </script>";
      }
	}


 ?>
 <script>
     function validatePassword(password) {

         // Do not show anything when the length of password is zero.
         if (password.length === 0) {
             document.getElementById("msg").innerHTML = "";
             return;
         }
         // Create an array and push all possible values that you want in password
         var matchedCase = new Array();
         matchedCase.push("[$@$!%*#?&]"); // Special Charector
         matchedCase.push("[A-Z]");      // Uppercase Alpabates
         matchedCase.push("[0-9]");      // Numbers
         matchedCase.push("[a-z]");     // Lowercase Alphabates
         // Check the conditions
         var ctr = 0;
         for (var i = 0; i < matchedCase.length; i++) {
             if (new RegExp(matchedCase[i]).test(password)) {
                 ctr++;
             }
         }
         // Display it
         var color = "";
         var strength = "";
         switch (ctr) {
             case 0:
             case 1:
             case 2:
                 strength = "Very Weak";
                 color = "red";
                 break;
             case 3:
                 strength = "Medium";
                 color = "orange";
                 break;
             case 4:
                 strength = "Strong";
                 color = "green";
                 break;
         }
         document.getElementById("msg").innerHTML = strength;
         document.getElementById("msg").style.color = color;
     }
 </script>
 <!--==========================
   form validation
 ============================-->
 <script type="text/javascript">

 function checkForm(form)
 {

if(form.password_1.value   != form.password_2.value ) {
swal({
title:"Error",
text: "Error: Two password do not match!",
icon: "warning",
button:"ok",
});
form.password_1.focus();
return false;
}
if(form.password_1.value.length < 6) {
swal({
  title:"Error",
text: "Error: Password must contain at least six characters!",
icon: "warning",
button:"ok",
});
form.password_1.focus();
return false;
}
re = /[0-9]/;
if(!re.test(form.password_1.value)) {
swal({
  title:"Error",
text: "Error: password must contain at least one number (0-9)!",
icon: "warning",
button:"ok",
});
form.password_1.focus();
return false;
}
re = /[a-z]/;
if(!re.test(form.password_1.value)) {
swal({
  title:"Error",
text: "Error: password must contain at least one lowercase letter (a-z)!",
icon: "warning",
button:"ok",
});
form.password_1.focus();
return false;
}
re = /[A-Z]/;
if(!re.test(form.password_1.value)) {
swal({
  title:"Error",
text: "Error: password must contain at least one uppercase letter (A-Z)!",
icon: "warning",
button:"ok",
});
form.password_1.focus();
return false;
}
return true;
}



</script>
<!--==========================
 end form validation
============================-->

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
                  <h2 class="mb-3 h1 t300">Sign up</h2>
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
              <p>Signup here</p>
            </div>

            <form id="" action="" name="form" onsubmit="return checkForm(this);"  class="default-form" method="post">
                <?php  if(isset($error)) : echo $error; endif; ?> <br>
              <div class="form-group">
                    <input type="text" name="name" class="form-control" value="<?php if(isset($a)): echo $a; endif; ?>"  placeholder="Name" required>
                </div>
                <div class="form-group">
                      <input type="email" name="email" class="form-control" value="<?php if(isset($b)): echo $b; endif; ?>" placeholder="Email" required>
                  </div>
<div class="form-group">

  <input type="password" name="password_1" class="form-control" value="<?php if(isset($e)): echo $e; endif; ?>" placeholder="Enter password" required id="pwd" required placeholder="Enter Password"  onkeyup="validatePassword(this.value);"/><span id="msg"></span>
  <p style="Font-size:10px;"> Hint: Password must contain 1 uppercase, lowercase and numaric value</p>

              </div>
              <div class="form-group">

                <input type="password" name="password_2" class="form-control" value="<?php if(isset($ce)): echo $ce; endif; ?>" placeholder="Confirm Password" required>

                            </div>
              <button type="submit" name="register_btn" class="btn-one style-one radi" class="form-control">Signup Now</button>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
