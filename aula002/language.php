<?php 
$jsondata = file_get_contents("./api/main.json");
$data = json_decode($jsondata, true);
$json = $data['app'];
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/main.json");

$arrayData = json_decode($jsonData, true);
	$replacementData = array('app' =>  array(
	'language'		=>	$_POST["language"],
	'app_language'		=>	$_POST["app_language"]));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
file_put_contents("./api/main.json", $newJsonData);
header("Location: language.php?message=$message");
		}
include ('includes/header.php');
?>

 
<div class="card mt-3">
  <div class="card-header">
        <i class="fa fa-language"></i> Language Changes
           </div>
            <div class="card-body">
                
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5> Language Available</h5>
                        </div>
                        <div class="col-md-8 mx-auto">
                            <form method="post">
							<div class="form-group ">
                                    <label class="control-label requiredField" for="app_language" >
                                        <strong> Pick Your App Language</strong>
                                    </label>
                                    <select class="select form-control " id="select" name="app_language">
									    <option value="en"<?=$json['app_language']=='en'?'selected':'' ?>>English</option>
                                        <option value="ar" <?=$json['app_language']=='ar'?'selected':'' ?>>Arabic</option>
										<option value="bn" <?=$json['app_language']=='bn'?'selected':'' ?>>Bengali</option>
										<option value="zh" <?=$json['app_language']=='zh'?'selected':'' ?>>Chinese</option>
										<option value="fr" <?=$json['app_language']=='fr'?'selected':'' ?>>French</option>
                                        <option value="hi"<?=$json['app_language']=='hi'?'selected':'' ?>>Hindi</option>
                                        <option value="it" <?=$json['app_language']=='it'?'selected':'' ?>>Italian</option>
										<option value="ml" <?=$json['app_language']=='ml'?'selected':'' ?>>Malayalam</option>
										<option value="pt" <?=$json['app_language']=='pt'?'selected':'' ?>>Portugese</option>
										<option value="es" <?=$json['app_language']=='es'?'selected':'' ?>>Spanish</option>
                                        <option value="ru" <?=$json['app_language']=='ru'?'selected':'' ?>>Russian</option>
										<option value="sv" <?=$json['app_language']=='sv'?'selected':'' ?>>Spannish</option>
                                    </select>
									</div>
                                <div class="form-group">
                                    <div>
                                    </div>
                                    </div>
                            <form method="post">
							<div class="form-group ">
                                    <label class="control-label requiredField" for="language" >
                                        <strong> Pick Your Language</strong>
                                    </label>
                                    <select class="select form-control " id="select" name="language">
									    <option value="en"<?=$json['language']=='en'?'selected':'' ?>>English</option>
                                        <option value="ar" <?=$json['language']=='ar'?'selected':'' ?>>Arabic</option>
										<option value="bn" <?=$json['language']=='bn'?'selected':'' ?>>Bengali</option>
										<option value="zh" <?=$json['language']=='zh'?'selected':'' ?>>Chinese</option>
										<option value="fr" <?=$json['language']=='fr'?'selected':'' ?>>French</option>
                                        <option value="hi"<?=$json['language']=='hi'?'selected':'' ?>>Hindi</option>
                                        <option value="it" <?=$json['language']=='it'?'selected':'' ?>>Italian</option>
										<option value="ml" <?=$json['language']=='ml'?'selected':'' ?>>Malayalam</option>
										<option value="pt" <?=$json['language']=='pt'?'selected':'' ?>>Portugese</option>
										<option value="es" <?=$json['language']=='es'?'selected':'' ?>>Spanish</option>
                                        <option value="ru" <?=$json['language']=='ru'?'selected':'' ?>>Russian</option>
										<option value="sv" <?=$json['language']=='sv'?'selected':'' ?>>Spannish</option>
                                    </select>
									</div>
                                </form>
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
                                    
                                    
<script> 
$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow");
});
  </script>

<?php include ('includes/footer.php');?>
