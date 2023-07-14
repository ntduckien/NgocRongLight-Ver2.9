<?php
if (isset($_GET['url'])) {
   require_once('api.php');
}
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
include_once 'set.php';
include_once 'head.php';

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
   <!-- <title>Ngọc Rồng Light</title> -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/all.min.css" />
   <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/c79383dd6c.js" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
   <link rel="icon" href="/img/nro.png" type="image/png">
   <script src="assets/js/app.js" type="text/javascript"></script>
   <link rel="stylesheet" href="./assets/css/app.css">
   <link rel="stylesheet" href="./assets/css/dashboard.css">
   <link rel="stylesheet" href="./assets/css/all.min.css">
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap"
      rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="assets/js/main.js" type="text/javascript"></script>
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
         <a class="navbar-brand" href="/index">
            <img src="img/nro.png" alt="Quản Lý Tài Khoản  - Ngọc Rồng Light">
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
                           <a class="dropdown-item" href="profile">Trang Cá Nhân</a>
                           <a class="dropdown-item" href="admin/paneladmin">Dashboard Admin</a>
                           <a class="dropdown-item" href="security">Bảo Mật</a>
                           <a class="dropdown-item" href="tai-ve">Tải Game</a>
                           <a class="dropdown-item" href="nap-tien">Nạp Tiền</a>
                           <a class="dropdown-item" href="history">Lịch Sử Giao Dịch</a>
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
               <a class="nav-link" href="/index">
                  <i class="fas fa-home"></i>&nbsp;Trang Chủ
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/profile">
                  <i class="fas fa-user me-2"></i>&nbsp;Thông tin tài khoản
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="security">
                  <i class="fas fa-lock"></i>&nbsp;Bảo mật
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="tai-ve">
                  <i class="fas fa-download"></i>&nbsp;Tải Game
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="nap-tien">
                  <i class="fas fa-wallet"></i>&nbsp;Nạp Tiền
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="dien-dan">
                  <i class="fas fa-wallet"></i>&nbsp;Diễn Đàn
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="history">
                  <i class="fas fa-history"></i>&nbsp;Lịch sử giao dịch
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="/?out">
                  <i class="fas fa-sign-out-alt"></i>&nbsp;Đăng xuất
               </a>
            </li>
         </ul>
      </nav>
   </div>
   <script
      type="text/javascript">$(document).ready(function () { $(".left-menu-btn-control").click(function () { $("#left-menu").toggleClass("menu-closed") }) });</script>
   <div class="container py-3">
      <main>
         <section class="text-center container">
            <div class="row py-md-3">
               <div class="col-lg-6 col-md-8 mx-auto">
                  <br><br><br>
                  <h2 class="fw-light">Ngọc Rồng Light</h2>
                  <?php if ($_login == null) { ?>
                     <p class="lead text-muted">
                        Đăng ký tài khoản nhận quà tân thủ và nhiều phần thưởng hấp dẫn.
                     </p>
                     <nav class="my-2 my-md-0 mr-md-3">
                        <a class="btn btn-outline-primary" href="/login" style="font-weight:500">Đăng nhập</a>
                        <a class="btn btn-outline-primary" href="/register" style="font-weight:500">Đăng ký</a>
                     <?php } else { ?>
                        <?php
                        if ($_status == "0") {
                           echo '<div "lead text-muted">Mở Tính Năng Giao Dịch, Thách Đấu <a href="/mothanhvien">Nhấn Vào Đây</a> (Phí: 20,000 VND = 20,000 VND).</div>';
                        } elseif ($_status == "-1") {
                           echo '<div "lead text-muted">Tài khoản đang bị khóa, để mở lại bạn cần phải <a href="/active">hóa tài khoản</a> (Phí: 20,000 VND = 20,000 VND).</div>';
                        } elseif ($_status == "1") {
                           echo '<div "lead text-muted">Bạn Đã Nạp Lần Đầu Rồi Hihi :3</div>';
                        }
                        ?>
                     <?php } ?>
               </div>
            </div>
            <div class="center">
               <div class="title-behavior">
                  <marquee behavior="scroll" direction="left">Chào mừng bạn đến với máy chủ Ngọc Rồng Light, Đội
                     ngũ
                     Admin chúc các bạn có những trải nghiệm tuyệt vời khi tham gia vào máy chủ của Light
                  </marquee>
               </div>
            </div>
            <style>
               .center {
                  display: flex;
                  justify-content: center;
                  align-items: center
               }

               .title-behavior {
                  width: 50%
               }
            </style>
         </section>
         <div class="row g-4 py-4 row-cols-1 row-cols-md-4">
            <div class="col d-flex align-items-stretch">
               <div class="feature-box">
                  <div class="text-dark">
                     <i class="fa fa-sharp fa-solid fa-coins"></i>
                  </div>
                  <br>
                  <div>
                     <a href="nap-tien" class="feature-title">Nạp Coin</a>
                     <p>Thanh toán hoàn toàn tự động, xử lý nhanh sau 1 - 5 phút.</p>
                     <a href="nap-tien" class="btn btn-primary">
                        Nạp ngay
                     </a>
                  </div>
               </div>
            </div>
            <div class="col d-flex align-items-stretch">
               <div class="feature-box">
                  <div class="text-dark">
                     <i class="fa fa-sharp fa-solid fa-trophy"></i>
                  </div>
                  <br>
                  <div>
                     <a href="danh-sach-top" class="feature-title">TOP Máy Chủ</a>
                     <p>Kiểm Tra các mục top trong máy chủ</p>
                     <br>
                     <a href="danh-sach-top" class="btn btn-primary">
                        Xem ngay
                     </a>
                  </div>
               </div>
            </div>
            <div class="col d-flex align-items-stretch">
               <div class="feature-box">
                  <div class="text-dark">
                     <i class="fas fa-user-shield"></i>
                  </div>
                  <br>
                  <div>
                     <a href="security" class="feature-title">Bảo Mật</a>
                     <p>Bảo mật tài khoản để tránh các vấn đề rủi ro.</p>
                     <br>
                     <a href="security" class="btn btn-primary">
                        Xem ngay
                     </a>
                  </div>
               </div>
            </div>
            <div class="col d-flex align-items-stretch">
               <div class="feature-box">
                  <div class="text-dark">
                     <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                  <br>
                  <div>
                     <a href="danh-sach-huong-dan" class="feature-title">Tiện Ích</a>
                     <p>Tiện ích của máy chủ bao gồm hướng dẫn, tính năng.</p>
                     <a href="danh-sach-huong-dan" class="btn btn-primary">
                        Mở ngay
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="alert alert-warning" style="background-color:#fdf8da">
            <div class="topic_name">
               <div style="width:55px;float:left;margin-right:10px">
                  <b data-bs-toggle="modal" data-bs-target="#exampleModal">
                     <img src="/img/avatar1.png" style="border-color:red;width:50px;height:55px">
               </div>
               <a id="modal-body">Nạp Thẻ Tích Lũy </a><img src="./img/tich-xanh.png" width="17" height="17">
               </b>
               <div class="box_name_eman">bởi <b><b>
                        <font style="color:red">ADMIN</font>
                     </b></b> - <span> Xem chi tiết tại đây !!! </span>
               </div>
            </div>
         </div>
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Nạp Thẻ Tích Lũy</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="#modal-body">
                     <div class="box_ndung_bviet"><b>CHƯA CẬP NHẬT.....</b><br>
                        <br>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
               </div>
            </div>
         </div>
      </main>
      <script src="assets/js/jquery.form.min.js"></script>
      <script src="assets/js/clipboard.min.js"></script>
      <script src="assets/js/jquery.dataTables.min.js"></script>
      <?php
      include_once 'end.php';
      ?>
   </div>
</body>