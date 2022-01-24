<?php
$jsondata = file_get_contents("./api/main.json");
$data = json_decode($jsondata, true);
$json = $data['app'];
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit_support'])){
$jsonData = file_get_contents("./api/main.json");  
$arrayData = json_decode($jsonData, true);
if(empty($_POST["announcement_enabled"]    )){$announcement_enabled       = 'no';}else { $announcement_enabled          = $_POST["announcement_enabled"]    ;}
if(empty($_POST["message_enabled"]   )){$message_enabled      = 'no';}else { $message_enabled       					= $_POST["message_enabled"]   ;}
if(empty($_POST["updateuserinfo_enabled"]   )){$updateuserinfo_enabled      = 'no';}else { $updateuserinfo_enabled      = $_POST["updateuserinfo_enabled"]   ;}
if(empty($_POST["check_btn_signup"]   )){$btn_signup      = 'no';}else { $btn_signup      = $_POST["btn_signup"]   ;}

$replacementData = array('app' => array(
	'announcement_enabled' => $announcement_enabled,
	'message_enabled' 	=> $message_enabled,
	'updateuserinfo_enabled' => $updateuserinfo_enabled,
    'appname'		    =>	$_POST['appname'],
    'customerid'	    =>  $_POST["customerid"],
    'expire'		    =>  $_POST["expire"],
	'version_code'		=>	$_POST['version_code'],
    'status'		    =>  $_POST['status'],	
	'support_email'		=>	$_POST["support_email"],  
	'support_phone'		=>	$_POST["support_phone"],
	'btn_signup' => $btn_signup ));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/main.json", $newJsonData);
header("Location: app.php?message=$message");
		}
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/main.json");  
$arrayData = json_decode($jsonData, true);
$replacementData = array('app' => array(

	'portal'		=>	$_POST['portal'],
	'portal2'		=>	$_POST["portal2"],  
	'portal3'		=>	$_POST["portal3"],
	'portal4'		=>	$_POST["portal4"],
	'portal5'		=>	$_POST["portal5"],
	'portal_name'		=>	$_POST["portal_name"],
	'portal2_name'		=>	$_POST["portal2_name"],  
	'portal3_name'		=>	$_POST["portal3_name"],
	'portal4_name'		=>	$_POST["portal4_name"],
	'portal5_name'		=>	$_POST["portal5_name"],
	'portal_vod'	=>	$_POST["portal_vod"], 
	'portal_series'	=>	$_POST["portal_series"],
	'epg_url'	=>	$_POST["epg_url"],
	'ovpn_url'	=>	$_POST["ovpn_url"] ));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/main.json", $newJsonData);
header("Location: app.php?message=$message");
		}
		
