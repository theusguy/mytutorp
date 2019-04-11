<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$admins = $conn->query("select * from tbl_admin where email = '$email'")->num_rows;

    if($admins > 0){
          set_flash('error', 'Email already Found.', 'admins.php');
    }else{
        	$conn->query("INSERT INTO tbl_admin set name = '$name', email = '{$_POST['email']}', password = '{$_POST['password']}'");
	
         set_flash('success', 'Admin added Done.', 'admins.php');
    }
    	
		// Saving data into the main table tbl_category
	
    
}


if(isset($_REQUEST['del_id'])){
    if($_REQUEST['del_id'] > 1){
        $conn->query("DELETE from tbl_admin where id = '{$_REQUEST['del_id']}'");
         set_flash('success', 'Admin Deleted Done.', 'admins.php');
    }else{
          set_flash('error', 'Super Admin not be able to delete.', 'admins.php');
    }
     
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Admin</h1>
	</div>
	
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

<?php echo flash_msg(); ?>

			<form class="form-horizontal" action="" method="post">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span>*</span></label>
							<div class="col-sm-4">
								<input class="form-control" name="name" type="text"/>
							</div>
						</div>
					<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email <span>*</span></label>
							<div class="col-sm-4">
								<input class="form-control" name="email" type="text"/>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password <span>*</span></label>
							<div class="col-sm-4">
								<input class="form-control" name="password" type="password"/>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="30">SL</th>
								<th width="100">Name</th>
                                <th width="100">Email</th>
								<th width="100">Action</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$i=0;
							$statement = $conn->query("select * from tbl_admin where id <> 1 order by id desc");
						
													
							while ($row = $statement->fetch_assoc()) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><a href="?del_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" >Delete</a></td>
									
									
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
</section>

<?php require_once('footer.php'); ?>