<?php 
$jsondata = file_get_contents("./api/main.json");
$data = json_decode($jsondata, true);
$json = $data['app'];
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/main.json");  
$arrayData = json_decode($jsonData, true);
$replacementData = array('app' => array(
        "login_type"       	   =>	$_POST["login_type"],
		"btn_pr"          	   =>	$_POST["btn_pr"],
		"btn_rec"              =>	$_POST["btn_rec"],
        "btn_vpn"              =>	$_POST["btn_vpn"],
        "btn_noti"             =>	$_POST["btn_noti"],
        "btn_update"           =>	$_POST["btn_update"],
		"show_expire"      	   =>	$_POST["show_expire"]));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
file_put_contents("./api/main.json", $newJsonData);
header("Location: extra.php?message=$message");
		}
$jsondata = file_get_contents("./api/main.json");
$data = json_decode($jsondata, true);
$json = $data['app'];
if(isset($_POST['submit_support'])){
$jsonData = file_get_contents("./api/main.json");  
$arrayData = json_decode($jsonData, true);
$replacementData = array('app' => array(
		"show_cat_count"       =>	$_POST["show_cat_count"],
		"load_last_channel"    =>	$_POST["load_last_channel"],
        "login_logo"           =>	$_POST["login_logo"],
		"logs"    		       =>	$_POST["logs"],
		"all_cat"              =>	$_POST["all_cat"],
		"btn_login_settings"   =>	$_POST["btn_login_settings"],
        "agent"                =>	$_POST["agent"]));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
file_put_contents("./api/main.json", $newJsonData);
header("Location: extra.php?message=$message");
		}
		 
include ('includes/header.php');	
?>


            <div class="container pt-4 pb-5">
            <div class="row">
                <div class="col-md-6 col-12">

            <div class="card">
              <div class="card-header">
                  <i class="fa fa-sliders"></i> Extra Options</div>
            <div class="card-body">
                    
                        
                         <form method="post">
                                <div class="form ">
                                    <label class="control-label " for="select_filter_status">
                                    </label>
                                  </div>
					                <div class="form-group ">
                                    <label class="control-label requiredField" for="login_type" >
                                        <strong> Login Type</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="login_type">
									    <option value="login"<?=$json['login_type']=='login'?'selected':'' ?>>User / Pass</option>
                                        <option value="mac" <?=$json['login_type']=='mac'?'selected':'' ?>>Mac Address</option>
                                        <option value="activation" <?=$json['login_type']=='activation'?'selected':'' ?>>Activation Code</option>
									</select>                                </div>
									<div class="form-group ">
                                    <label class="control-label requiredField" for="btn_pr" >
                                        <strong> Show Reminder Button</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="btn_pr">
									    <option value="yes"<?=$json['btn_pr']=='yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['btn_pr']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					 <form method="post">
									<div class="form-group ">
                                    <label class="control-label requiredField" for="btn_rec" >
                                        <strong> Show Record Button</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="btn_rec">
									    <option value="Yes"<?=$json['btn_rec']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['btn_rec']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					 <form method="post">
									<div class="form-group ">
                                    <label class="control-label requiredField" for="btn_vpn" >
                                        <strong> Show Vpn Button</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="btn_vpn">
									    <option value="Yes"<?=$json['btn_vpn']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['btn_vpn']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					<form method="post">
									<div class="form-group ">
                                    <label class="control-label requiredField" for="btn_noti" >
                                        <strong> Show Message Button</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="btn_noti">
									    <option value="Yes"<?=$json['btn_noti']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['btn_noti']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					<form method="post">
									<div class="form-group ">
                                    <label class="control-label requiredField" for="btn_update" >
                                        <strong> Show Update Button</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="btn_update">
									    <option value="Yes"<?=$json['btn_update']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['btn_update']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
                                <form method="post">
									<div class="form-group ">
                                    <label class="control-label requiredField" for="show_expire" >
                                        <strong> Show Sub Expiry</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="show_expire">
									    <option value="yes"<?=$json['show_expire']=='yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['show_expire']=='no'?'selected':'' ?>>Disabled</option>
									</select>
                                    </div>
                                    </br>
								 <div class="form-group">
                                    <div>
                                     </div>   
                        <button class="btn btn-primary" name="submit" type="submit">
                                    <i class="fa fa-check"></i><strong> Update App Settings</strong>
                        </button>
  </div>
                    </form>
                </div></div></div>
            <div class="col-md-6 col-12">

            <div class="card">
              <div class="card-header">
                  <i class="fa fa-sliders"></i> Extra Options</div>
            <div class="card-body">
					 <form method="post">
					     <div class="form-group ">
                                    <label class="control-label " for="select_filter_status">
                                    </label>
					                <div class="form-group ">
                                    <label class="control-label requiredField" for="login_logo" >
                                        <strong> Show Login Logo</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="login_logo">
									    <option value="Yes"<?=$json['login_logo']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['login_logo']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					 <form method="post">
					                <div class="form-group ">
                                    <label class="control-label requiredField" for="logs" >
                                        <strong> Show App Logs</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="logs">
									    <option value="Yes"<?=$json['logs']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['logs']=='no'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					 <form method="post">
					                <div class="form-group ">
                                    <label class="control-label requiredField" for="all_cat" >
                                        <strong> Show All Categories</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="all_cat">
									    <option value="Yes"<?=$json['all_cat']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="No" <?=$json['all_cat']=='No'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
					 <form method="post">
					                <div class="form-group ">
                                    <label class="control-label requiredField" for="show_cat_count" >
                                        <strong> Show Category Count</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="show_cat_count">
									    <option value="yes"<?=$json['show_cat_count']=='yes'?'selected':'' ?>>Enabled</option>
                                        <option value="No" <?=$json['show_cat_count']=='No'?'selected':'' ?>>Disabled</option>
									</select>                                </div>
									<div class="form-group ">
                                    <label class="control-label " for="agent">
                                        <strong> User Agent</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control text-muted" name="agent"  value="<?=$json['agent']?>" type="text"/>
                                    </div>
                                </div>
					 <form method="post">
									<div class="form-group ">
                                    <label class="control-label requiredField" for="load_last_channel" >
                                        <strong> Load Last Channel</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="load_last_channel">
									    <option value="Yes"<?=$json['load_last_channel']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="No" <?=$json['load_last_channel']=='No'?'selected':'' ?>>Disabled</option>
									</select>
                                    </div>
                                    <div class="form-group ">
                                    <label class="control-label requiredField" for="btn_login_settings" >
                                        <strong> Show Settings On Login</strong>
                                    </label>
                                    <select class="select form-control text-muted" id="select" name="btn_login_settings">
									    <option value="Yes"<?=$json['btn_login_settings']=='Yes'?'selected':'' ?>>Enabled</option>
                                        <option value="no" <?=$json['btn_login_settings']=='no'?'selected':'' ?>>Disabled</option>
									</select>
                                    </div>
                                    </br>
								 <div class="form-group">
                                    <div>
                                     </div>   
                        <button class="btn btn-primary" name="submit_support" type="submit">
                                    <i class="fa fa-check"></i><strong> Update App Settings</strong>
                                </button>
                        </div>
                            </form>
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
