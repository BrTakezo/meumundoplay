<?php

$jsondata = file_get_contents("./api/connv2.json");
$json = json_decode($jsondata, true);
$message = '<div class="has-sidebar-left has-sidebar-tabs"><div class="container-fluid relative animatedParent animateOnce p-lg-5"><div class="alert alert-success" id="flash-msg"><center><h4 style="color:white!important"><i class="icon fa fa-check"></i>Updated!</h4></center></div></div></div>';

if (isset($_POST['submit']))
{
    $jsonData = file_get_contents("./api/connv2.json");
    if ($_POST["ann_status"] == 'ACTIVE')
    {
        $success = '1';
    }
    else
    {
        $success = '0';
    }
    if (empty($_POST["announcement"]))
    {
        $announcement = '';
    }
    else
    {
        $announcement = $_POST["announcement"];
    }
    if (empty($_POST["ann_status"]))
    {
        $ann_status = 'INACTIVE';
    }
    else
    {
        $ann_status = $_POST["ann_status"];
    }
    if (empty($_POST["ann_expire"]))
    {
        $ann_expire = '';
    }
    else
    {
        $ann_expire = $_POST["ann_expire"];
    }
    if (empty($_POST["ann_interval"]))
    {
        $ann_interval = '';
    }
    else
    {
        $ann_interval = $_POST["ann_interval"];
    }
    if (empty($_POST["ann_disappear"]))
    {
        $ann_disappear = '';
    }
    else
    {
        $ann_disappear = $_POST["ann_disappear"];
    }
    $arrayData = json_decode($jsonData, true);
    $replacementData = array(
        'success' => $success,
        "announcement" => $announcement,
        "ann_status" => $ann_status,
        "ann_expire" => $ann_expire,
        "ann_interval" => $ann_interval,
        "ann_disappear" => $ann_disappear
    );
    $newArrayData = array_replace_recursive($arrayData, $replacementData);
    $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
    file_put_contents("./api/connv2.json", $newJsonData);
    header("Location: announcement.php?message=$message");
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
                            <h2><i class="icon icon-bullhorn"></i> In-app Announcement</h2>
                        </center>
                    </div>
                    
                    <div class="card-body">
                            <div class="col-12">
                                <h3> Edit Announcement</h3>
                            </div>
                            <form method="post">
                                <div class="form-group ">
                                    <label class="form-label" for="announcement">Announcement</label>
                                    <input class="form-control" id="announcement" name="announcement" value="<?=$json['announcement']?>" type="text">
                                </div>

                                <div class="form-group ">
                                    <label class="form-label" for="ann_status">Status</label>
                                    <select class="form-control" id="select" name="ann_status">
                                        <option value="INACTIVE" <?php echo $json['ann_status']=='INACTIVE'?'selected':'' ?> >INACTIVE</option>
                                        <option value="ACTIVE" <?php echo $json['ann_status']=='ACTIVE'?'selected':'' ?> >ACTIVE</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label class="form-label" for="datetimepicker">Expiration</label>
                                    <input type="text" class="form-control" autocomplete="false" name="ann_expire" data-toggle="datetimepicker" id="datetimepicker" value="<?=$json['ann_expire'] ?>">
                                </div>

                                <div class="form-group ">
                                    <label class="form-label" for="interval">Display for (mins)</label>
                                    <input type="text" class="form-control" id="interval" name="ann_interval" placeholder="0 min" value="<?=$json['ann_interval'] ?>">
                                </div>
                                  
                                <div class="form-group ">
                                    <label class="form-label" for="disappear">Disappear after(mins)</label>
                                    <input  type="text" class="form-control" id="disappear" name="ann_disappear" placeholder="0 min" value="<?=$json['ann_disappear'] ?>">
                                </div>

                                <hr>

                                <div class="form-group">
                                  <center>
                                      <button class="btn btn-info" name="submit" type="submit">
                                          <i class="icon icon-check"></i>Submit
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
    $('.datetimepicker').datetimepicker({
      //value:dateTime, 
      step:30,
      format:'Y-m-d H:i:s',
    });
</script>

</body>
</html>