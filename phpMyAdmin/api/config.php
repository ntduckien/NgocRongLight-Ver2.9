<?php
	$apikey = '12C5A9C4748ACB61E91783A5276F7259'; //API key, lấy từ website thesieutoc.net thay vào trong cặp dấu ''
	// database Mysql config
	$local_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$name_db = "hentaiz";
	# đừng đụng vào 
  $conn = new mysqli($local_db, $user_db, $pass_db, $name_db);
  $conn->set_charset("utf8");
    
?>
