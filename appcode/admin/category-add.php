<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {
	$valid = 1;

    if(empty($_POST['category_name'])) {
        $valid = 0;
           set_flash('error', 'Category Name can not be empty<br>', 'category-add.php');
    } else {
    	// Duplicate Category checking
    	$statement = $conn->query("SELECT * FROM tbl_category WHERE name='{$_POST['category_name']}'")->num_rows;
   
    	if($statement > 0)
    	{
    		$valid = 0;
       
             set_flash('error', 'Category Name already exists<br>', 'category-add.php');
    	}
    }

    if($valid == 1) {



    
    	
		// Saving data into the main table tbl_category
		$conn->query("INSERT INTO tbl_category (name) VALUES ('{$_POST['category_name']}')");
	
         set_flash('success', 'Category is added successfully.', 'category-add.php');
    }
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Category</h1>
	</div>
	<div class="content-header-right">
		<a href="category.php" class="btn btn-primary btn-sm">View All</a>
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
							<label for="" class="col-sm-2 control-label">Category Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="category_name" placeholder="Example: Health Tips">
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

</section>

<?php require_once('footer.php'); ?>