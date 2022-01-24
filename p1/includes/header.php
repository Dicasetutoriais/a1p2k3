<?php
/**
* @ PHP 5.6
* @ Decoder version : 1.0.0.5
* @ Release on : 22.05.2019
* @ Website    : http://EasyToYou.eu
*
* @ Zend guard decoder PHP 5.6
*/

session_start();
date_default_timezone_set("America/Sao_Paulo"); // Timezone
ini_set("allow_url_fopen", 1);
ini_set("display_errors", 0);
error_reporting(0);
ini_set("track_errors","0");
include_once ('includes/functions.php');
$checkLicense = '';
$bar = '/';
$XCStreamHostUrl = (isset($XCStreamHostUrl) ? $XCStreamHostUrl : '');
$XClicenseIsval = (isset($XClicenseIsval) ? $XClicenseIsval : '');
$XClocalKey = (isset($XClocalKey) ? $XClocalKey : '');
$SessioStoredUsername = (!empty($_SESSION['webTvplayer']['username']) ? $_SESSION['webTvplayer']['username'] : '');

if (substr($XCStreamHostUrl, -1) == '/') {
	$bar = '';
}

if ($configFileCheck['result'] == 'success') {
	if (($configFileCheck['permission'] == '0777') || ($configFileCheck['permission'] == '0755')) {
		require ('configuration.php');
	}
	else {
		require ('configuration.php');
	}
}
else if (!file_exists('configuration.php')) {
	$my_file = 'configuration.php';

	exit('Cannot open file:  ' . $my_file);
	($handle = fopen($my_file, 'w')) || true;
}

if (!isset($_SESSION['webTvplayer']) && empty($_SESSION['webTvplayer']) && ($activePage !== 'index')) {
	echo '<script>window.location.href = \'index.php\';</script>';
	exit();
}
/*
if (empty($XClicenseIsval) && empty($XClocalKey)) {
	echo '<script>window.location.href = \'player_install.php\';</script>';
	exit();
}
*/
$checkLicense = webtvpanel_CheckLicense($XClicenseIsval, $XClocalKey);

if (isset($_SESSION['webTvplayer'])) {
	$username = $_SESSION['webTvplayer']['username'];
	$password = $_SESSION['webTvplayer']['password'];
	$hostURL = $XCStreamHostUrl;
}

$ShiftedTimeEPG = 0;
$headerparentcondition = '';
$GlobalTimeFormat = '12';

if (isset($_COOKIE['settings_array'])) {
	$SettingArray = json_decode($_COOKIE['settings_array']);

	if (isset($SettingArray->{$SessioStoredUsername}) && !empty($SettingArray->{$SessioStoredUsername})) {
		$ShiftedTimeEPG = $SettingArray->{$SessioStoredUsername}->epgtimeshift;
		$GlobalTimeFormat = $SettingArray->{$SessioStoredUsername}->timeformat;
		$headerparentcondition = $SettingArray->{$SessioStoredUsername}->parentpassword;
	}
}

echo '<!DOCTYPE html>' . "\r\n" . '<html lang="en">' . "\r\n" . '<head>' . "\r\n" . '<meta charset="utf-8">' . "\r\n" . '<meta http-equiv="X-UA-Compatible" content="IE=edge">' . "\r\n" . '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n" . '<title>';
echo isset($XCsitetitleval) ? $XCsitetitleval : '';
echo '</title>' . "\r\n\r\n" . '<!-- Bootstrap -->' . "\r\n" . '<style>' . "\r\n" . ':root {' . "\r\n" . '  --primary-color: #fff;' . "\r\n" . '  --dark-gray: #222;' . "\r\n" . '  --almost-black: #111;' . "\r\n" . '  --semi-white: #ccc;' . "\r\n" . '  --blue: #3498db;' . "\r\n" . '  --red: #e74c3c;' . "\r\n" . '  ' . "\r\n" . '  --standard: 1.25rem;' . "\r\n" . '  --big: 2rem;' . "\r\n" . '  --small: 0.7rem;' . "\r\n" . '  ' . "\r\n" . '  --serif: Georgia, serif;' . "\r\n" . '}' . "\r\n" . '</style>' . "\r\n" . '<link href="assets/css/bootstrap.css" rel="stylesheet">' . "\r\n" . '<link href="assets/css/style.css" rel="stylesheet">' . "\r\n" . '<link href="assets/css/owl.carousel.css" rel="stylesheet">' . "\r\n" . '<link href="assets/css/font-awesome.min.css" rel="stylesheet">' . "\r\n" . '<link href="assets/css/scrollbar.css" rel="stylesheet">' . "\r\n\r\n" . '<script src="assets/js/jquery-1.11.3.min.js"></script> ' . "\r\n" . '<link rel="stylesheet" type="text/css" href="assets/css/rippler.css" />' . "\r\n\r\n\r\n" . '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->' . "\r\n" . '<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->' . "\r\n" . '<!--[if lt IE 9]>' . "\r\n" . '      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>' . "\r\n" . '      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>' . "\r\n" . '    <![endif]-->' . "\r\n" . '    <style>' . "\r\n" . '    #cbp-spmenu-s1' . "\r\n" . '    {' . "\r\n" . '      padding-bottom: 80px;' . "\r\n" . '    }' . "\r\n" . '  </style>' . "\r\n" . '</head>' . "\r\n" . '<body>' . "\r\n\r\n\t" . '<div class="body-content">' . "\r\n" . '  ' . "\t" . '<div class="overlay"></div>' . "\r\n" . '    ' . "\r\n" . '  ' . "\t";

?> 
