<?php 
$jsondata = file_get_contents("./api/main.json");
$data = json_decode($jsondata, true);
$json = $data['app'];
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$jsonData = file_get_contents("./api/main.json");

$arrayData = json_decode($jsonData, true);
	$replacementData = array('app' =>  array(
	'theme'		=>	$_POST["theme"]));
$newArrayData = array_replace_recursive($arrayData, $replacementData);
$newJsonData = json_encode($newArrayData, JSON_UNESCAPED_UNICODE);
file_put_contents("./api/main.json", $newJsonData);
header("Location: theme.php?message=$message");
		}
include ('includes/header.php');
?>

<div class="card mt-4 mb-3">
  <div class="card-header card-header-warning">
       <i class="fa fa-paint-brush"></i>Theme Change</div>
            <div class="card-body">                
                <div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5>Choose Your Theme</h5>
                        </div>
                           </div>    
                    <div class="col-12">
                        
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label requiredField" for="theme" >
                                    </label>
                                    <select class="select form-control " id="select" name="theme">
									    <option value="theme_d"<?=$json['theme']=='theme_d'?'selected':'' ?>>Standard</option>
                                        <option value="theme_1" <?=$json['theme']=='theme_1'?'selected':'' ?>>Theme 1</option>
										<option value="theme_2" <?=$json['theme']=='theme_2'?'selected':'' ?>>Theme 2</option>
										<option value="theme_3" <?=$json['theme']=='theme_3'?'selected':'' ?>>Theme 3</option>
										<option value="theme_4" <?=$json['theme']=='theme_4'?'selected':'' ?>>Theme 4</option>
										<option value="new_layout" <?=$json['theme']=='new_layout'?'selected':'' ?>>New Layout</option>
                                    </select>
									</div>
                                    <div class="form-group">
                                        <div class="card-body">
                                            <button class="btn btn-primary" name="submit" type="submit" >submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        
                        <div style="width:700px; margin:0 auto;">
		         <div class="row">
		          <div class="center">
			    <div style="width:700px; margin:0 auto;">
				<form method="post"> 
				  <div class="container">
				    <div class="row">
					<div class="col-sm-6">
					  <div class="card">
					    <div class="card-block">
						<h4 class="card-title text-center card card bg-light text-primary">Standard</h4>
						  </div>
						    <img class="card-img-bottom" src="./img/d.jpg" alt="Card image" style="width:100%">
							</div>
							</div>
					<div class="col-sm-6">
					<div class="card">
					<div class="card-block">
						  <h4 class="card-title text-center card card bg-light text-primary">Theme 1</h4>
						    </div>
						      <img class="card-img-bottom" src="./img/1.jpg" alt="Card image" style="width:100%">
						        </div>
							  </div>
                                                           
					<div class="col-sm-6">
					<div class="card">
					<div class="card-block">
						   <h4 class="card-title text-center card card bg-light text-primary">Theme 2</h4>
						     </div>
							<img class="card-img-bottom" src="./img/2.jpg" alt="Card image" style="width:100%">
							  </div>
							   </div>
							    <div class="col-sm-6">
							      <div class="card">
					<div class="card-block">
						    <h4 class="card-title text-center card card bg-light text-primary">Theme 3</h4>
						      </div>
							<img class="card-img-bottom" src="./img/3.jpg" alt="Card image" style="width:100%">
							  </div>
							   </div>
							   <div class="col-sm-6">
							      <div class="card">
					<div class="card-block">
						    <h4 class="card-title text-center card card bg-light text-primary">Theme 4</h4>
						      </div>
							<img class="card-img-bottom" src="./img/4.jpg" alt="Card image" style="width:100%">
							  </div>
							   </div>
								<div class="col-sm-6">
							      <div class="card">
					<div class="card-block">
						    <h4 class="card-title text-center card card bg-light text-primary">New Layout</h4>
						      </div>
							<img class="card-img-bottom" src="./img/5.jpg" alt="Card image" style="width:100%">
							  </div>
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
    </div>
</div>
                                         
                                                         <script> 
$(document).ready(function () {
    $("#flash-msg").delay(3000).fadeOut("slow");
});
  </script>
<?php include ('includes/footer.php');?>