if(isset($_POST['submit_app_custom'])){
$jsonData = file_get_contents("./api/main.json");  
$arrayData = json_decode($jsonData, true);

if(empty($_POST["btn_live"]    )){$btn_live       = 'No';}else { $btn_live        = $_POST["btn_live"]    ;}
if(empty($_POST["btn_live2"]   )){$btn_live2      = 'No';}else { $btn_live2       = $_POST["btn_live2"]   ;}
if(empty($_POST["btn_live3"]   )){$btn_live3      = 'No';}else { $btn_live3       = $_POST["btn_live3"]   ;}
if(empty($_POST["btn_live4"]   )){$btn_live4      = 'No';}else { $btn_live4       = $_POST["btn_live4"]   ;}
if(empty($_POST["btn_live5"]   )){$btn_live5      = 'No';}else { $btn_live5       = $_POST["btn_live5"]   ;}
if(empty($_POST["btn_vod"]     )){$btn_vod        = 'No';}else { $btn_vod         = $_POST["btn_vod"]     ;}
if(empty($_POST["btn_vod2"]    )){$btn_vod2       = 'No';}else { $btn_vod2        = $_POST["btn_vod2"]    ;}
if(empty($_POST["btn_vod3"]    )){$btn_vod3       = 'No';}else { $btn_vod3        = $_POST["btn_vod3"]    ;}
if(empty($_POST["btn_vod4"]    )){$btn_vod4       = 'No';}else { $btn_vod4        = $_POST["btn_vod4"]    ;}
if(empty($_POST["btn_vod5"]    )){$btn_vod5       = 'No';}else { $btn_vod5        = $_POST["btn_vod5"]    ;}
if(empty($_POST["btn_epg"]     )){$btn_epg        = 'No';}else { $btn_epg         = $_POST["btn_epg"]     ;}
if(empty($_POST["btn_epg2"]    )){$btn_epg2       = 'No';}else { $btn_epg2        = $_POST["btn_epg2"]    ;}
if(empty($_POST["btn_epg3"]    )){$btn_epg3       = 'No';}else { $btn_epg3        = $_POST["btn_epg3"]    ;}
if(empty($_POST["btn_epg4"]    )){$btn_epg4       = 'No';}else { $btn_epg4        = $_POST["btn_epg4"]    ;}
if(empty($_POST["btn_epg5"]    )){$btn_epg5       = 'No';}else { $btn_epg5        = $_POST["btn_epg5"]    ;}
if(empty($_POST["btn_series"]  )){$btn_series     = 'No';}else { $btn_series      = $_POST["btn_series"]  ;}
if(empty($_POST["btn_series2"] )){$btn_series2    = 'No';}else { $btn_series2     = $_POST["btn_series2"] ;}
if(empty($_POST["btn_series3"] )){$btn_series3    = 'No';}else { $btn_series3     = $_POST["btn_series3"] ;}
if(empty($_POST["btn_series4"] )){$btn_series4    = 'No';}else { $btn_series4     = $_POST["btn_series4"] ;}
if(empty($_POST["btn_series5"] )){$btn_series5    = 'No';}else { $btn_series5     = $_POST["btn_series5"] ;}
if(empty($_POST["btn_radio"]   )){$btn_radio      = 'No';}else { $btn_radio       = $_POST["btn_radio"]   ;}
if(empty($_POST["btn_radio2"]  )){$btn_radio2     = 'No';}else { $btn_radio2      = $_POST["btn_radio2"]  ;}
if(empty($_POST["btn_radio3"]  )){$btn_radio3     = 'No';}else { $btn_radio3      = $_POST["btn_radio3"]  ;}
if(empty($_POST["btn_radio4"]  )){$btn_radio4     = 'No';}else { $btn_radio4      = $_POST["btn_radio4"]  ;}
if(empty($_POST["btn_radio5"]  )){$btn_radio5     = 'No';}else { $btn_radio5      = $_POST["btn_radio5"]  ;}
if(empty($_POST["btn_catchup"] )){$btn_catchup    = 'No';}else { $btn_catchup     = $_POST["btn_catchup"] ;}
if(empty($_POST["btn_catchup2"])){$btn_catchup2   = 'No';}else { $btn_catchup2    = $_POST["btn_catchup2"];}
if(empty($_POST["btn_catchup3"])){$btn_catchup3   = 'No';}else { $btn_catchup3    = $_POST["btn_catchup3"];}
if(empty($_POST["btn_catchup4"])){$btn_catchup4   = 'No';}else { $btn_catchup4    = $_POST["btn_catchup4"];}
if(empty($_POST["btn_catchup5"])){$btn_catchup5   = 'No';}else { $btn_catchup5    = $_POST["btn_catchup5"];}
if(empty($_POST["btn_account"] )){$btn_account    = 'no';}else { $btn_account     = $_POST["btn_account"] ;}
if(empty($_POST["btn_account2"])){$btn_account2   = 'no';}else { $btn_account2    = $_POST["btn_account2"];}
if(empty($_POST["btn_account3"])){$btn_account3   = 'no';}else { $btn_account3    = $_POST["btn_account3"];}
if(empty($_POST["btn_account4"])){$btn_account4   = 'no';}else { $btn_account4    = $_POST["btn_account4"];}
if(empty($_POST["btn_account5"])){$btn_account5   = 'no';}else { $btn_account5    = $_POST["btn_account5"];}
if(empty($_POST["ms"]          )){$ms             = 'no';}else { $ms              = $_POST["ms"]          ;}
if(empty($_POST["ms2"]         )){$ms2            = 'no';}else { $ms2             = $_POST["ms2"]         ;}
if(empty($_POST["ms3"]         )){$ms3            = 'no';}else { $ms3             = $_POST["ms3"]         ;}
if(empty($_POST["ms4"]         )){$ms4            = 'no';}else { $ms4             = $_POST["ms4"]         ;}
if(empty($_POST["ms5"]         )){$ms5            = 'no';}else { $ms5             = $_POST["ms5"]         ;}
if(empty($_POST["btn_fav"]     )){$btn_fav        = 'no';}else { $btn_fav         = $_POST["btn_fav"]     ;}
if(empty($_POST["btn_fav2"]    )){$btn_fav2       = 'no';}else { $btn_fav2        = $_POST["btn_fav2"]    ;}
if(empty($_POST["btn_fav3"]    )){$btn_fav3       = 'no';}else { $btn_fav3        = $_POST["btn_fav3"]    ;}
if(empty($_POST["btn_fav4"]    )){$btn_fav4       = 'no';}else { $btn_fav4        = $_POST["btn_fav4"]    ;}
if(empty($_POST["btn_fav5"]    )){$btn_fav5       = 'no';}else { $btn_fav5        = $_POST["btn_fav5"]    ;}
if(empty($_POST["stream_type"] )){$stream_type    = 'ts';}else { $stream_type     = $_POST["stream_type"] ;}

$replacementData = array('app' => array(
        "btn_live"         =>	$btn_live      ,
        "btn_live2"        =>	$btn_live2     ,
        "btn_live3"        =>	$btn_live3     ,
        "btn_live4"        =>	$btn_live4     ,
        "btn_live5"        =>	$btn_live5     ,
        "btn_vod"          =>	$btn_vod       ,
        "btn_vod2"         =>	$btn_vod2      ,
        "btn_vod3"         =>	$btn_vod3      ,
        "btn_vod4"         =>	$btn_vod4      ,
        "btn_vod5"         =>	$btn_vod5      ,
        "btn_epg"          =>	$btn_epg       ,
        "btn_epg2"         =>	$btn_epg2      ,
        "btn_epg3"         =>	$btn_epg3      ,
        "btn_epg4"         =>	$btn_epg4      ,
        "btn_epg5"         =>	$btn_epg5      ,
        "btn_series"       =>	$btn_series    ,
        "btn_series2"      =>	$btn_series2   ,
        "btn_series3"      =>	$btn_series3   ,
        "btn_series4"      =>	$btn_series4   ,
        "btn_series5"      =>	$btn_series5   ,
        "btn_radio"        =>	$btn_radio     ,
        "btn_radio2"       =>	$btn_radio2    ,
        "btn_radio3"       =>	$btn_radio3    ,
        "btn_radio4"       =>	$btn_radio4    ,
        "btn_radio5"       =>	$btn_radio5    ,
        "btn_catchup"      =>	$btn_catchup   ,
        "btn_catchup2"     =>	$btn_catchup2  ,
        "btn_catchup3"     =>	$btn_catchup3  ,
        "btn_catchup4"     =>	$btn_catchup4  ,
        "btn_catchup5"     =>	$btn_catchup5  ,
        "btn_account"      =>	$btn_account   ,
        "btn_account2"     =>	$btn_account2  ,
        "btn_account3"     =>	$btn_account3  ,
        "btn_account4"     =>	$btn_account4  ,
        "btn_account5"     =>	$btn_account5  ,
        "ms"               =>	$ms            ,
        "ms2"              =>	$ms2           ,
        "ms3"              =>	$ms3           ,
        "ms4"              =>	$ms4           ,
        "ms5"              =>	$ms5           ,
        "btn_fav"          =>	$btn_fav       ,
        "btn_fav2"         =>	$btn_fav2      ,
        "btn_fav3"         =>	$btn_fav3      ,
        "btn_fav4"         =>	$btn_fav4      ,
        "btn_fav5"         =>	$btn_fav5      ,
        "stream_type"      =>   $stream_type ));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
file_put_contents("./api/main.json", $newJsonData);
header("Location: app.php?message=$message");
		}
