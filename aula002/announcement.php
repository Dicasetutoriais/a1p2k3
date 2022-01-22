<?php 
$jsondata = file_get_contents("./api/connv2.json");
$json = json_decode($jsondata, true);
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/connv2.json");

if ($_POST["status"] == 'ACTIVE'){
	$success = '1';
}else{
	$success = '0';
}

$arrayData = json_decode($jsonData, true);
	$replacementData = array(
	'success'			=>	$success,
	"announcement"		=> $_POST["announcement"],
	"status"			=> $_POST["status"],
	"channel"			=> $_POST["channel"],
	"expire"			=> $_POST["expire"],
	"interval"			=> $_POST["interval"],
	"disappear"			=> $_POST["disappear"]);
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/connv2.json", $newJsonData);
header("Location: announcement.php?message=$message");
		}
include ('includes/header.php');
?>

<div class="content-wrapper">
    <div class="container pt-3">
	<?if(isset($_GET['message'])){echo $_GET['message'];}?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bell"></i> Announcement</div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5>Edit Announcement </h5>
                        </div>
                        <div class="col-md-8 mx-auto">
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="announcement">
                                        Announcement:*
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="announcement" name="announcement" value="<?=$json['announcement']?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="select">
                                        Status *
                                    </label>
                                    <select class="select form-control" id="select" name="status">
									    <option value="INACTIVE"<?=$json['status']=='INACTIVE'?'selected':'' ?>>INACTIVE</option>
                                        <option value="ACTIVE" <?=$json['status']=='ACTIVE'?'selected':'' ?>>ACTIVE</option>
                                    </select>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="channel">
                                        Channel: * (ALL or the exact channel name)
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="channel" name="channel" value="<?=$json['channel']?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="date">
                                        Expiration (2018-06-17 23:30:10):
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="expire" placeholder="YYYY-MM-DD" id="datetimepicker" value="<?=$json['expire']?>">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="interval">
                                        Display Interval (Minute):*
                                    </label>
                                    <div class="input-group">

                                        <input class="form-control" id="interval" name="interval" placeholder="0 min" value="<?=$json['interval']?>"type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="disappear">
                                        Disappear (Minute):*
                                    <div class="input-group">
                                        <input class="form-control" id="disappear" name="disappear" placeholder="0 min" value="<?=$json['disappear']?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button id="submit_btn" class="btn btn-primary" name="submit" type="submit">
                                            <i class="fa fa-check"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

<?php include ('includes/footer.php');?>

