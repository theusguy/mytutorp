<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Payments</h1>
	</div>
	<div class="content-header-right">
		<!--<a href="testimonial-add.php" class="btn btn-primary btn-sm">Add Testimonial</a>-->
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
								<th  width="100">Date & Time</th>
								<th width="100">User - Assignment ID</th>
								<th width="100">Amount</th>
                                <th width="100">Method</th>
								<th width="100">Transection ID</th>
								
							</tr>
						</thead>
					
						<tbody>
							<?php
							$i=0;
							$statement = $conn->query("select * from tbl_payments order by id desc");
						
													
							while ($row = $statement->fetch_assoc()) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
                                    <td><?php echo $row['created_date']; ?></td>
									<td><?php 
                                        $user = $conn->query("select * from tbl_users where id = '{$row['user_id']}'")->fetch_assoc();
                                echo $user['username'];
                                        ?> / <?php echo $row['assignment_id']; ?></td>
									<td>$ <?php echo $row['amount']; ?></td>
									<td><?php echo $row['payment_method']; ?></td>
									<td><?php echo $row['transection_id']; ?></td>
                                 
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