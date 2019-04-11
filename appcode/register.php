<?php
include("headerlinks.php");
if(isset($_REQUEST['id'])){
    $link = $_REQUEST['id'];
    $check = $conn->query("select * from tbl_links where link='{$_REQUEST['id']}' and status = '0'");
    if($check->num_rows > 0){
        $feth = $check->fetch_assoc();
        $type = $feth['type'];
    }else{
        header("Location: index.php".$check->num_rows);
    }
}else{
    header("Location: index.php");
}
if(isset($_POST['name'])){

    $check_user_username = $conn->query("select * from tbl_users where username = '{$_POST['username']}'")->num_rows;
    $check_writer_username = $conn->query("select * from tbl_writers where username = '{$_POST['username']}'")->num_rows;
    $check_user_email = $conn->query("select * from tbl_users where email = '{$_POST['email']}'")->num_rows;
    $check_writer_email = $conn->query("select * from tbl_writers where email = '{$_POST['email']}'")->num_rows;

    if(($check_user_username > 0) || ($check_writer_username > 0)){
        $_SESSION['flash'] = '<div class="alert alert-danger">Username already Exist in Our System.</div>';
        redirect('register.php?id='.$link);
    }elseif(($check_user_email > 0) || ($check_writer_email > 0)){
        $_SESSION['flash'] = '<div class="alert alert-danger">Email already Exist in Our System.</div>';
        redirect('register.php?id='.$link);

    }else{

        $now = date('Y-d-m H:i:s');

        $data = array(
			'name' => $_POST['name'],
			'username' => $_POST['username'],
			'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'created_date' => $now,
		);
        if($type == 1){
            insert($conn, 'tbl_users', $data);
        }else{
            insert($conn, 'tbl_writers', $data);
        }
        $conn->query("update tbl_links set status = '1' where link = '{$_REQUEST['id']}'");


         $_SESSION['flash'] = '<div class="alert alert-success">You are Registered Successfully.</div>';
        redirect('login.php');

    }

}
?>

<div class="inner-banner-bg">
  <div class="container">
    <div class="text">Register</div>
  </div>
</div>
<!-- end page title -->

<!-- bread-crumb-area -->
<div class="bread-crumb-area">
  <div class="container">
    <div class="text"><a href="<?php echo base_url(); ?>">Home</a><i class="fa fa-angle-right"></i> Register </div>
  </div>
</div>
<!-- bread crumb end -->

<!-- contact-info-area -->

<section class="contact-info-area contact-page">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <div class="contact-form-block">
          <div class="title">
            <h2>Register</h2>
          </div>
          <div class="text">
            <p>Register Your Self to Make your Order or Become a Writer.</p>
          </div>

          <?php echo flash_msg(); ?>
          <form id="" action="" name="contact_form" class="default-form" method="post">
            <div class="row">

                <br>
                <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" name="name" class="form-control" value="" placeholder="Name" required>
              </div>
                 <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="text" name="username" class="form-control" value="" placeholder="Username" required>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="email" name="email" class="form-control" value="" placeholder="Email" required>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <input type="password" name="password" class="form-control" value="" placeholder="Password" required>
              </div>
            </div>
            <button type="submit" class="btn-one style-one radi" class="form-control">Register Now</button>
          </form>
        </div>
      </div>
        <div class="col-md-3">
      </div>
    </div>
  </div>
</section>
<!-- contact infe end -->
<?php include("footerlinks.php"); ?>
