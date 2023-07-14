<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
/** 
 *  FireWall By Nguyễn Đức Kiên
 *  @author ntduc <ntduckien@gmail.com>
 */

function safe_print($value)
{
	$value .= "";
	return strlen($value) > 1 && (strpos($value, "0") !== false) ? ltrim($value, "0") : (strlen($value) == 0 ? "0" : $value);
}
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['standby'])) {

	// There is all your configuration
	$_SESSION['standby'] = $_SESSION['standby'] + 1;

	$ad_ddos_query = 5;
	$ad_check_file = 'check.txt';
	$ad_all_file = 'all_ip.txt';
	$ad_white_file = 'white_ip.txt';
	$ad_black_file = 'black_ip.txt'; //hoặc bất kỳ giá trị khác tương ứng với tên file cần tạo
	$ad_temp_file = 'ad_temp_file.txt';
	$ad_dir = 'fw/files';
	$ad_num_query = 0;
	$ad_sec_query = 0;
	$ad_end_defense = 0;
	$ad_sec = date("s");
	$ad_date = date("is");
	$ad_defense_time = 100;


	$config_status = "";
	function Create_File($the_path, $ad)
	{
		if (!file_exists($ad))
			mkdir($ad, 0755, true);
		$handle = fopen($the_path, 'a+') or die('Cannot create file:  ' . $the_path);
		return "Creating " . $the_path . " .... done";
	}



	$config_status .= (!file_exists("{$ad_dir}/{$ad_check_file}")) ? Create_File("{$ad_dir}/{$ad_check_file}", $ad_dir) : "ERROR: Creating " . "{$ad_dir}/{$ad_check_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_temp_file}")) ? Create_File("{$ad_dir}/{$ad_temp_file}", $ad_dir) : "ERROR: Creating " . "{$ad_dir}/{$ad_temp_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_black_file}")) ? Create_File("{$ad_dir}/{$ad_black_file}", $ad_dir) : "ERROR: Creating " . "{$ad_dir}/{$ad_black_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_white_file}")) ? Create_File("{$ad_dir}/{$ad_white_file}", $ad_dir) : "ERROR: Creating " . "{$ad_dir}/{$ad_white_file}<br>";
	$config_status .= (!file_exists("{$ad_dir}/{$ad_all_file}")) ? Create_File("{$ad_dir}/{$ad_all_file}", $ad_dir) : "ERROR: Creating " . "{$ad_dir}/{$ad_all_file}<br>";

	if (!file_exists("{$ad_dir}/../fw.php")) {
		$config_status .= "fw.php doesn't exist!";
	}

	if (
		!file_exists("{$ad_dir}/{$ad_check_file}") or
		!file_exists("{$ad_dir}/{$ad_temp_file}") or
		!file_exists("{$ad_dir}/{$ad_black_file}") or
		!file_exists("{$ad_dir}/{$ad_white_file}") or
		!file_exists("{$ad_dir}/{$ad_all_file}") or
		!file_exists("{$ad_dir}/../fw.php")
	) {

		$config_status .= "Some files doesn't exist!";
		die($config_status);
	}

	require("{$ad_dir}/{$ad_check_file}");

	if ($ad_end_defense and $ad_end_defense > $ad_date) {
		require("{$ad_dir}/../fw.php");
	} else {
		$ad_num_query = ($ad_sec == $ad_sec_query) ? $ad_num_query++ : '1';
		$ad_file = fopen("{$ad_dir}/{$ad_check_file}", "w");

		$ad_string = ($ad_num_query >= $ad_ddos_query) ? '<?php $ad_end_defense=' . safe_print($ad_date + $ad_defense_time) . '; ?>' : '<?php $ad_num_query=' . safe_print($ad_num_query) . ';?>';

		fputs($ad_file, $ad_string);
		fclose($ad_file);
	}
} else {

	$_SESSION['standby'] = 1;
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	header("Refresh: 3, " . $actual_link);
	?>
	<style>
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.loader-wrapper {
			position: relative;
			align-self: center;
			width: 80px;
			height: 80px;
			top: -10%;
			left: 12%;
		}

		.loader {
			box-sizing: border-box;
			width: 100%;
			height: 100%;
			border: 10px solid #162534;
			border-top-color: #4bc8eb;
			border-bottom-color: #f13a8f;
			border-radius: 50%;

			animation: rotate 5s linear infinite;
		}

		.loader-inner {
			border-top-color: #36f372;
			border-bottom-color: #fff;
			animation-duration: 2.5s;
		}

		@keyframes rotate {
			0% {
				transform: scale(1) rotate(360deg);
			}

			50% {
				transform: scale(.8) rotate(-360deg);
			}

			100% {
				transform: scale(1) rotate(360deg);
			}
		}

		.loading__msg {
			font-family: Roboto;
			font-size: 16px;
			text-align: center;
			margin-top: 20px;
		}
	</style>

	<div class="container">
		<div class="loader-wrapper">
			<div class="loader-inner">
				<div class="loader"></div>
			</div>
		</div>
		<div class="loading__msg">
			<b style="font-size: 22px;">
				<a href="https://zalo.me/0981374169" target="_blank" style="color: black;">FIREWALL</a> is checking....
			</b>
			<br><br>
			Xin chào, đây là một xác minh bảo mật đơn giản để bảo mật trang;<br> Trang chủ sẽ sớm xuất hiện!
			<br> FireWall được nâng bởi
			<a href="https://zalo.me/0981374169" target="_blank">Nguyễn Đức Kiên</a>
		</div>
	</div>

	<?php exit();
}
?>