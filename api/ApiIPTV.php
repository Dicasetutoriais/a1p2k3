<?php 
$Tag = $_GET["tag"];
$UserID = $_GET["userid"];
if( isset($_GET["tag"]) ) 
{
    if( $Tag == "licV3" ) 
    {
        echo bin2hex(openssl_encrypt(file_get_contents("./main.json"), "AES-128-CBC", "AHDesignsecretky", OPENSSL_RAW_DATA, "AHDesignIDparamu"));
    }

    if( $Tag == "man" || $Tag == "ann" ) 
    {
        echo file_get_contents("./" . $Tag . ".json");
    }

    if( $Tag == "conn" || $Tag == "msg_conf" ) 
    {
        echo "{\"tag\":\"" . $Tag . "\",\"success\":\"1\",\"api_ver\":\"1.0v\"}";
    }

    if( $Tag == "whatsup" ) 
    {
        echo "{\"tag\":\"whatsup\",\"success\":\"0\",\"api_ver\":\"1.0v\",\"whatsup\":\"no\"}";
    }

    if( $Tag == "gfilter" ) 
    {
        echo "{\"tag\":\"gfilter_n\",\"success\":\"1\",\"api_ver\":\"1.0v\",\"status\":\"No\",\"filter\":[]}";
    }

    if( $Tag == "msg_cat_view" || $Tag == "msg" ) 
    {
        $db = new SQLite3("./user_message.db");
        $res = $db->query("SELECT * FROM messages WHERE userid='" . $UserID . "'");
        $row = $res->fetchArray();
        $message = $row["message"];
        $userid = $row["userid"];
        $status = $row["status"];
        $expire = $row["expire"];
        if( empty($message) ) 
        {
            echo "{\"tag\":\"" . $Tag . "\",\"success\":\"0\",\"api_ver\":\"1.0v\",\"message\":\"None Messages\"}";
        }
        else
        {
            echo "{\"tag\":\"" . $Tag . "\",\"success\":\"1\",\"api_ver\":\"1.0v\",\"status\":\"\$status\",\"msgid\":\"1646\",\"message\":\"\$message\"}";
        }

    }

    if( $Tag == "connv2" ) 
    {
        $db = new SQLite3("./user_message.db");
        $res = $db->query("SELECT * FROM messages WHERE userid='" . $UserID . "'");
        $row = $res->fetchArray();
        $msgid = $row["id"];
        $message = $row["message"];
        $userid = $row["userid"];
        $status = $row["status"];
        $expire = $row["expire"];
        $jsonData = file_get_contents("./connv2.json");
        if( $message != "" ) 
        {
            $arrayData = json_decode($jsonData, true);
            $replacementData = array( "success" => "1", "message" => $message, "msg_status" => $status, "msg_expire" => $expire, "msgid" => "1646" );
            $newArrayData = array_replace_recursive($arrayData, $replacementData);
            $newJsonData = json_encode($newArrayData, JSON_PRETTY_PRINT);
            echo $newJsonData;
        }
        else
        {
            echo file_get_contents("./connv2.json");
        }

    }

    if( $Tag == "vpnconfigV2" ) 
    {
        $db = new SQLite3("./vpn.db");
        $vpn = $db->query("SELECT * FROM vpnconfig");
        while( $vpna = $vpn->fetchArray(SQLITE3_ASSOC) ) 
        {
            $dataA[] = array( "id" => $vpna["id"], "userid" => $vpna["userid"], "vpn_appid" => $vpna["vpn_appid"], "vpn_country" => $vpna["vpn_country"], "vpn_state" => $vpna["vpn_state"], "vpn_config" => $vpna["vpn_config"], "vpn_status" => $vpna["vpn_status"], "auth_type" => $vpna["auth_type"], "auth_embedded" => $vpna["auth_embedded"], "username" => $vpna["username"], "password" => $vpna["password"], "date" => $vpna["date"] );
        }
        $jdata = json_encode($dataA);
        $vpn_out = "{\"tag\": \"vpnconfigV2\",\"success\": \"1\",\"api_ver\": \"1.0v\",\"vpnconfigs\": " . $jdata . "}";
        echo bin2hex(openssl_encrypt($vpn_out, "AES-128-CBC", "freyathepugblack", OPENSSL_RAW_DATA, "hadesthecatpersi"));
    }

    if( $Tag == "intro" ) 
    {
        $real_file_location_path_or_url = ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off" ? "https" : "http")) . "://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"], 2) . "/intro.mp4";
        ob_start();
        if( isset($_SERVER["HTTP_RANGE"]) ) 
        {
            $opts["http"]["header"] = "Range: " . $_SERVER["HTTP_RANGE"];
        }

        $opts["http"]["method"] = "HEAD";
        $conh = stream_context_create($opts);
        $opts["http"]["method"] = "GET";
        $cong = stream_context_create($opts);
        $out[] = file_get_contents($real_file_location_path_or_url, false, $conh);
        $out[] = $http_response_header;
        ob_end_clean();
        array_map("header", $http_response_header);
        readfile($real_file_location_path_or_url, false, $cong);
    }

}
else
{
    include("index.php");
}


