<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*============================================
============================================*/
date_default_timezone_set("Asia/Ho_Chi_Minh");
echo date_default_timezone_get();
/*============================================
============================================*/
echo "Date: </br>";
echo $date = date("Y-m-d h:i:s");
echo "</br>";
echo "Unix: </br>";
echo $unix = human_to_unix($date);
echo "</br>";
/*============================================
============================================*/
echo "now(): ". now() ."</br>";
/*============================================
============================================*/
$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
$time = time();
echo "mdate(): ". mdate($datestring, $unix) ."</br>";
/*
*/
$format = 'DATE_RFC822';
$time = time();

echo "standard_date(): ". standard_date($format, $time) ."</br>";
/*
*/
$post_date = '1079621429';
$now = time();

echo "timespans(): ". timespan($post_date, $now) ."</br>";
/*
*/
echo "timezones(): ". timezones('UP7') ."</br>";
/*
*/
$timestamp = now();
$timezone = 'UP7';
$daylight_saving = FALSE;

echo "gmt_to_local(): ". gmt_to_local($timestamp, $timezone, $daylight_saving) ."</br>";
/*
*/
$now = time();

$gmt = local_to_gmt($now);
/*============================================
============================================*/
echo timezone_menu('UP7');