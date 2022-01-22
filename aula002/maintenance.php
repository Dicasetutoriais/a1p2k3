<?php 
$jsondata = file_get_contents("./api/maint.json");
$json = json_decode($jsondata, true);
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/maint.json");

if ($_POST["status"] == 'ACTIVE'){
	$success = '1';
}else{
	$success = '0';
}

$arrayData = json_decode($jsonData, true);
	$replacementData = array(
	'success'			=>	$success,
	'message'			=>	$_POST["message"],
	'status'			=>	$_POST["status"],
	'expire'			=>	$_POST["expire"]);
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/maint.json", $newJsonData);
header("Location: maintenance.php?message=$message");
		}
include ('includes/header.php');
?>

<div class="content-wrapper">
    <div class="container pt-3">
      <?if(isset($_GET['message'])){echo $_GET['message'];}?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-calendar"></i> Maintenance</div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5>Edit Maintenance Message</h5>
                        </div>
                        <div class="col-md-8 mx-auto">
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="message">
                                        Maintenance Message *
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="description" name="message" value="<?=$json['message']?>" type="text"/>
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label class="control-label requiredField" for="status" >
                                        Status *
                                    </label>
                                    <select class="select form-control" id="select" name="status">
									    <option value="INACTIVE"<?=$json['status']=='INACTIVE'?'selected':'' ?>>INACTIVE</option>
                                        <option value="ACTIVE" <?=$json['status']=='ACTIVE'?'selected':'' ?>>ACTIVE</option>
                                    </select>

                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="message">
                                        Expiration (2018-06-17 23:30:10): *
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="expire" id="datetimepicker" value="<?=$json['expire'] ?>">
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
