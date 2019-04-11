<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['category_name'])) {
        $valid = 0;
        
           set_flash('error', 'Category Name can not be empty', 'category-edit.php?id='.$_REQUEST['id']);
    } else {
		// Duplicate Category checking
    	// current category name that is in the database
    	$row  = $conn->query("SELECT * FROM tbl_category WHERE id='{$_REQUEST['id']}'")->fetch_assoc();
		
	
			$current_category_name = $row['name'];
		

		$total = $conn->query("SELECT * FROM tbl_category WHERE name='{$_POST['category_name']}' and name!='$current_category_name'")->num_rows;
    							
    	if($total > 0) {
    		$valid = 0;
            set_flash('error', 'Category name already exists', 'category-edit.php?id='.$_REQUEST['id']);
    	}
    }

    if($valid == 1) {

    	
		// updating into the database
		$conn->query("UPDATE tbl_category SET name='{$_POST['category_name']}' WHERE id='{$_REQUEST['id']}'");
		

        
            set_flash('success', 'Category is updated successfully.', 'category-edit.php?id='.$_REQUEST['id']);
    }
}
?>

<?php
if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $conn->query("SELECT * FROM tbl_category WHERE id='{$_REQUEST['id']}'");
	
	$total = $statement->num_rows;
	
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Category</h1>
	</div>
	<div class="content-header-right">
		<a href="category.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<?php							
while ($row = $statement->fetch_assoc()) {
	$category_name = $row['name'];
}
?>

<section class="content">

  <div class="row">
    <div class="col-md-12">

		<?php echo flash_msg(); ?>

        <form class="form-horizontal" action="" method="post">

        <div class="box box-info">

            <div class="box-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Category Name <span>*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="category_name" value="<?php echo $category_name; ?>">
                    </div>
                </div>
               
                <div class="form-group">
                	<label for="" class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
                    </div>
                </div>

            </div>

        </div>

        </form>



    </div>
  </div>

</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>