<?php require_once('header.php'); ?>

<?php
if(isset($_POST['form1'])) {

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 64; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$link = randomPassword();

    
    	
		// Saving data into the main table tbl_category
		$conn->query("INSERT INTO tbl_links set link = '$link', type = '{$_POST['type']}'");
	
         set_flash('success', 'https://mytutorplug.com/register.php?id='.$link, 'links.php');
    
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Add Link</h1>
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
							<label for="" class="col-sm-2 control-label">For <span>*</span></label>
							<div class="col-sm-4">
								<select class="form-control" name="type">
								    <option value='2'>Tutor</option>
								    <option value='1'>Student</option>
								    </select>
							</div>
						</div>
					
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Generate</button>
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
								<th width="100">Link</th>
                                <th width="100">Type</th>
								<th width="100">Status</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$i=0;
							$statement = $conn->query("select * from tbl_links order by id desc");
						
													
							while ($row = $statement->fetch_assoc()) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td>https://mytutorplug.com/register.php?id=<?php echo $row['link']; ?></td>
									<td><?php if($row['type']==1){echo 'Student';}else{echo 'Teacher';} ?></td>
									<td><?php if($row['status']==0){echo 'Available';}else{echo 'Used';} ?></td>
									
									
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