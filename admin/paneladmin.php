<?php
include_once 'adminset.php';
include_once '../connect.php';

// Rest of the code
$_active = (isset($_active)) ? $_active : null;
$_tcoin = (isset($_tcoin)) ? $_tcoin : 0;


$id_user = "SELECT COUNT(id) AS id FROM account";
$user = mysqli_query($conn, $id_user);

if ($user) {
   $row_user = mysqli_fetch_assoc($user);
   $id = $row_user['id'];
} else {
   echo "Lỗi truy vấn SQL: " . mysqli_error($conn);
   exit;
}

$result = _select("COUNT(*) as ban", "account", "ban = 1");
$row = _fetch($result);
$_tongban = $row["ban"];

$result2 = _select("COUNT(*) as active", "account", "active = 1");
$row = _fetch($result2);
$_tongactive = $row["active"];

$sql = "SELECT COUNT(*) AS recaf FROM account WHERE recaf IS NOT NULL";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$_recaf = $row['recaf'];

function get_user_ip()
{
   if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $addr = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
      return trim($addr[0]);
   } else {
      return $_SERVER['REMOTE_ADDR'];
   }
}
?>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport"
      content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no, shrink-to-fit=no">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="csrf-token" content="jg0aMEdvyglZMgqfTAyPbDwjsNPofmw8mMCwvwnW">
   <meta name="app.content_locale" content="vi">
   <meta name="app.env" content="production">
   <meta name="app.lang" content="vi">
   <meta name="robots" content="index,follow" />
   <meta name="revisit-after" content="1 days">
   <title>Dashboard Admin - Ngọc Rồng Light</title>
   <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../assets/css/all.min.css" />
   <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5.min.css">
   <script src="../assets/js/jquery.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/c79383dd6c.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
   <link rel="icon" href="/img/nro.png" type="image/png">
   <script src="../assets/js/app.js" type="text/javascript"></script>
   <link rel="stylesheet" href="../assets/css/app.css">
   <link rel="stylesheet" href="../assets/css/dashboard.css">
   <link rel="stylesheet" href="../assets/css/all.min.css">
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap"
      rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="../assets/js/main.js" type="text/javascript"></script>
   <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-FBRLPP0PX2"></script>
   <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments) } gtag("js", new Date()); gtag("config", "G-FBRLPP0PX2");</script>
</head>
<script
   type="text/javascript">/*<![CDATA[*/$(document).ready(function () { if ($(window).width() <= 500) { $(".dashboard").addClass("menu-closed") } else { $(".dashboard").removeClass("menu-closed") } });/*]]>*/</script>
<style>
   .btn-primary {
      border-color: #f44336 !important;
      color: #fff !important
   }

   .border-primary {
      border-color: #f44336 !important
   }

   .bg-primary,
   .btn-primary {
      background-color: #f44336 !important
   }

   .btn-outline-primary:hover {
      background-color: #f44336;
      border-color: #f44336
   }

   .btn-outline-primary {
      color: #f44336;
      border-color: #f44336
   }

   .feature-box {
      padding: 38px 30px;
      position: relative;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 0 29px 0 rgb(18 66 101 / 8%);
      transition: all .3s ease-in-out;
      border-radius: 8px;
      z-index: 1;
      width: 100%
   }

   .feature-icon {
      font-size: 1.8em;
      margin-bottom: 1rem
   }

   .feature-title {
      font-size: 1.2em;
      font-weight: 500;
      padding-bottom: .25rem;
      text-decoration: none;
      color: #212529
   }

   .list-group-item.active {
      background-color: #f44336;
      border-color: #f44336
   }

   a {
      text-decoration: none
   }

   .nav-pills .nav-link.active,
   .nav-pills .show>.nav-link {
      background-color: #f44336
   }

   .nav-link {
      color: #f44336
   }

   .nav-link:focus,
   .nav-link:hover {
      color: #cd3a2f
   }

   .copy-text {
      cursor: pointer
   }

   .fa {
      font-size: 1.5em
   }

   .fas {
      font-size: 1.5em
   }
</style>
<script type="text/javascript">$(document).ready(function () { $(".dropdown-toggle").dropdown() });</script>

