<?php
@session_start();
//config 

$ip_sv = "localhost";
$dbname_sv = "god99";
$user_sv = "root";
$pass_sv = "";

//GMT +7

date_default_timezone_set('Asia/Ho_Chi_Minh');

// Create connection

$conn = new mysqli($ip_sv, $user_sv, $pass_sv, $dbname_sv);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// API TheSieuRe.com

$url = 'https://thesieure.com/chargingws/v2';
$partner_id = '9713109261';
$partner_key = 'fc8319cbda67533104d0e92d6a84a4fa';