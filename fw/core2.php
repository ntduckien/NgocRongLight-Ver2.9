<?php

// Kiểm tra và khởi động phiên làm việc nếu chưa được khởi động
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

function getIp()
{
  $ip = $_SERVER['REMOTE_ADDR'];
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  return $ip;
}

function getOS()
{
  if (PHP_OS_FAMILY == 'Windows') {
    return "Windows";
  }
  if (PHP_OS_FAMILY == 'Linux') {
    return "Linux";
  }
}

$cookie = isset($_COOKIE["FireWallUpdateByNguyenDucKien"]) ? $_COOKIE["FireWallUpdateByNguyenDucKien"] : null;
$othercookie = isset($_COOKIE["AnotherFireWall"]) ? $_COOKIE["AnotherFireWall"] : null;

if ($cookie && $othercookie > 0) {
  $iptime = 20;
} else {
  $iptime = 10; 
}

$ippenalty = 60;

if ($cookie && $othercookie > 0) {
  $ipmaxvisit = 30;
} else {
  $ipmaxvisit = 20;
}

$user_ip = getIp();
$user_os = getOS();
$iplogdir = "files/";
$iplogfile = "log.dat";
$ipfile = substr(md5($_SERVER["REMOTE_ADDR"]), -2);

$oldtime = 0;

if (file_exists($iplogdir . $ipfile)) {
  $oldtime = filemtime($iplogdir . $ipfile);
}

$time = time();

if ($oldtime < $time) {
  $oldtime = $time;
}

$newtime = $oldtime + $iptime;

function AppendToFile($filename, $data)
{
  $handle = fopen($filename, 'a');

  if ($handle === false) {
    return;
  }

  fwrite($handle, $data . "\n");
  fclose($handle);
}


if ($newtime >= $time + $iptime * $ipmaxvisit) {
  AppendToFile($iplogdir . $ipfile, $time + $iptime * ($ipmaxvisit - 1) + $ippenalty);
  $oldref = $_SERVER['HTTP_REFERER'];
  header("HTTP/1.0 503 Service Temporarily Unavailable");
  header("Connection: close");
  header("Content-Type: text/html");

  include('xacminh.php');

  // Truyền giá trị $newtime vào hàm AppendToFile()
  AppendToFile($iplogdir . $ipfile, $newtime);
  $fp = fopen($iplogdir . $iplogfile, "a");
  $yourdomain = $_SERVER['HTTP_HOST'];

  if ($fp) {
    $useragent = "<unknown user agent>";
    if (isset($_SERVER["HTTP_USER_AGENT"])) {
      $useragent = $_SERVER["HTTP_USER_AGENT"];
    }

    fputs($fp, $_SERVER["REMOTE_ADDR"] . " " . date("d/m/Y H:i:s") . " " . $useragent . "\n");
    fclose($fp);
    $yourdomain = $_SERVER['HTTP_HOST'];
  }

  exit();
} else {
  $_SESSION['reportedflood'] = 0;
}

AppendToFile($iplogdir . $ipfile, $newtime);