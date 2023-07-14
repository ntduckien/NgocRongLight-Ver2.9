<?php
$_title = "Top sức mạnh";
// include_once 'head.php';
include_once 'config.php';
include_once 'set.php';
include('head.php');

$alert = isset($alert) ? $alert : null;
?>
<!DOCTYPE html>
<html lang=vi>
<meta http-equiv=content-type content="text/html;charset=UTF-8" />

<head>
   <meta charset=utf-8>
   <meta http-equiv=X-UA-Compatible content="IE=edge">
   <meta name=viewport
      content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no, shrink-to-fit=no">
   <meta name=apple-mobile-web-app-capable content=yes>
   <meta name=csrf-token content=jg0aMEdvyglZMgqfTAyPbDwjsNPofmw8mMCwvwnW>
   <meta name=app.content_locale content=vi>
   <meta name=app.env content=production>
   <meta name=app.lang content=vi>
   <meta name=robots content=index,follow />
   <meta name=revisit-after content="1 days">
   <title>Ngọc Rồng Light</title>
   <link href=assets/css/bootstrap.min.css rel=stylesheet>
   <link rel=stylesheet href=assets/css/all.min.css />
   <link rel=stylesheet href=assets/css/dataTables.bootstrap5.min.css>
   <script src=assets/js/jquery.min.js></script>
   <script src=assets/js/bootstrap.min.js></script>
   <script src=https://kit.fontawesome.com/c79383dd6c.js crossorigin=anonymous></script>
   <script src=http://cdn.jsdelivr.net/npm/sweetalert2@11></script>
   <script src=https://kit.fontawesome.com/c79383dd6c.js crossorigin=anonymous></script>
   <script src=https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js></script>
   <link rel=stylesheet href=https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css>
   <link rel=icon href=/img/nro.png type=image/png>
   <script src=assets/js/app.js type=text/javascript></script>
   <link rel=stylesheet href=./assets/css/app.css>
   <link rel=stylesheet href=./assets/css/dashboard.css>
   <link rel=stylesheet href=./assets/css/all.min.css>
   <script src=https://unpkg.com/sweetalert/dist/sweetalert.min.js></script>
   <link rel=stylesheet href=https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css>
   <script src=https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js></script>
   <link rel=stylesheet href=https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css>
   <link rel=stylesheet href=https://use.fontawesome.com/releases/v5.3.1/css/all.css crossorigin=anonymous>
   <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>
   <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css />
   <script src=https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js></script>
   <script src=https://kit.fontawesome.com/c79383dd6c.js crossorigin=anonymous></script>
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap"
      rel=stylesheet>
   <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js></script>
   <script src=https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js></script>
   <script src=assets/js/main.js type=text/javascript></script>
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-FBRLPP0PX2"></script>
   <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments) } gtag("js", new Date()); gtag("config", "G-FBRLPP0PX2");</script>
</head>
<script
   type=text/javascript>$(document).ready(function(){if($(window).width()<=500){$(".dashboard").addClass("menu-closed")}else{$(".dashboard").removeClass("menu-closed")}});</script>
<script type=text/javascript>$(document).ready(function(){$(".dropdown-toggle").dropdown()});</script>
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

<body class=dashboard>
   <header class="navbar navbar-expand-md navbar-light bg-white fixed-top">
      <div class=container-fluid>
         <a class=navbar-brand href=/index>
            <img src=img/nro.png alt="Quản Lý Tài Khoản  - Ngọc Rồng Light">
         </a>
         <button class="navbar-toggler left-menu-btn-control" type=button data-toggle=collapse data-target=#left-menu
            aria-controls=left-menu aria-expanded=false aria-label="Left menu navigation">
            <span class=navbar-toggler-icon></span>
         </button>
         <div class="collapse navbar-collapse" id=navbarSupportedContent>
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
            <li class=nav-item>
               <a class=nav-link href=history>
                  <i class="fas fa-history"></i>&nbsp;Lịch sử giao dịch
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=top-nap>
                  <i class="fa fa-donate"></i>&nbsp;Top Nạp Thẻ
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=top-suc-manh>
                  <i class="fa fa-trophy"></i>&nbsp;Top Sức Mạnh
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=top-ban>
                  <i class="fas fa-user-slash"></i>&nbsp;Bảng Phong Thần
               </a>
            </li>
            <li class=nav-item>
               <a class=nav-link href=/?out>
                  <i class="fas fa-sign-out-alt"></i>&nbsp;Đăng xuất
               </a>
            </li>
         </ul>
      </nav>
   </div>
   <style>
      .center {
         margin-left: 80px;
         margin-right: -250px
      }
   </style>
   <script
      type=text/javascript>$(document).ready(function(){$(".left-menu-btn-control").click(function(){$(".left-menu").toggleClass("menu-closed")})});</script>
   
   <main class="flex-grow-1 flex-shrink-1">
      <script type="text/javascript">new WOW().init();</script>
      <br><br><br>
      <div class="container py-3">
         <center>
            <h3>TOP SỨC MẠNH - MÁY CHỦ 1</h3>
            <p class="text-muted">Bao gồm các sức mạnh đang tồn tại trong máy chủ.</p>
         </center>
         <table class="table">
      </div>
      <div class="py-3 text-center">
         <div class="table-responsive">
            <thead>
               <tr>
                  <th>TOP</th>
                  <th>Nhân vật</th>
                  <th>Hành Tinh</th>
                  <th>Sức Mạnh</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $countTop = 1;
               $data = mysqli_query($config, "SELECT name, gender, CASE WHEN gender = 1 THEN JSON_EXTRACT(data_point, '$[2]') WHEN gender = 2 THEN JSON_EXTRACT(data_point, '$[3]') ELSE JSON_EXTRACT(data_point, '$[1]') END AS second_value FROM player ORDER BY CAST(second_value AS UNSIGNED) DESC LIMIT 10;");

               if (mysqli_num_rows($data) > 0) { // kiểm tra số lượng kết quả trả về
                  while ($row = mysqli_fetch_array($data)) {
                     ?>
                     <tr class=top_<?php echo $countTop; ?>>
                        <td>
                           <?php echo $countTop++; ?>
                        </td>
                        <td>
                           <?php echo htmlspecialchars($row['name']); ?>
                        </td>
                        <td>
                           <?php
                           if ($row['gender'] == 0) {
                              echo "Trái đất";
                           } elseif ($row['gender'] == 1) {
                              echo "Namec";
                           } elseif ($row['gender'] == 2) {
                              echo "Xayda";
                           }
                           ?>
                        </td>
                        <td>
                           <?php
                           if ($row['second_value'] != '') {
                              echo number_format($row['second_value'], 0, ',');
                           } else {
                              echo 'Không có chỉ số sức mạnh';
                           }
                           ?>
                        </td>
                     </tr>
                     <?php
                  }
               } else { // không có kết quả trả về
                  echo '<div class="alert alert-success">Máy Chủ 1 chưa có thông kê bảng xếp hạng!';
               }
               ?>
            </tbody>
            </table>

         </div>
      </div>
   </main>
   <?php
   include_once 'end.php';
   ?>
</body>