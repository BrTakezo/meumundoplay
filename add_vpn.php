<?php 
    $db = new SQLite3('./api/vpn_config.db');

    if(isset($_POST['submit']))
    {
        $db->exec("INSERT INTO vpnconfig(userid, vpn_appid, vpn_country, vpn_state, vpn_config, vpn_status, auth_type, auth_embedded, username, password, vdate) VALUES('".$_POST['userid']."', '".$_POST['vpn_appid']."', '".$_POST['vpn_country']."', '".$_POST['vpn_state']."', '".$_POST['vpn_config']."', '".$_POST['vpn_status']."', '".$_POST['auth_type']."', '".$_POST['auth_embedded']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['vdate']."')");
        header("Location: vpn_config.php");
    }

    include ('includes/header.php');
?>

<div class="has-sidebar-left has-sidebar-tabs">
    <div class="container-fluid relative animatedParent animateOnce p-lg-5">
        <div class="col-md-8 mx-auto">
            <div class="card-body">
                <div class="card bg-primary text-white">
                    <div class="card-header card-header-warning">
                        <center>
                            <h2><i class="icon icon-map-marker"></i> Add VPN</h2>
                        </center>
                    </div>

                    <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label class="form-label " for="userid" hidden>User ID</label>
                                    <input class="form-control" id="userid" name="userid" value='521064' type="text" hidden/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="vpn_appid" hidden>App ID</label>
                                    <input class="form-control" id="vpn_appid" name="vpn_appid" value='1646' type="text" hidden/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="vpn_country">Country Code</label>
                                    <input class="form-control" id="vpn_country" name="vpn_country" type="text"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="vpn_state">State</label>
                                    <input class="form-control" id="vpn_state" name="vpn_state" type="text"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="vpn_config">OVPN Url</label>
                                    <input class="form-control" id="vpn_config" name="vpn_config" type="url"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="vpn_status">Status</label>
                                    <select class="select form-control" id="select" name="vpn_status">
                                        <option value="ACTIVE">ACTIVE</option>
                                        <option value="INACTIVE">INACTIVE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="auth_type">Auth Type</label>
                                    <select class="select form-control" id="select" name="auth_type">
                                        <option value="up">Username and Password</option>
                                        <option value="noup">No Username and Password</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="auth_embedded" hidden>Auth Embedded</label>
                                    <select class="select form-control" id="select" name="auth_embedded" hidden>
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="username">username</label>
                                        <input class="form-control" id="username" name="username" type="text"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label " for="password">Password</label>
                                    <input class="form-control" id="password" name="password" type="text"/>
                                </div>
                                <div class="form-group ">
                                    <label class="form-label" for="vdate">Date</label>
                                    <input type="text" class="form-control" autocomplete="false" name="vdate" id="datetimepicker"> 
                                </div>

                                <div class="form-group">
                                    <center>
                                        <button class="btn btn-info " name="submit" type="submit">
                                            <i class="icon icon-check"></i> Submit
                                        </button>
                                    </center>
                                </div>
                            </form>
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