<body class="dashboard">
   <header class="navbar navbar-expand-md navbar-light bg-white fixed-top">
      <div class="container-fluid">
         <a class="navbar-brand" href="../index">
            <img src="../img/nro.png" alt="Quản Lý Tài Khoản  - Ngọc Rồng Light">
         </a>
         <button class="navbar-toggler left-menu-btn-control" type="button" data-toggle="collapse"
            data-target="#left-menu" aria-controls="left-menu" aria-expanded="false" aria-label="Left menu navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"> </ul>
            <ul class="navbar-nav ml-auto align-items-center">
               <li class="nav-item dropdown user-action-header ms-3">
                  <?php if ($_login == null) { ?>
                     <a class="nav-link" href="/login">
                        Đăng nhập
                        <i class="fas fa-sign-in-alt" style="font-weight:bold;color:#343a40;margin-right:5px"></i>
                     </a>
                  <?php } else {
                     if ($_admin == 1) { // Kiểm tra quyền truy cập
                        ?>
                     <li class="nav-item">
                        <i class="fas fa-coin" style="font-weight:bold;color:#343a40;margin-right:5px"></i>
                        <span style="color:#343a40">
                           <?php echo number_format($_coin); ?> VND
                        </span>
                     </li>
                     <div class="dropdown">
                        <a id="navbarDropdown dropdown-toggle" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-user me-2" style="font-weight"></i>
                           <?php echo $_username; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="../profile">Trang Cá Nhân</a>
                           <a class="dropdown-item" href="admin/paneladmin">Dashboard Admin</a>
                           <a class="dropdown-item" href="../security">Bảo Mật</a>
                           <a class="dropdown-item" href="../tai-ve">Tải Game</a>
                           <a class="dropdown-item" href="../nap-tien">Nạp Tiền</a>
                           <a class="dropdown-item" href="../history">Lịch Sử Giao Dịch</a>
                           <a class="dropdown-item" href="/?out">Đăng xuất</a>
                        </div>
                     </div>
                  <?php } else { ?>
                     <li class="nav-item">
                        <i class="fas fa-coin" style="font-weight:bold;color:#343a40;margin-right:5px"></i>
                        <span style="color:#343a40">
                           <?php echo number_format($_coin); ?> VND
                        </span>
                     </li>
                     <div class="dropdown">
                        <a id="navbarDropdown dropdown-toggle" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-user me-2" style="font-weight"></i>
                           <?php echo $_username; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="profile">Trang Cá Nhân</a>
                           <a class="dropdown-item" href="security">Bảo Mật</a>
                           <a class="dropdown-item" href="tai-ve">Tải Game</a>
                           <a class="dropdown-item" href="nap-tien">Nạp Tiền</a>
                           <a class="dropdown-item" href="history">Lịch Sử Giao Dịch</a>
                           <a class="dropdown-item" href="/?out">Đăng xuất</a>
                        </div>
                     </div>
                     <?php
                     }
                  }
                  ?>

               </li>
            </ul>
         </div>
      </div>
   </header>
   <div class="container-fluid account-container">
      <nav class="left-menu">
         <ul class="nav flex-column dashboard-menu-left">
            <li class="nav-item">
               <a class="nav-link" href="../index">
                  <i class="fas fa-home"></i>&nbsp;Trang Chủ
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="paneladmin">
                  <i class="fas fa-user-cog"></i>&nbsp;Dashboard Admin
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="ban">
                  <i class="fas fa-user-lock"></i>&nbsp;Khoá Tài Khoản
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="unban">
                  <i class="fas fa-unlock"></i>&nbsp;Mở Khoá Tài Khoản
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="chiso">
                  <i class="fas fa-user-cog"></i>&nbsp;Cộng Chỉ Số
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="addvnd">
                  <i class="fas fa-user-plus"></i>&nbsp;Cộng Tiền
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="activethanhvien">
                  <i class="fas fa-user-check"></i>&nbsp;Kích Hoạt Thành Viên
               </a>
            </li>
         </ul>
      </nav>
   </div>
   <script
      type="text/javascript">$(document).ready(function () { $(".left-menu-btn-control").click(function () { $("#left-menu").toggleClass("menu-closed") }) });</script>
   <main class="main">
      <div class="container">
         <div class="dashboard-container">
            <div class="dashboard-content">
               <div class="profile-page settings dashboard-panel">
                  <h2 class="heading">Thông Tin Máy Chủ</h2>
                  <ul class="settings-list">
                     <li class="setting-item">
                        <div class="row info">
                           <div class="col-3">
                              <b>Tổng Tài Khoản Đã Tạo:</b>
                           </div>
                           <div class="col-5">
                              <?php echo $id; ?>
                           </div>
                        </div>
                     </li>
                     <li class="setting-item">
                        <div class="row info">
                           <div class="col-3">
                              <b>Tài Khoản Mở Thành Viên :</b>
                           </div>
                           <div class="col-5">
                              <?php echo $_tongactive; ?> Thành Viên
                           </div>
                        </div>
                     </li>
                     <li class="setting-item">
                        <div class="row info">
                           <div class="col-3">
                              <b>Tài Khoản Ban :</b>
                           </div>
                           <div class="col-5">
                              <?php echo $_tongban; ?> Tài Khoản
                           </div>
                        </div>
                     </li>
                     <li class="setting-item">
                        <div class="row info">
                           <div class="col-3">
                              <b>Số Người Nhập Mã Giới Thiệu :</b>
                           </div>
                           <div class="col-5">
                              <!-- <strong> -->
                              <?php echo $_recaf; ?> Người
                              <!-- </strong> -->
                           </div>
                        </div>
                     </li>
                     <br>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php
      include_once '../end.php';
      ?>
      </div>
</body>