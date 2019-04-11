<?php 
include("inc/config.php");
include("inc/functions.php");


  $pp_account = 'theusguy@gmail.com';
           $pp_currency = 'USD';
        $req = "cmd=_notify-validate";
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&" . $key . "=" . $value;
}

$test = "no";

if ($test == "yes") {
	$url = "https://ipnpb.sandbox.paypal.com/cgi-bin/webscr";
}
else {
	$url = "https://ipnpb.paypal.com/cgi-bin/webscr";
}

$item_name = $_POST['item_name'];
$order_id = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$batch = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$customer = $_POST['payer_email'];
$t = $url . "?" . $req;

file_put_contents("lidn.txt",$t);
$res = file_get_contents($t);
if (strcmp(trim($res), "VERIFIED") == 0) {

	if ($payment_status != "Completed") {
	     
		exit();
	}


	if ($payment_currency != $pp_currency) {
	   
		exit();
	}


	    $now = date("Y-m-d H:i:s");
       
  $orderDtl = $conn->query("select * from tbl_assignments WHERE id = '$order_id'");
    $orderDtl = $orderDtl->fetch_assoc();
    $orderDtl = $orderDtl['user_id'];
       
        
        $conn->query("insert into tbl_payments set assignment_id = '$order_id', user_id = '$orderDtl', payment_method = 'Paypal', transection_id = '$batch', amount = '$amount', created_date = '$now'");
         
}
?>