include("includes/header.php");

?>


	<?if(isset($_GET['message'])){echo $_GET['message'];}?>
        <div class="row mt-3"> 
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-mobile fa-lg"></i> <strong>XCIPTV APP DETAILS</strong></div>
                    <div class="card-body">
                        <div class="mr-5">
                            <form method="post">
                                <div class="form-group">
                                    <label class="control-label" for="select_filter_status"></label>
                                        <div class="alert alert-info" role="alert">
                                            <strong>XCIPTV 702<sup>+</sup></strong> </div>
                                        </div>
                                <div class="form-group ">
                                    <label class="control-label " for="appname">
                                       <strong> App Name:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="appname" name="appname" value="<?=$json['appname']?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="customerid">
                                     <strong>Customer Id Number:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" name="customerid"  value="<?=$json['customerid']?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="expire">
                                        <strong>App Expiry (2020-12-21 23:30:10):</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" name="expire"  value="<?=$json['expire']?>" type="text"/>
                                    </div>
                                </div>

				<div class="form-group ">
                                    <label class="control-label " for="version_code">
                                       <strong> Version Code:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="version_code" name="version_code" value="<?=$json['version_code']?>" type="text"/>
                                    </div>
                                </div>
								<div class="form-group ">
                                    <label class="control-label " for="status">
                                       <strong> Active App ?:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="status" name="status" value="<?=$json['status']?>" type="text"/>
                                    </div>
                                </div>
				<div class="form-group ">
                                    <label class="control-label " for="announcement_enabled">
                                       <strong> Sign-Up Button Enabled?</strong>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox" name="check_btn_signup" <?=$json['btn_signup']!=='no'?'checked':'' ?>>
                                        <label class="form-check-label" for="announcement_enabled">Yes</label>
                                    </div>
                                </div>
                               <div class="form-group ">
                                 <div class="input-group">
									<label class="control-label " for="btn_signup">
                                       <strong> URL for the button?</strong>
                                    </label>
                                    <div class="input-group">
                                    <input class="form-control" id="btn_signup" name="btn_signup" type="text" value="<?=$json['btn_signup']?>">
									</div>
                                 </div>
                               </div>
								<div class="form-group ">
                                    <label class="control-label " for="announcement_enabled">
                                       <strong> Announcements Enabled?</strong>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="announcement_enabled" id="announcement_enabled" value="yes" <?=$json['announcement_enabled']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="announcement_enabled">Yes</label>
                                    </div>
                                </div>
								<div class="form-group ">
                                    <label class="control-label " for="message_enabled">
                                       <strong> User Messages Enabled?</strong>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="message_enabled" id="message_enabled" value="yes" <?=$json['message_enabled']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="message_enabled">Yes</label>
                                    </div>
                                </div>
								<div class="form-group ">
                                    <label class="control-label " for="updateuserinfo_enabled">
                                        <strong>Update Userinfo Enabled?</strong>
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="updateuserinfo_enabled" id="updateuserinfo_enabled" value="yes" <?=$json['updateuserinfo_enabled']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="updateuserinfo_enabled">Yes</label>
                                    </div>
                                </div>
								<br>
                                <div class="form-group ">
                                    <label class="control-label " for="support_email">
                                       <strong> Support Line 1:</strong> 
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" name="support_email" value="<?=$json['support_email'] ?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="support_phone">
                                        <strong>Support Line 2:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" name="support_phone"  value="<?=$json['support_phone']?>" type="text"/>
                                    </div>
                                 </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " name="submit_support" type="submit">
                                            <strong>Update Details</strong>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-4 col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-address-card"></i> <strong> DNS & OVPN</strong></div>
                    <div class="card-body">
                        <div class="mr-5">
                            <form method="post">
                              <div class="form-group ">
                                    <label class="control-label " for="portal_name">
                                        <div class="alert alert-info">
                                            <strong>http://Yourdns.xyz:80</strong>
                                        </div>
                                    </label>
                                  </div>
                               
                                <div class="form-group ">
                                   <strong> Portal 1 Name:</strong>
                                    
                        <div class="input-group">
                        <input class="form-control" id="portal_name" name="portal_name" placeholder="Portal 1 Name" value=<?=$json['portal_name']=='0'?'0':$json['portal_name'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal">
                                       <strong> Portal Address 1:</strong> 
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal" name="portal" placeholder="Poral Address 1" value=<?=$json['portal']=='0'?'0':$json['portal'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal2_name">
                                        <strong>Portal 2 Name:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal2_name" name="portal2_name" placeholder="Portal 2 Name" value=<?=$json['portal2_name']=='0'?'0':$json['portal2_name'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal2">
                                       <strong> Portal Address 2:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal2" name="portal2" placeholder="Poral Address 2" value=<?=$json['portal2']=='0'?'0':$json['portal2'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal3_name">
                                       <strong> Portal 3 Name:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal3_name" name="portal3_name" placeholder="Portal 3 Name" value=<?=$json['portal3_name']=='0'?'0':$json['portal3_name'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal3">
                                       <strong> Portal Address 3:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal3" name="portal3" placeholder="Poral Address 3" value=<?=$json['portal3']=='0'?'0':$json['portal3'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal4_name">
                                       <strong> Portal 4 Name:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal4_name" name="portal4_name" placeholder="Portal 4 Name" value=<?=$json['portal4_name']=='0'?'0':$json['portal4_name'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal4">
                                       <strong> Portal Address 4:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal4" name="portal4" placeholder="Poral Address 4" value=<?=$json['portal4']=='0'?'0':$json['portal4'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal5_name">
                                       <strong> Portal 5 Name:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal5_name" name="portal5_name" placeholder="Portal 5 Name" value=<?=$json['portal5_name']=='0'?'0':$json['portal5_name'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal5">
                                       <strong> Portal Address 5:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal5" name="portal5" placeholder="Poral Address 5" value=<?=$json['portal5']=='0'?'0':$json['portal5'] ?>>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal_vod">
                                        <strong>Custom VOD Portal:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal_vod" name="portal_vod" placeholder="Custom VOD Portal" value='no' type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="portal_series">
                                       <strong> Custom Series Portal:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="portal_series" name="portal_series" placeholder="Custom Series Portal" value='no' type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="epg_url">
                                       <strong> Epg Url:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="epg_url" name="epg_url" placeholder="Epg Url" value='No' type="text"/>    
                                        </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="ovpn_url">
                                        <strong>OpenVpn Config Url:</strong>
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="ovpn_url" name="ovpn_url" placeholder="OpeVpn Config Url" value=<?=$json['ovpn_url']=='0'?'0':$json['ovpn_url'] ?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button class="btn btn-primary " name="submit" type="submit">
                                           <strong> Update Portals</strong>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <br><br>
                    <div class="col-md-4 col-12">
                    <div class="card">
                    <div class="card-header">
                        <i class="fa fa-cogs"></i> <strong>PORTAL CUSTOMISATION</strong></div>
                    <div class="card-body">
                        <div class="mr-5">
                            <form method="post">
                                <div class="form-group ">
                                    <div class="alert alert-info">
                                            <strong>PORTAL CONFIGURATION</strong>
                                            </div>
                                    <label class="control-label " for="btn_live">
                                        Show <strong>Live TV</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_live" id="btn_live" value="Yes" <?=$json['btn_live']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_live">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_live2" id="btn_live2" value="Yes" <?=$json['btn_live2']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_live2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_live3" id="btn_live3" value="Yes" <?=$json['btn_live3']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_live3">Portal 3</label>
									</div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_live4" id="btn_live4" value="Yes" <?=$json['btn_live4']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_live4">Portal 4</label>
									</div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_live5" id="btn_live5" value="Yes" <?=$json['btn_live5']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_live5">Portal 5</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="btn_epg">
                                        Show <strong>TV Guide</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_epg" id="btn_epg" value="Yes" <?=$json['btn_epg']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_epg">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_epg2" id="btn_epg2" value="Yes" <?=$json['btn_epg2']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_epg2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_epg3" id="btn_epg3" value="Yes" <?=$json['btn_epg3']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_epg3">Portal 3</label>
									</div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_epg4" id="btn_epg4" value="Yes" <?=$json['btn_epg4']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_epg4">Portal 4</label>
									</div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_epg5" id="btn_epg5" value="Yes" <?=$json['btn_epg5']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_epg5">Portal 5</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="btn_vod">
                                        Show <strong>VOD</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_vod" id="btn_vod" value="Yes" <?=$json['btn_vod']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_vod">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_vod2" id="btn_vod2" value="Yes" <?=$json['btn_vod2']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_vod2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_vod3" id="btn_vod3" value="Yes" <?=$json['btn_vod3']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_vod3">Portal 3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_vod4" id="btn_vod4" value="Yes" <?=$json['btn_vod4']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_vod4">Portal 4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_vod5" id="btn_vod5" value="Yes" <?=$json['btn_vod5']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_vod5">Portal 5</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="btn_series">
                                        Show <strong>Series</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_series" id="btn_series" value="Yes" <?=$json['btn_series']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_series">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_series2" id="btn_series2" value="Yes" <?=$json['btn_series2']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_series2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_series3" id="btn_series3" value="Yes" <?=$json['btn_series3']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_series3">Portal 3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_series4" id="btn_series4" value="Yes" <?=$json['btn_series4']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_series4">Portal 4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_series5" id="btn_series5" value="Yes" <?=$json['btn_series5']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_series5">Portal 5</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="btn_catchup">
                                        Show <strong>Catchup</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_catchup" id="btn_catchup" value="Yes" <?=$json['btn_catchup']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_catchup">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_catchup2" id="btn_catchup2" value="Yes" <?=$json['btn_catchup2']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_catchup2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_catchup3" id="btn_catchup3" value="Yes" <?=$json['btn_catchup3']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_catchup3">Portal 3</label>
									</div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_catchup4" id="btn_catchup4" value="Yes" <?=$json['btn_catchup4']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_catchup4">Portal 4</label>
									</div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_catchup5" id="btn_catchup5" value="Yes" <?=$json['btn_catchup5']=='Yes'?'checked':'' ?>>
										<label class="form-check-label" for="btn_catchup5">Portal 5</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="btn_radio">
                                        Show <strong>Radio</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_radio" id="btn_radio" value="Yes" <?=$json['btn_radio']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_radio">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_radio2" id="btn_radio2" value="Yes" <?=$json['btn_radio2']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_radio2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_radio3" id="btn_radio3" value="Yes" <?=$json['btn_radio3']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_radio3">Portal 3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_radio4" id="btn_radio4" value="Yes" <?=$json['btn_radio4']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_radio4">Portal 4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_radio5" id="btn_radio5" value="Yes" <?=$json['btn_radio5']=='Yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_radio5">Portal 5</label>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label " for="ms">
                                        Show <strong>Multi-Screens</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="ms" id="ms" value="yes" <?=$json['ms']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="ms">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="ms2" id="ms2" value="yes" <?=$json['ms2']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="ms2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="ms3" id="ms3" value="yes" <?=$json['ms3']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="ms3">Portal 3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="ms4" id="ms4" value="yes" <?=$json['ms4']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="ms4">Portal 4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="ms5" id="ms5" value="yes" <?=$json['ms5']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="ms5">Portal 5</label>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label " for="btn_fav">
                                        Show <strong>Favorite</strong> Icon?
                                    </label>
                                    <br>
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_fav" id="btn_fav" value="yes" <?=$json['btn_fav']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_fav">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_fav2" id="btn_fav2" value="yes" <?=$json['btn_fav2']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_fav2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_fav3" id="btn_fav3" value="yes" <?=$json['btn_fav3']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_fav3">Portal 3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_fav4" id="btn_fav4" value="yes" <?=$json['btn_fav4']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_fav4">Portal 4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_fav5" id="btn_fav5" value="yes" <?=$json['btn_fav5']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_fav5">Portal 5</label>
                                    </div>
                                </div>

                               <div class="form-group ">
                                    <label class="control-label " for="btn_account">
                                        Show <strong>Account</strong> Icon?
                                    </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_account" id="btn_account" value="yes" <?=$json['btn_account']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_account">Portal 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_account2" id="btn_account2" value="yes" <?=$json['btn_account2']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_account2">Portal 2</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_account3" id="btn_account3" value="yes" <?=$json['btn_account3']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_account3">Portal 3</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_account4" id="btn_account4" value="yes" <?=$json['btn_account4']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_account4">Portal 4</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="btn_account5" id="btn_account5" value="yes" <?=$json['btn_account5']=='yes'?'checked':'' ?>>
                                        <label class="form-check-label" for="btn_account5">Portal 5</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary " name="submit_app_custom" type="submit">
                                            Update App Settings
                                        </button>
                            </form>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
         








<?php
include("includes/footer.php");

?>