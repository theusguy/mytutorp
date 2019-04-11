<?php 
include("inc/config.php");
include("inc/functions.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login');
}

if(isset($_POST['add_msg'])){
    $user_id = $_SESSION['USER_ID'];
    $user_type = $_SESSION['USER_TYPE'];
    $msg = $_POST['msg'];
    $date = date('Y-m-d H:i:s');
    $assignment_id = $_POST['order_id'];
    $conn->query("insert into tbl_message set user_id = '$user_id', user_type = '$user_type', assignment_id = '$assignment_id', dte_time = '$date', message = '$msg'");
    echo 'success';
}
?>