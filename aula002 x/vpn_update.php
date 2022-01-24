<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new SQLite3('./api/vpn_config.db');
$res = $db->query("SELECT * 
				  FROM vpn 
				  WHERE id='".$_GET['update']."'");
$row=$res->fetchArray();
$id = $row['id'];
$vpn_country = $row['vpn_country'];
$vpn_state = $row['vpn_state'];
$vpn_config = $row['vpn_config'];
$vpn_status = $row['vpn_status'];
$username = $row['username'];
$password = $row['password'];
$auth_type = $row['auth_type'];
$auth_embedded = $row['auth_embedded'];

if(isset($_POST['submit'])){
$db->exec("UPDATE vpn SET vpn_country='".$_POST['vpn_country']."', 
								vpn_state='".$_POST['vpn_state']."',
								vpn_config='".$_POST['vpn_config']."',
								vpn_status='".$_POST['vpn_status']."',
								username='".$_POST['username']."',
								password='".$_POST['password']."'
						  WHERE 
							  id='".$_POST['id']."'");
$db->close();
header("Location: vpn.php");
}
include ('includes/header.php');
$id = $row['id'];
$vpn_country = $row['vpn_country'];
$vpn_state = $row['vpn_state'];
$vpn_config = $row['vpn_config'];
$vpn_status = $row['vpn_status'];
$username = $row['username'];
$password = $row['password'];
$auth_type = $row['auth_type'];
$auth_embedded = $row['auth_embedded'];


echo "            <div class=\"card-body\">\n";
echo "              <div class=\"card bg-black text-white\">\n";
echo "                <div class=\"card-header card-header-warning\">\n";
echo "                  <center><h4 class=\"card-title\">Edit VPN Details</h4></center>\n";
echo "                </div>\n";
echo "                <div class=\"card-body\">\n";
echo "                <div class=\"alert alert-black\">\n";
echo "                <div class=\"row\">\n";
echo "                <div class=\"col-12\">\n";
echo "                  <form  method=\"post\">\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">Country</label>\n";
echo "						   <input type=\"hidden\" name=\"id\" value=\"$id\">\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"vpn_country\" value=\"$vpn_country\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">State</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"vpn_state\" value=\"$vpn_state\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">URL</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"vpn_config\" value=\"$vpn_config\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">Status</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"vpn_status\" value=\"$vpn_status\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">Username</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"username\" value=\"$username\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "                        <div class=\"form-group\">\n";
echo "                          <label class=\"bmd-label-floating\">Password</label>\n";
echo "                          <input type=\"text\" class=\"form-control\" name=\"password\" value=\"$password\">\n";
echo "                        </div>\n";
echo "                      </div>\n";
echo "                      <div>\n";
echo "					<br><center><button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Submit</button></center>\n";
echo "				</form>\n";
echo "				</div>\n";
echo "              </div>\n";
echo "            </div>\n";
echo "		   </div>\n";
echo "              </div>\n";
include ('includes/footer.php');
echo "</body>\n";
echo "\n";
echo "</html>\n";
?>