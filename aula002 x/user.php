<?php 
$db = new SQLite3('./api/.db.db');
$res = $db->query("SELECT * 
				  FROM USERS 
				  WHERE ID='1'");
$row=$res->fetchArray();
$message = '<div class="alert alert-success" id="flash-msg"><h4><i class="icon fa fa-check"></i>Items Updated!</h4></div>';
if(isset($_POST['submit'])){
$db->exec("UPDATE USERS 
			SET	USERNAME='".$_POST['username']."', 
				PASSWORD='".$_POST['password']."' 
			WHERE 
				ID='1' ");
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
		header("Location: user.php?message=$message");
}

include ('includes/header.php');
?>
<div class="content-wrapper">
    <div class="container pt-5">
      <?if(isset($_GET['message'])){echo $_GET['message'];}?>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-address-book"></i> Update Account</div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5>Edit User / Pass</h5>
                        </div>
                        <div class="col-md-8 mx-auto">
                            <form method="post">
                                <div class="form-group ">
                                    <label class="control-label " for="username">
                                        Username
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control" id="description" name="username" value="<?=$row['USERNAME']?>" type="text"/>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="control-label " for="password">
                                        Password
                                    </label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="password" id="date" value="<?=$row['PASSWORD'] ?>">
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
<?php include ('includes/footer.php');?>
