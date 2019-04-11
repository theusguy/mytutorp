<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Categories</h1>
	</div>
	<div class="content-header-right">
		<a href="category-add.php" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
			        <th style="width:10%">SL</th>
			        <th style="width:80%">Category Name</th>
			        <th style="width:10%">Action</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$result = $conn->query("SELECT * FROM tbl_category ORDER BY id ASC");
            							
            	while ($row = $result->fetch_assoc()) {
            		$i++;
            		?>
					<tr>
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $row['name']; ?></td>
	                    <td>
	                        <a href="category-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Edit</a>
	                    </td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  
      </div></div>
</section>




<?php require_once('footer.php'); ?>