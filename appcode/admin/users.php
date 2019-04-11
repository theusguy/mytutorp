<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Users</h1>
	</div>
	<div class="content-header-right">
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
								<th width="30">SL</th>
								<th width="100">Name</th>
                                <th width="100">Username</th>
								<th width="100">Email</th>
								<th width="100">Orders/Amount Spent</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$i=0;
							$statement = $conn->query("select * from tbl_users order by id desc");
						
													
							while ($row = $statement->fetch_assoc()) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php 
                                     $orders = $conn->query("select * from tbl_assignments where user_id = '{$row['id']}'")->num_rows;
                                     $amount = $conn->query("select SUM(amount) as amount from tbl_payments where user_id = '{$row['id']}'")->fetch_assoc();  
                               $am =  $amount['amount']+0;
                                        echo $orders."/".$am;
                                        ?></td>
									
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


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>