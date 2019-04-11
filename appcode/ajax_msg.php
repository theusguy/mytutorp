<?php 
include("inc/config.php");
include("inc/functions.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login');
}
if(isset($_REQUEST['order_id'])){ ?>
<?php 
                              $sql =   $conn->query("select * from tbl_message where assignment_id = '{$_REQUEST['order_id']}'"); 
                                while($row = $sql->fetch_assoc()){
$dte_time = $row['dte_time'];

                       
                    $curr_date=strtotime(date("Y-m-d H:i:s"));
                    $the_date=strtotime($dte_time);
                    $diff=floor(($curr_date-$the_date)/(60*60*24));
                    switch($diff)
                    {
                        case 0:
                           $show_date = "Today";
                            break;
                        case 1:
                           $show_date = "Yesterday";
                            break;
                        default:
                            $show_date =  date('M j', strtotime($dte_time));
                    }
                
                                    
?>

<?php if($_SESSION['USER_ID'] != $row['user_id']){ ?>
                                    
                                
        <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="images/user-profile.png" alt=""> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo $row['message']; ?></p>
                  <span class="time_date"> <?php echo date('h:i A', strtotime($dte_time)); ?>    |    <?php echo $show_date; ?></span></div>
              </div>
            </div>


<?php }else{ ?>


 <div class="outgoing_msg">
              <div class="sent_msg">
                <p><?php echo $row['message']; ?></p>
                <span class="time_date"> <?php echo date('h:i A', strtotime($dte_time)); ?>     |   <?php echo $show_date; ?></span> </div>
            </div>



<?php } ?>
<?php } ?>
         
<?php }
?>