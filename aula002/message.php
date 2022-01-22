<?php 
$jsondata = file_get_contents("./api/connv2.json");
$json = json_decode($jsondata, true);
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/connv2.json");



$arrayData = json_decode($jsonData, true);
	$replacementData = array(
	'message'			=>	$_POST["message"],
	'msg_status'			=>	$_POST["msg_status"],
	'msg_expire'			=>	$_POST["msg_expire"],
	'msgid'             =>  $_POST['msgid']);
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
file_put_contents("./api/connv2.json", $newJsonData);
header("Location: message.php?message=$message");
		}
include ('includes/header.php');
?>

<div class="card-body">
<div class="card bg-black text-white">
          <div class="card-header">
                <center><i class="fa fa-commenting"></i><h2> Messages And Notifications</h2></center></div>
            <div class="card-body">
                <div class="alert alert-black" role="alert">
                    <div class="row">
                        <div class="col-12">
                            <h3>Create Message</h3>
                        </div>
                        <div class="col-md-8">
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="message">
                                        <strong> Maintenance Message</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control text-muted" id="description" name="message" value="<?=$json['message']?>" type="text"/>
                                    </div>

                                </div>

                                <form method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="msgid">
                                        <strong> Message ID</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control text-muted" id="description" name="msgid" value="<?=$json['msgid']?>" type="text"/>
                                    </div>
                                    </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="msg_status" >
                                        <strong> Status</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="msg_status">
									    <option value="INACTIVE"<?=$json['msg_status']=='INACTIVE'?'selected':'' ?>>INACTIVE</option>
                                        <option value="ACTIVE" <?=$json['msg_status']=='ACTIVE'?'selected':'' ?>>ACTIVE</option>
                                    </select>

                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="message">
                                        <strong> Expiration</strong> &emsp;       (YYYY/MM/DD - HH:MM:SS)
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control text-muted" name="msg_expire" id="datetimepicker" value="<?=$json['msg_expire'] ?>">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary" name="submit" type="submit">
                                            <i class="fa fa-check"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php include ('includes/footer.php');?>
  <script> 
$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow");
});
  </script>
</body>

</html>