<?php 
	$db = new SQLite3('./api/vpn_config.db');
	$db->exec("CREATE TABLE IF NOT EXISTS vpnconfig(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, userid text, vpn_appid TEXT, vpn_country TEXT, vpn_state TEXT, vpn_config VARCHAR(150), vpn_status TEXT, auth_type TEXT, auth_embedded TEXT, username VARCHAR(150), password VARCHAR(150), vdate TEXT)");
	$res = $db->query('SELECT * FROM vpnconfig');

	if(isset($_GET['delete']))
	{
		$db->exec("DELETE FROM vpnconfig WHERE id=".$_GET['delete']);
		header("Location: vpn_config.php");
	}
	include ('includes/header.php');
?>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Confirm</h2>
            </div>
            <div class="modal-body">
                Do you really want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="col-lg mx-auto">
            <div class="card-body">
                <div class="card bg-primary text-white">
                    <div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-map-marker"></i> In-app VPNs</h2>
                        </center>
                    </div>

                    <div class="card-body">
                        <div class="col-12">
                        	<center>
	        					<a id="button" href="./add_vpn.php" class="btn btn-info">New VPN</a>
	        				</center>
    					</div>

    					<hr>

						<div class="table-responsive">
							<table class="table table-striped table-sm">
							<thead style="color:white!important">
								<tr>
								<th>Index</th>
								<th>Country</th>
								<th>State</th>
								<th>OVPN Url</th>
								<th>Status</th>
								<th>Auth Type</th>
								<th>Username</th>
								<th>Password</th>
								<th>Date</th>
								</tr>
							</thead>
							<? while ($row = $res->fetchArray()) {?>
							<tbody>
								<tr>
								<td><?=$row['id'] ?></td>
								<td><?=$row['vpn_country'] ?></td>
								<td><?=$row['vpn_state'] ?></td>
								<td><?=$row['vpn_config'] ?></td>
								<td><?=$row['vpn_status'] ?></td>
								<td><?=$row['auth_type'] ?></td>
								<td><?=$row['username'] ?></td>
								<td><?=$row['password'] ?></td>
								<td><?=$row['vdate'] ?></td>
								<td><a class="btn btn-danger btn-ok" href="#" data-href="./vpn_config.php?delete=<?=$row['id'] ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-fw fa-chart-area"></i>X</a></td>
								</tr>
							</tbody>
							<? }?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include ('includes/footer.php');?>

<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
	    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});
</script>

</body>
</html>