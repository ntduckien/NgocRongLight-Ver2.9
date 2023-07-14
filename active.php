<?php
include_once 'set.php';
$_title = "NGỌC RỒNG LIGHT - Thanh toán";
include_once 'head.php';

$mysqli = new mysqli("localhost", "root", "", "god99");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

if ($_login == null) {
	header("Location: /");
	exit();
}

if ($_status == '1') {
	echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Thất bại", text: "Tài khoản của bạn đã được kích hoạt!", icon: "error", button: "OK"})});</script>';
} elseif ($_status == '0' && $_coin < 20000) {
	echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Số dư không đủ", text: "Bạn không đủ 20.000 KCoin. Vui lòng nạp thêm tiền vào tài khoản để kích hoạt nhé!", icon: "error", button: "OK"})});</script>';
} elseif ($_status == '-1' && $_coin < 20000) {
	echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Số dư không đủ", text: "Bạn không đủ 20.000 KCoin. Vui lòng nạp thêm tiền vào tài khoản để mở lại tài khoản!", icon: "error", button: "OK"})});</script>';
} elseif (($_status == '0' || $_status == '-1') && $_coin >= 20000) {
	$coin = $_coin - 20000;
	$stmt = $mysqli->prepare('UPDATE account SET active = 1, vnd = ? WHERE username = ?');
	$stmt->bind_param('is', $coin, $_username);
	if ($stmt->execute()) {
		if ($stmt->affected_rows > 0) {
			if ($_status == '0') {
				echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Thành công", text: "Kích hoạt tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game!", icon: "success", button: "OK"})});</script>';
			} elseif ($_status == '-1') {
				echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Thành công", text: "Mở khóa tài khoản thành công. Bây giờ bạn đã có thể đăng nhập vào game!", icon: "success", button: "OK"})});</script>';
			}
		} else {
			echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Thất bại", text: "Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!", icon: "error", button: "OK"})});</script>';
		}
	} else {
		echo '<script type="text/javascript">$(document).ready(function(){swal({title: "Thất bại", text: "Có lỗi gì đó xảy ra. Vui lòng liên hệ Admin!", icon: "error", button: "OK"})});</script>';
	}
	header('Location:/mothanhvien.php');
	exit();
} else {
	// Handle other cases (optional)
}

include_once 'mothanhvien.php';
?>