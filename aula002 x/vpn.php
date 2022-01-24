<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$db = new SQLite3('./api/vpn_config.db');
$db->exec("CREATE TABLE IF NOT EXISTS vpn(id INTEGER PRIMARY KEY,userid TEXT ,vpn_appid TEXT,vpn_country TEXT ,vpn_state TEXT,vpn_config TEXT ,vpn_status TEXT,auth_type TEXT ,auth_embedded TEXT,username TEXT ,password TEXT,date TEXT)");
$res = $db->query('SELECT * FROM vpn');

if(isset($_GET['delete'])){
$db->exec("DELETE FROM vpn WHERE id=".$_GET['delete']);
$db->close();
header("Location: vpn.php");

}

include ('includes/header.php');

echo "<div class=\"main\">\n";
echo "\n";
echo "    <div class=\"modal fade\" id=\"confirm-delete\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">\n";
echo "        <div class=\"modal-dialog\">\n";
echo "            <div class=\"modal-content\">\n";
echo "                <div class=\"modal-header\">\n";
echo "                    <font color=\"black\"><h2>Confirm</h2></font>\n";
echo "                </div>\n";
echo "                <div class=\"modal-body\">\n";
echo "                    <font color=\"black\">Do you really want to delete?</font>\n";
echo "                </div>\n";
echo "                <div class=\"modal-footer\">\n";
echo "                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>\n";
echo "                    <a class=\"btn btn-danger btn-ok\">Delete</a>\n";
echo "                </div>\n";
echo "            </div>\n";
echo "        </div>\n";
echo "    </div>\n";
echo "\n";
echo "\n";
echo "        </br><center><h2><i class=\"fa fa-globe\"></i>VPN</h2></center>\n";
echo "        <center> <a button class=\"btn btn-primary btn-icon-split\" id=\"button\" href=\"./vpn_create.php\">\n";
echo "                    <span class=\"icon\"><i class=\"fa fa-check\"></i></span><span class=\"text\">ADD VPN</span>\n";
echo "                   </button></a><br></center>\n";

echo "<div class=\"main\">\n";

echo "      <div class=\"card-body\">\n";
echo "        <div class=\"table-responsive\">\n";
echo "          <table class=\"table table-striped table\">\n";
echo "            <thead class=\" text-primary\">\n";
echo "                <tr>\n";
echo "                  <th>Country</th>\n";
echo "                  <th>State</th>\n";
echo "                  <th>Url</th>\n";
echo "                  <th>Status</th>\n";
echo "                  <th>Username</th>\n";
echo "                  <th>Password</th>\n";
echo "				    <th>Edit</th>\n";
echo "				    <th>Delete</th>\n";
echo "                </tr>\n";
echo "              </thead>\n";
				while ($row = $res->fetchArray()) {
					$id = $row['id'];
					$vpn_country = $row['vpn_country'];
					$vpn_state = $row['vpn_state'];
					$vpn_config = $row['vpn_config'];
					$vpn_status = $row['vpn_status'];
					$vpn_username = $row['username'];
					$vpn_password = $row['password'];
echo "              <tbody class=\" text-primary\">\n";
echo "                <tr>\n";
echo "                  <td>$vpn_country</td>\n";
echo "                  <td>$vpn_state</td>\n";
echo "                  <td>$vpn_config</td>\n";
echo "                  <td>$vpn_status</td>\n";
echo "                  <td>$vpn_username</td>\n";
echo "                  <td>$vpn_password</td>\n";
echo "                  <td><a href=\"./vpn_update.php?update=$id\"><i class=\"fa fa-pencil-square-o\" style=\"font-size:24px;color:blue\"></i></a></td>\n";
echo "                  <td><a href=\"#\" data-href=\"./vpn.php?delete=$id\" data-toggle=\"modal\" data-target=\"#confirm-delete\"><i class=\"fa fa-trash-o\" style=\"font-size:24px;color:red\"></i></a></td>\n";
echo "                </tr>\n";
echo "              </tbody>\n";
				};
echo "            </table>\n";
echo "          </div>\n";
echo "		</div>\n";

echo "		</div>\n";
echo "\n";
include ('includes/footer.php');
echo "<script>\n";
echo "$('#confirm-delete').on('show.bs.modal', function(e) {";
echo "    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));\n";
echo "});\n";
echo "</script>\n";
echo "</body>\n";
echo "\n";
echo "</html>\n";
?>