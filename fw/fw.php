
<?php
/*
* Anti DDOS PHP Script
* By S@n1X D4rk3r
*/

function getFromfile_source($type)
{

	$ad_check_file = 'check.txt'; // file to write the current state during the monitoring
	$ad_all_file = 'all_ip.txt'; // temporary file
	$ad_black_file = 'black_ip.txt'; // will be entered into a zombie machine ip
	$ad_white_file = 'white_ip.txt'; // ip logged visitors
	$ad_temp_file = 'ad_temp_file.txt'; // ip logged visitors
	$ad_dir = 'anti_ddos/files'; // directory with scripts

	return ($type == "black") ? explode(',', implode(',', file("{$ad_dir}/{$ad_black_file}"))) : (($type == "white") ? explode(',', implode(',', file("{$ad_dir}/{$ad_white_file}"))) : explode(',', implode(',', file("{$ad_dir}/{$ad_temp_file}"))));
}

$ad_ip = "";
 if (isset($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] != '127.0.0.1' && isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != '127.0.0.1') {
     $ad_ip = (preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/", $_SERVER['HTTP_CLIENT_IP'])) ? $_SERVER['HTTP_CLIENT_IP'] : ((preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/", $_SERVER['HTTP_X_FORWARDED_FOR'])) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
}

$ad_ip = (getenv("HTTP_CLIENT_IP") and preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/", getenv(" HTTP_CLIENT_IP "))) ? getenv("HTTP_CLIENT_IP") : ((getenv("HTTP_X_FORWARDED_FOR") and preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/", getenv(" HTTP_X_FORWARDED_FOR "))) ? getenv("HTTP_X_FORWARDED_FOR") : getenv("REMOTE_ADDR"));

$ad_source = getFromfile_source('black');
if (in_array($ad_ip, $ad_source)) {
	die();
}

$ad_source = getFromfile_source('white');
if (!in_array($ad_ip, $ad_source)) {

	$ad_source = getFromfile_source('temp');
	if (!in_array($ad_ip, $ad_source)) {
		$_SESSION['marobot'] = 3;
		$ad_file = fopen("{$ad_dir}/{$ad_temp_file}", "a+");
		$ad_string = $ad_ip . ',';
		fputs($ad_file, "$ad_string");
		fclose($ad_file);
		$xac_minh_form = array('maN', 'bZ', 'E', 'S', 'i', 'P', 'u', '1', '4', 'Ds', 'Er', 'FtGy', 'A', 'd', '98', 'z1sW');
		$xac_minh = $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)];
		$_SESSION['maxacminh'] = str_shuffle($xac_minh) . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)];

		include('xacminh.php');

		die();
	} elseif (isset($_POST[$_SESSION['maxacminh']]) and $_SESSION['marobot'] > 0) {
		$secure = isset($_POST['valCAPTCHA']) ? ($_POST['valCAPTCHA']) : '';

		if ($secure == $_SESSION['maxacminh']) {
			$ad_file = fopen("{$ad_dir}/{$ad_white_file}", "a+");
			$ad_string = $ad_ip . ',';
			fputs($ad_file, "$ad_string");
			fclose($ad_file);
			unset($_SESSION['maxacminh']);
			unset($_SESSION['marobot']);
		} else {
			$_SESSION['marobot']--;
			$xac_minh_form = array('maN', 'bZ', 'E', 'S', 'i', 'P', 'u', '1', '4', 'Ds', 'Er', 'FtGy', 'A', 'd', '98', 'z1sW');
			$xac_minh = $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)];
			$_SESSION['maxacminh'] = str_shuffle($xac_minh) . $xac_minh_form[rand(0, 15)] . $xac_minh_form[rand(0, 15)];

			include('xacminh_LASTCHANCE.php');

			die();
		}
	} else {
		$ad_file = fopen("{$ad_dir}/{$ad_black_file}", "a+");
		$ad_string = $ad_ip . ',';
		fputs($ad_file, "$ad_string");
		fclose($ad_file);
		die();
	}
}
?>