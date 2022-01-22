<?php

$Tag = $_GET['tag'];

$B = $_GET['b'];

$UserID = $_GET['userid'];



if(isset($_GET['tag'])) {

	if($Tag == "licV3"){

			echo bin2hex(openssl_encrypt(file_get_contents("./main.json"), "AES-128-CBC", "mysecretkeywsdef", OPENSSL_RAW_DATA, "myuniqueivparamu"));

	}

	

	if($Tag == "man"){

		echo file_get_contents("./maint.json");

	}

	if($Tag == "conn"){

			echo '{

			"tag":"conn",

			"success":"1",

			"api_ver":"1.0v"

		}';

	}

	if($Tag == "whatsup"){

			echo '{

			"tag":"whatsup",

			"success":"0",

			"api_ver":"1.0v",

			"whatsup":"no"

		}';

	}

	if($Tag == "ann"){

		echo file_get_contents("./ann.json");

	}

	if($Tag == "gfilter"){

			echo '{"tag":"gfilter_n","success":"1","api_ver":"1.0v","status":"No","filter":[]}';

	}

	if($Tag == "msg"){

		$db = new SQLite3('./user_message.db');

		$res = $db->query("SELECT * 

						FROM messages 

						WHERE userid='".$UserID."'");

		$row=$res->fetchArray();

		$message = $row['message'];

		$userid = $row['userid'];

		$status = $row['status'];

		$expire = $row['expire'];

		if(empty($message)){

		    echo "{'tag':'msg','success':'0','api_ver':'1.0v','message':'No Messages'}";}else{

		echo "{'tag':'msg','success':'1','api_ver':'1.0v','status':'$status','msgid':'1646','message':'$message'}";}

	}

	if($Tag == "msg_cat_view"){

		$db = new SQLite3('./user_message.db');

		$res = $db->query("SELECT * 

						FROM messages 

						WHERE userid='".$UserID."'");

		$row=$res->fetchArray();

		$message = $row['message'];

		$userid = $row['userid'];

		$status = $row['status'];

		$expire = $row['expire'];

		if(empty($message)){

		    echo "{'tag':'msg_cat_view','success':'0','api_ver':'1.0v','message':'No Messages'}";}else{

		echo "{'tag':'msg_cat_view','success':'1','api_ver':'1.0v','status':'$status','msgid':'1646','message':'$message'}";}

	}

	if($Tag == "msg_conf"){

		echo "{'tag':'msg_conf','success':'1','api_ver':'1.0v'}";

	}

	}else{include ('index.php');

}

?>