<?php 
include("inc/config.php");
include("inc/functions.php");
if(!isset($_SESSION['USER_ID'])){
redirect('login');
}
$array=array();
$rows=array();
if($_SESSION['USER_TYPE'] == 0){
    $get_assi  = $conn->query("select * from tbl_assignments where user_id = '{$_SESSION['USER_ID']}'");
}else{
    $get_assi  = $conn->query("select * from tbl_assignments where writer_id = '{$_SESSION['USER_ID']}'");
}
$count = 0;
while($rowq = $get_assi->fetch_assoc()){
    

$get_assi  = $conn->query("select * from tbl_assignments where user_id = ''");
$listnotif = $conn->query("select * from tbl_message where assignment_id = '{$rowq['id']}' && notify ='0' && user_id <> '{$_SESSION['USER_ID']}'");
$r = $listnotif->num_rows;
$count += $r;
while ($key = $listnotif->fetch_assoc()) {
	$data['title'] = 'MytutorPlug';
	$data['msg'] = $key['message'];
	$data['icon'] = 'https://mytutorplug.com/images/user-profile.png';
	$ass_id = $key['assignment_id'];
	$data['url'] = 'https://mytutorplug.com/view_order.php?id='.$ass_id;
	$rows[] = $data;
	// update notification database
    $conn->query("update tbl_message set notify = '1' where id = '{$key['id']}'");
}
}
$array['notif'] = $rows;
$array['count'] = $listnotif->num_rows;
$array['result'] = true;
echo json_encode($array);