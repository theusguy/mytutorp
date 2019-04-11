<?php require_once('header.php'); 
if(isset($_REQUEST['submit'])){
    $conn->query("update tbl_assignments set writer_id = '{$_POST['writer_id']}', status = '1' where id = '{$_REQUEST['assignment_id']}'");
    redirect('orders.php?assignment_id='.$_REQUEST['assignment_id']);
}




?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Orders</h1>
	</div>
	
</section>

<section class="content">
	<div class="row">
        <div class="col-md-12">
		<div class="col-md-12">
            <?php if(isset($_REQUEST['assignment_id'])){
           $order_id =  $_REQUEST['assignment_id'];
            
            if($order_id != 0){
  $get_orderDtl =  get($conn, 'tbl_assignments', "where id = '$order_id'");
   
   if($get_orderDtl->num_rows == 0){
     redirect('orders.php');
   }else{
     $order = $get_orderDtl->fetch_assoc();
      
   }
}else{
     redirect('orders.php');
}
            ?>
            
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
            <?php if($_SESSION['ADMIN_ID']==1){ ?>
              <div class="title">
            <h3>Price : $<?php echo $order['amount']; ?></h3>
          </div>
          
   <div class="title">
            <h3>Payment Status</h3>
         </div>
            <?php  $payment_check =  get($conn, 'tbl_payments', "where assignment_id = '$order_id'"); ?>
             <p><b>Status :</b> <?php if($payment_check->num_rows==0){echo 'Panding';}elseif($payment_check->num_rows==1){echo 'Completed';} ?></p>
          <?php } ?>
           <?php if($payment_check->num_rows == 1){
               $payment = $payment_check->fetch_assoc();
                ?>
                <p><b>Payment Method :</b> <?php echo $payment['payment_method']; ?></p>
                <?php }?>
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
          
            <?php if($order['status']==0){ ?>
              <hr>
         <form action="" method="post">
             Assign a Writer :
            <div class="form-group has-feedback">
                <select class="form-control" name="writer_id">
                
                <?php $sql = get($conn, 'tbl_writers');
                    while($rowss = $sql->fetch_assoc()){ ?>
                    ?>
                
                    <option value="<?php echo $rowss['id']; ?>"><?php echo $rowss['username']; ?> - <?php echo $rowss['email']; ?></option>
                    
                    
                    <?php } ?>
                </select>
			</div>
            <div class="form-group has-feedback">
				<input type="submit" class="btn btn-primary btn-block btn-flat login-button" name="submit" value="Assign Now">
			</div>
            
            </form>
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
               <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        $('#msg_history').load('../ajax_msg.php?order_id=<?php echo $order_id; ?>', function(){
           setTimeout(refreshTable, 1000);
            AnmiteGoogle();
        });
    }
                
        function AnmiteGoogle() {
         //$('#msg_history').animate({scrollTop: document.body.scrollHeight},"fast");
         document.getElementById('msg_history').scrollTop =  document.getElementById('msg_history').scrollHeight
        }
</script>
            

          <div class="msg_history" id="msg_history">
    
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
            
            <?php }else{ ?>
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">SL</th>
								<th width="50">Username</th>
								<th width="50">Writer</th>
								<th width="130">Order Details</th>
								<th width="100">Submitted Date</th>
								<?php if($_SESSION['ADMIN_ID']==1){ ?>
                                <th width="40">Total Amount</th>
                                <?php } ?>
                                <th width="40">Status</th>
								<th width="40">Action</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$i=0;
							$statement = $conn->query("select * from tbl_assignments order by id desc");
						
													
							while ($row = $statement->fetch_assoc()) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php 
                                        $user = $conn->query("select * from tbl_users where id = '{$row['user_id']}'")->fetch_assoc();
                                echo $user['username'];
                                        ?></td>
									<td><?php 
                                if($row['writer_id'] != 0){
                                    $writer= $conn->query("select * from tbl_writers where id = '{$row['writer_id']}'")->fetch_assoc();
                                echo $writer['username'];
                                }
                                        
                                        ?></td>
									<td>Category : <?php 
                                $cat = $conn->query("select * from tbl_category where id = '{$row['cat_id']}'")->fetch_assoc();
                                 echo $cat['name']; ?><br>
                                        Title : <?php echo $row['title']; ?><br>
                                   Pages :  <?php echo $row['pages']; ?> / Words : <?php echo $row['words']; ?><br>
                                        Deadline : <?php echo $row['deadline']; ?>
                                    
                                    
                                    </td>
									<td><?php echo $row['created_date']; ?></td>
									<?php if($_SESSION['ADMIN_ID']==1){ ?>
									
                                    <td>$ <?php echo $row['amount']; ?></td>
                                    
                                    <?php } ?>
									<td><?php if($row['status']==0){echo 'Panding';}elseif($row['status']==1){echo 'In Process';}else{echo 'Completed';} ?></td>
                                    <td><a class="btn btn-primary btn-sm"  href="?assignment_id=<?php echo $row['id']; ?>" >View Details</a></td>
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
            <?php } ?>
		</div>
            </div>
	</div>


</section>


<?php require_once('footer.php'); ?>