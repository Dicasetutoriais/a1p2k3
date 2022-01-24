<?php

$jsondata = file_get_contents("./api/parent.json");
$json = json_decode($jsondata, true);
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Code Generated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/parent.json");



$arrayData = json_decode($jsonData, true);
	$replacementData = array(
	"code"		=> $_POST["code"], 
	"1"		    => $_POST["1"],
	"2"			=> $_POST["2"],
	"3"			=> $_POST["3"],
	"4"			=> $_POST["4"],
	"5"			=> $_POST["5"]);
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/parent.json", $newJsonData);
header("Location: parental_reset.php?message=$message");
		}

$input1 = $json['1'];
$input2 = $json['2'];
$input3 = $json['3'];
$input4 = $json['4'];
$input5 = $json['5'];
$num1 = ord($input1);
$num2 = ord($input2);
$num3 = ord($input3);
$num4 = ord($input4);
$num5 = ord($input5);
include ('includes/header.php');
?>

<div class="card-body">
    <div class="card  text-white">
                    <div class="card-header " style="">
                        <i class="fa fa-fw fa-lock "></i> Parental Password Reset</div>
                    <div class="card-body">
                        <div>
                        <div class="mr-6">
                            <form method="post">

                                <div class="form-group">
                                    <label class="control-label " >
                                        <h4 class="display-6"><strong> Enter Reset Code</strong></h4>
                                    </label>
                                    <div class="input-group col-md-4">
                                        <input class="inputs text-primary" id="1" name="1" placeholder="0" maxlength="1" size="1" value= "<?=$json['']?>" />
                                        <input class="inputs text-primary" id="2" name="2" placeholder="0" maxlength="1" size="1" value= "<?=$json['']?>"/>
                                        <input class="inputs text-primary" id="3" name="3" placeholder="0" maxlength="1" size="1" value= "<?=$json['']?>" />
                                        <input class="inputs text-primary" id="4" name="4" placeholder="0" maxlength="1" size="1" value= "<?=$json['']?>" />
                                        <input class="inputs text-primary" id="5" name="5" placeholder="0" maxlength="1" size="1" value= "<?=$json['']?>" />
                                        <br>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " name="submit" type="submit">
                                            <i class="fa fa-check"></i><strong> Generate Master Code</strong>
                                        </button>
                                    <div class="form-group ">
                                    <label class="control-label " for="code">
                                        <h4 class="display-6"><strong> Generated Reset Code</strong></h4>
                                    </label>
                                    <div class="input-group">
                                        <input class="text-primary" id="code" name="code" placeholder="Master Code" size="3" value="<?php echo $num1, $num5 ?>" type="text"/>
                                    </div>
                                    <div>
                                </div>

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
    $(".inputs").keyup(function() {
  if (this.value.length == this.maxLength) {
    $(this).nextAll('.inputs:enabled:first').focus();
  }
});
</script>

<?php include ('includes/footer.php');?>



