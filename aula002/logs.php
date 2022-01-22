<?php 

	include ('includes/header.php');
	$db = new SQLite3('IP_SPY/ip_spy.db');
    $logs= $db->query("SELECT * FROM logs order by id DESC");
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="card text-black">
                    <div class="card-header">
                        <center>
                            <h2><i class="fa fa-user-secret"></i>IP-Spy</h2>
                        </center>
                    </div>

                    <div class="card-body">
                        
    					<hr>

					 <div class="table-responsive mb-4 mt-4">
                        <table class="multi-table table table-hover" style="width:100%">
							<thead style="color:black">
								<tr>
								<th>Index</th>
								<th>Details</th>
								<th>IP</th>
								<th>Date</th>
								
								</tr>
							</thead>
								<tbody>
							<? 
							$i=1;
							while ($row = $logs->fetchArray()) {?>
						
								<tr>
								<td><?= $i++ ?></td>
								<td><?=$row['device'] ?></td>
								<td><?=$row['ip'] ?></td>
								<td><?=$row['date'] ?></td>
						
							<? }?>
									
							</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
	    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
</script>
<?php include ('includes/footer.php');?>


