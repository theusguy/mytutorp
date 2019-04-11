<?php

// Flash Message
function flash_msg() {
	if( isset($_SESSION['flash']) ) {
		
		$msg = $_SESSION['flash'];
		unset($_SESSION['flash']);

		return $msg;
	}
}

function set_flash($style = '', $msg = '', $page = ''){
    if($style == 'error'){
        $msg = '<div class="alert alert-danger">'.$msg.'</div>';
    }else{
         $msg = '<div class="alert alert-success">'.$msg.'</div>';
    }
    $_SESSION['flash'] = $msg;
    header("Location: ".$page);
    exit();
}

function redirect($redirect = ''){
    header("Location: ".$redirect);
    exit();
}
function base_url(){
    return "https://www.mytutorplug.com/";
}

function insert($conn, $table, array $data){
    $val = '';
    foreach ($data as $key=>$value){
       $val .= $key." = '".$value."', ";
    }
    $data = rtrim($val, ', ');
    $conn->query("INSERT INTO `{$table}` SET {$data}");
}

function update($conn, $table, array $data, $where = NULL){
    $val = '';
    foreach ($data as $key=>$value){
       $val .= $key." = '".$value."', ";
    }
    $data = rtrim($val, ', ');
    $conn->query("UPDATE `{$table}` SET {$data} {$where}");
}
function get($conn, $table, $where = NULL){
   
   $query =  $conn->query("SELECT * FROM `{$table}` {$where}");
    return $query;
}