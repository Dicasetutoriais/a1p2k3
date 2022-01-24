<?php 
$jsondata = file_get_contents("./api/main.json");
$data = json_decode($jsondata, true);
$json = $data['app'];
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/main.json");

$arrayData = json_decode($jsonData, true);
	$replacementData = array('app' =>  array(
	'version_code'		=>	$_POST["version_code"],
	'apkurl'			=>	$_POST["apkurl"],
	'apkautoupdate'		=>	$_POST["apkautoupdate"]));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/main.json", $newJsonData);
header("Location: update.php?message=$message");
		}
include ('includes/header.php');
?>

<div class="content-wrapper">
    <div class="container pt-5">
      <?if(isset($_GET['message'])){echo $_GET['message'];}?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-calendar"></i> Push Update</div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5>Edit Update</h5>
                        </div>
                        <div class="col-md-8 mx-auto">
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="version_code">
                                        Current Version Number
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="description" name="version_code" value="<?=$json['version_code']?>" type="text"/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label requiredField" for="apkautoupdate" >
                                        APK Autoupdate
                                    </label>
                                    <select class="select form-control" id="select" name="apkautoupdate">
									    <option value="yes"<?=$json['apkautoupdate']=='yes'?'selected':'' ?>>Yes</option>
                                        <option value="no" <?=$json['apkautoupdate']=='no'?'selected':'' ?>>No</option>
                                    </select>

                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="apkurl">
                                        APK URL
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="apkurl" id="date" value="<?=$json['apkurl'] ?>">
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="apkurl">
                                        Backup URL
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="backupurl" id="date" value="<?=$json['backupurl'] ?>">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " name="submit" type="submit">
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
      <script> 
$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow");
});
  </script>
<?php include ('includes/footer.php');?>

