<?php
include("headerlinks.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login');
}
if($_SESSION['USER_TYPE'] != 1){
redirect('index.php');
}


?>
<?php

if(isset($_REQUEST['id'])){
    $order_id = $_REQUEST['id'];
}else{
   redirect('received_orders.php');
}
if($order_id != 0){
  $get_orderDtl =  get($conn, 'tbl_assignments', "where id = '$order_id' && writer_id = '{$_SESSION['USER_ID']}'");

   if($get_orderDtl->num_rows == 0){
     redirect('received_orders.php');
   }else{
     $order = $get_orderDtl->fetch_assoc();

   }
}else{
     redirect('received_orders.php');
}

if(isset($_REQUEST['deliver'])){
    if($order['status']==1){
    $conn->query("update tbl_assignments set status = '2' where id = '{$_REQUEST['id']}'");
        $conn->query("update tbl_writers set balance = balance + '{$order['amount']}' where id = '{$_SESSION['USER_ID']}'");
    }
    redirect('received_order_dtl.php?id='.$_REQUEST['id']);
}

if(isset($_POST['uploadfile'])){
     $uploaddir = 'uploads/order_files/';
    $now = date('Y-m-d H:i:s');
    $timestamp = strtotime($now);
    $filename = $_REQUEST['id'].'_'.$timestamp.'_'.$_FILES['file_name']['name'];
    $uploadfile = $uploaddir . basename($filename);



    move_uploaded_file($_FILES['file_name']['tmp_name'], $uploadfile);
    $conn->query("insert into tbl_files set assignment_id = '{$_REQUEST['id']}', user_id = '{$_SESSION['USER_ID']}', user_type = '{$_SESSION['USER_TYPE']}', file_name = '$filename', date_time = '$now'");
    redirect('received_order_dtl.php?id='.$_REQUEST['id']);
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
                    <h2 class="mb-3 h1 t300">Order Detail</h2>
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
          <div class="col-md-8">
            <div class="contact-form-block">
              <div class="title">
                <h2>Order Details</h2>
              </div>
              <div class="text">

                  <p><b>Category : </b> <?php
                      $type_of_matter = get($conn, 'tbl_category', "where id = '{$order['cat_id']}'")->fetch_assoc();
                      echo $type_of_matter['name'];
                      ?></p>

                  <p><b>Title :</b> <?php echo $order['title']; ?></p>
                   <p><b>Deadline :</b> <?php echo $order['deadline']; ?></p>
                  <p><b>No of Pages : </b><?php echo $order['pages']; ?></p>
                  <p><b>No of Words : </b><?php echo $order['words']; ?></p>

              </div>


            </div>
          </div>
            <div class="col-md-4">
                  <div class="title">
                <!--<h3>Price : $<?php //echo $order['amount']; ?></h3>-->
              </div>
       <div class="title">
                <h3>Payment Status</h3>
             </div>
                <?php  $payment_check =  get($conn, 'tbl_payments', "where assignment_id = '$order_id'"); ?>
                 <p><b>Status :</b> <?php if($payment_check->num_rows==0){echo 'Panding';}elseif($payment_check->num_rows==1){echo 'Completed';} ?></p>

                <div class="title">
                <h3>Project Status</h3>
             </div>
                 <?php if($order['writer_id'] != 0){ ?>
                <p><b>Student Username :</b> <?php
                                                                 $userDetail = get($conn, 'tbl_users', "where id = '{$order['user_id']}'")->fetch_assoc();
                                                                echo $userDetail['username']; ?></p>


                <p><b>Delivery Date :</b> <?php echo $order['deadline']; ?></p>
                <?php } ?>
                <p><b>Status :</b> <?php if($order['status']==0){echo 'Panding';}elseif($order['status']==1){echo 'In Process';}elseif($order['status']==2){echo 'Completed';} ?></p>

                <?php if($order['status']==1){ ?>
                  <hr>
                <a href="?id=<?php echo $_REQUEST['id']; ?>&deliver=1" class="btn btn-success btn-xs" onclick="return confirm('Are you Sure U Are Delivered Order?')">Order Delivered?</a>
                <?php } ?>
          </div>

        <hr style="
        width: 100%;
    ">
            <div class="col-md-12" style="margin-top: 50px">
                 <div class="col-md-6">

            <div class="col-md-6">
                <div class="title">
                <h2>Chat</h2>
                </div>
            </div>
                     <div class="col-md-6">

            </div>
               <div class="col-md-12">
                  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <style>

        .container{max-width:1170px; margin:auto;}
    img{ max-width:100%;}
    .inbox_people {
      background: #f8f8f8 none repeat scroll 0 0;
      float: left;
      overflow: hidden;
      width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
      border: 1px solid #c4c4c4;
      clear: both;
      overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
      display: inline-block;
      text-align: right;
      width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
      color: #05728f;
      font-size: 21px;
      margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      padding: 0;
      color: #707070;
      font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
      float: left;
      width: 11%;
    }
    .chat_ib {
      float: left;
      padding: 0 0 0 15px;
      width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
      border-bottom: 1px solid #c4c4c4;
      margin: 0;
      padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
      display: inline-block;
      width: 6%;
    }
    .received_msg {
      display: inline-block;
      padding: 0 0 0 10px;
      vertical-align: top;
      width: 92%;
     }
     .received_withd_msg p {
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 3px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }
    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
      float: left;
      padding: 30px 15px 0 25px;
      width: 60%;
    }

     .sent_msg p {
      background: #05728f none repeat scroll 0 0;
      border-radius: 3px;
      font-size: 14px;
      margin: 0; color:#fff;
      padding: 5px 10px 5px 12px;
      width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
      float: right;
      width: 46%;
    }
    .input_msg_write input {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
      background: #05728f none repeat scroll 0 0;
      border: medium none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 17px;
      height: 33px;
      position: absolute;
      right: 0;
      top: 11px;
      width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
      height: 516px;
      overflow-y: auto;
    }
        </style>
    <div class="messaging">
          <div class="inbox_msg">
            <div class="mesgs" style="width: 100%">
                <script>
                    $(function () {
             setTimeout(AnmiteGoogle, 1000);

                    });
                    </script>
                <script type="text/javascript">
        $(document).ready(function(){
          refreshTable();
        });

        function refreshTable(){
            $('#msg_history').load('ajax_msg.php?order_id=<?php echo $order_id; ?>', function(){
               setTimeout(refreshTable, 1000);
                AnmiteGoogle();
            });
        }

            function AnmiteGoogle() {
             //$('#msg_history').animate({scrollTop: document.body.scrollHeight},"fast");
             document.getElementById('msg_history').scrollTop =  document.getElementById('msg_history').scrollHeight
            }
    </script>

    <script type="text/javascript">
    function submitData()
        {

       var data = $('#submit-form').serialize();

       $.ajax({

       type : 'POST',
       url  : '_ajax.php',
       data : data,
       beforeSend: function()
       {
        $("#btn-error").html('<div class="se-pre-con"></div>');
       },
       success :  function(response)
          {
         if(response=="success"){
         document.getElementById("input_msg").value = "";
          document.getElementById("input_msg").focus;

    setTimeout(AnmiteGoogle, 1000);
         }else{




         }
         }
       });
        return false;
      }

    </script>

              <div class="msg_history" id="msg_history">

              </div>
              <div class="type_msg">
                <div class="input_msg_write">
                    <form method="post" action="" id="submit-form" onsubmit="return submitData();">
                  <input type="text" name="msg" class="write_msg" id="input_msg" placeholder="Type a message" required />
                        <input type="hidden" name="add_msg" value="1" />
                        <input type="hidden" name="order_id" value="<?php echo $_REQUEST['id']; ?>" />
                  <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </form>
                </div>
              </div>
            </div>
          </div>



        </div></div>
            </div>

                <div class="col-md-6">
            <div class="col-md-6">
                <div class="title">
                <h2>Files</h2>
                </div>
            </div>
               <div class="col-md-6">
                     <?php if($order['status']==1){ ?>
                  <div style="display: none;">
    		  <form action="" method="post" id="fileup" enctype="multipart/form-data">
    		  <input type="file" name="file_name" id="log" onchange="SubmitForm();">
    		<input type="hidden" name="uploadfile" value="1">
    		  </form>
    		  </div>
                   <script>
    		  function SelFile(){
    			 document.getElementById("log").click();
    		  }
             function SubmitForm(){
                 document.getElementById('fileup').submit();
             }
    		  </script>
                <a class="btn btn-success pull-right" onclick="SelFile();">Upload File</a>
                   <?php } ?>
            </div>
             <div class="col-md-12">
                 <?php echo flash_msg(); ?>
            		<table id="example1" class="table table-bordered table-striped">
    						<thead>
    							<tr>
                                    <th width="20%">Date & Time</th>
    								<th width="20%">Username</th>
                                    <th width="50%">File Name</th>

    								<th width="10%">Action</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php
                              $file_list = get($conn, 'tbl_files', "where assignment_id = '$order_id'");
    							$i=0;


    							while ($row = $file_list->fetch_assoc()) {
                                    if($row['user_type']==0){
                                         $userDetail = get($conn, 'tbl_users', "where id = '{$row['user_id']}'")->fetch_assoc();
                                    }else{
                                         $userDetail = get($conn, 'tbl_writers', "where id = '{$row['user_id']}'")->fetch_assoc();
                                    }

    								$i++;
    								?>
    								<tr>
    									<td><?php echo $row['date_time']; ?></td>
                                        <td><?php echo $userDetail['username']; ?></td>
    									<td><?php echo $row['file_name']; ?></td>


    									<td><a href="<?php echo base_url(); ?>uploads/order_files/<?php echo $row['file_name']; ?>" class="btn btn-primary" download><i class="fa fa-download"></i> Download</a></td>

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
