<?php
/**
* @ PHP 5.6
* @ Decoder version : 1.0.0.5
* @ Release on : 22.05.2019
* @ Website    : http://EasyToYou.eu
*
* @ Zend guard decoder PHP 5.6
*/

header('Content-type: text/css');
print_r($_COOKIE['username']);
$unameCookie = $_COOKIE['username'];
$primaryColor = $_COOKIE['settings_array']->{$unameCookie}->primaryColor;
$secondaryColor = $_COOKIE['settings_array']->{$unameCookie}->secondryColor;
print_r($_COOKIE['settings_array']->{$unameCookie});
echo "\r\n" . '.navb-fixid {' . "\r\n\t" . 'position: fixed;' . "\r\n\t" . 'background-color: ';
echo $primaryColor;
echo ';' . "\r\n" . '}' . "\r\n\r\n" . '.fav .add-fav' . "\r\n" . '{' . "\r\n\t" . 'background: ';
echo $secondaryColor;
echo ' url(../img/fav.png) 0px 0px no-repeat;' . "\r\n" . '}' . "\r\n" . '    ' . "\r\n" . '.ts-content .column.seasons ul li.active, .ts-content .column.episodes ul li.active {' . "\r\n\t" . 'border-left: solid 3px ';
echo $secondaryColor;
echo ';' . "\r\n" . '}' . "\r\n\r\n" . '.channel-list ul li:hover{' . "\r\n" . '    background: ';
echo $secondaryColor;
echo ';' . "\r\n" . '}' . "\r\n\r\n" . '.playlist ul li a:hover{' . "\r\n\t" . 'color: ';
echo $secondaryColor;
echo ';' . "\r\n" . '}' . "\r\n\r\n" . '.btn-ghost:hover{' . "\r\n" . '    background: ';
echo $secondaryColor;
echo ';' . "\r\n" . '    border-color: transparent;' . "\r\n" . '}' . "\r\n\r\n" . '.nav.navbar-nav.navbar-left.main-icon li:hover {' . "\r\n" . '    background-color:  ';
echo $secondaryColor;
echo ';' . "\r\n" . '    transition: 0.3s;' . "\r\n" . '    ' . "\r\n" . '}' . "\r\n\r\n" . '.channel-list ul li.playingChanel {' . "\r\n" . '    background: ';
echo $secondaryColor;
echo ';' . "\r\n" . '}' . "\r\n\r\n" . '.r-li:hover  {' . "\r\n" . '    transition: 0.3s;' . "\r\n" . '    /*border-bottom: solid 2px ';
echo $secondaryColor;
echo ' !important*/;' . "\r\n" . '}' . "\r\n\r\n" . '.main-icon li.active a {' . "\r\n\t" . 'border-bottom: solid 2px ';
echo $secondaryColor;
echo ';' . "\r\n" . '}' . "\r\n\r\n" . '.cat-toggle {' . "\r\n\t" . 'background: ';
echo $secondaryColor;
echo ';' . "\r\n" . '}';

?> 
