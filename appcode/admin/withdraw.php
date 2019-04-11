<?php require_once('header.php');
if(isset($_REQUEST['approve'])){
    $conn->query("update tbl_withdraw set status = '1' where id = '{$_REQUEST['approve']}'");
    redirect('withdraw.php');
}


?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Writers</h1>
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
								<th width="100">Writer Username</th>
                                <th width="100">Account</th>
								<th width="100">Amount</th>
								<th width="100">Date</th>
								<th width="20">Action</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$i=0;
							$statement = $conn->query("select * from tbl_withdraw order by id desc");
						
													
							while ($row = $statement->fetch_assoc()) {
								$i++;
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php  $writer= $conn->query("select * from tbl_writers where id = '{$row['writer_id']}'")->fetch_assoc();
                                echo $writer['username']; ?></td>
									<td><?php echo $row['account']; ?></td>
									<td>$ <?php echo $row['amount']; ?></td>
                                    <td><?php echo $row['created_date']; ?></td>
									
                                    <td><?php if($row['status']==0){ ?>
                                        <a href="?approve=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Approve</a>
                                    <?php }else{
                                    echo 'Completed';
                                } ?>
                                    </td>
									
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