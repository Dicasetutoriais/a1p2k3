<?php

session_start();
if (isset($_SESSION["loggedin"])) {
    header("location:app.php");
}
$formerror = "";
$db = new SQLite3("IP_SPY/ip_spy.db");
$db->exec("CREATE TABLE IF NOT EXISTS logs(id INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL, ip VARCHAR(100), device VARCHAR(20),date TIMESTAMP)");
$logs = $db->query("SELECT * FROM logs");
$details = details();
$getIp = real_ip();
$date = date("Y-m-d H:i:s");
$db->exec("INSERT INTO logs(ip,device,date) VALUES('" . $getIp . "' ,'" . $details . "', '" . $date . "')");
$db = new SQLite3("./api/.db.db");
$db->exec("CREATE TABLE IF NOT EXISTS USERS(ID INT PRIMARY KEY,USERNAME TEXT ,PASSWORD TEXT)");
$db->exec("CREATE TABLE IF NOT EXISTS messages(id INTEGER PRIMARY KEY  AUTOINCREMENT  NOT NULL, message VARCHAR(100), userid TEXT,status TEXT,expire TEXT)");
$rows = $db->query("SELECT COUNT(*) as count FROM USERS");
$row = $rows->fetchArray();
$numRows = $row["count"];
if ($numRows == 0) {
    $db->exec("INSERT INTO USERS(ID ,USERNAME, PASSWORD) VALUES('1' ,'admin', 'admin')");
}
if (isset($_POST["login"])) {
    if (!$db) {
        echo $db->lastErrorMsg();
    }
    $details = details();
    $getIp = real_ip();
    $date = date("Y-m-d H:i:s");
    $db->exec("INSERT INTO logs(ip,device,date) VALUES('" . $getIp . "' ,'" . $details . "', '" . $date . "')");
    $sql = "SELECT * from USERS where USERNAME=\"" . $_POST["username"] . "\";";
    $ret = $db->query($sql);
    while ($row = $ret->fetchArray()) {
        $id = $row["ID"];
        $username = $row["USERNAME"];
        $password = $row["PASSWORD"];
    }
    if ($id != "") {
        if ($password == $_POST["password"]) {
            session_regenerate_id();
            $_SESSION["loggedin"] = true;
            $_SESSION["N"] = $username;
            header("Location: app.php");
        } else {
            $formerror = "Wrong Password";
        }
    } else {
        $formerror = "User not exist, please register to continue!";
    }
    $db->close();
}
echo "<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no\">\r\n    <title>WOI (Fixed Login) 702+ MANAGER</title>\r\n    <link rel=\"icon\" type=\"img/log0.png\" href=\"img/logo.png\"/>\r\n    <!-- BEGIN GLOBAL MANDATORY STYLES -->\r\n    <link href=\"https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap\" rel=\"stylesheet\">\r\n    <link href=\"bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n    <link href=\"assets/css/plugins.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n    <link href=\"assets/css/authentication/form-2.css\" rel=\"stylesheet\" type=\"text/css\" />\r\n    <!-- END GLOBAL MANDATORY STYLES -->\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/forms/theme-checkbox-radio.css\">\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"assets/css/forms/switches.css\">\r\n</head>\r\n<body class=\"form\">\r\n    \r\n\r\n    <div class=\"form-container outer\">\r\n        <div class=\"form-form\">\r\n            <div class=\"form-form-wrap\">\r\n                <div class=\"form-container\">\r\n                    <div class=\"form-content\">\r\n                        <div class=\"center\">\r\n                          <div <center><img src=\"assets/css/dashboard/.png\" width=\"100\" height=\"100\" class=\"center\" alt=\"\"></a></center>\r\n                         <h5 class=\"\">WOI (Fixed Login) XCIPTV<div>WITH INTRO</div><div>MANAGER</div></h5>\r\n                        <h1 class=\"\">Sign In</h1>\r\n                        <p class=\"\">Log in to your account to continue.</p>\r\n                       \r\n                        ";
if (!empty($formerror)) {
    echo "                         <div class=\"alert alert-danger\">";
    echo $formerror;
    echo "</div>\r\n                         ";
}
echo "                        <form class=\"text-left\" method=\"post\">\r\n                            <div class=\"form\">\r\n                            \r\n\r\n                                <div id=\"username-field\" class=\"field-wrapper input\">\r\n                                    <label for=\"username\">USERNAME</label>\r\n                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-user\"><path d=\"M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2\"></path><circle cx=\"12\" cy=\"7\" r=\"4\"></circle></svg>\r\n                                    <input id=\"username\" name=\"username\" type=\"text\" class=\"form-control\" placeholder=\"USERNAME\">\r\n                                </div>\r\n\r\n                                <div id=\"password-field\" class=\"field-wrapper input mb-2\">\r\n                                      <label for=\"username\">PASSWORD</label>\r\n                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-lock\"><rect x=\"3\" y=\"11\" width=\"18\" height=\"11\" rx=\"2\" ry=\"2\"></rect><path d=\"M7 11V7a5 5 0 0 1 10 0v4\"></path></svg>\r\n                                    <input id=\"password\" name=\"password\" type=\"password\" class=\"form-control \" placeholder=\"Password\">\r\n                                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" id=\"toggle-password\" class=\"feather feather-eye\"><path d=\"M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z\"></path><circle cx=\"12\" cy=\"12\" r=\"3\"></circle></svg>\r\n                                </div>\r\n                                <div class=\"d-sm-flex justify-content-between\">\r\n                                    <div class=\"field-wrapper\">\r\n                                        <button type=\"submit\" class=\"btn btn-primary\" value=\"\" name=\"login\">Log In</button>\r\n                                    </div>\r\n                                </div>\r\n                                <div class=\"row\">\r\n                            <div class=\"col-12 text-center mt-3\">\r\n                            <p>Time Of Arrival: \"<i>";
echo date("Y-m-d H:i:s");
echo "</i>\"</p>\r\n                            <p>IP Address: \"<i>";
echo real_ip();
echo "</i>\"</p>\r\n                        ";
include "includes/footer.php";
echo "                        </div>\r\n                        </div>\r\n\r\n                              \r\n\r\n                            </div>\r\n                        </form>\r\n\r\n                    </div>                    \r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    \r\n    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->\r\n    <script src=\"assets/js/libs/jquery-3.1.1.min.js\"></script>\r\n    <script src=\"bootstrap/js/popper.min.js\"></script>\r\n    <script src=\"bootstrap/js/bootstrap.min.js\"></script>\r\n    \r\n    <!-- END GLOBAL MANDATORY SCRIPTS -->\r\n    <script src=\"assets/js/authentication/form-2.js\"></script>\r\n\r\n</body>\r\n</html>";
function real_ip()
{
    $ip = "undefined";
    if (isset($_SERVER)) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            }
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else {
            if (getenv("HTTP_CLIENT_IP")) {
                $ip = getenv("HTTP_CLIENT_IP");
            }
        }
    }
    $ip = htmlspecialchars($ip, ENT_QUOTES, "UTF-8");
    return $ip;
}
function details()
{
    $myip = real_ip();
    $ipdat = @json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $myip));
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    if ($isMob) {
        return $ipdat->geoplugin_city . "," . $ipdat->geoplugin_countryName . "/Mobile";
    }
    return $ipdat->geoplugin_city . "," . $ipdat->geoplugin_countryName . "/Desktop";
}

?>