<?php
$_title = 'Ngọc Rồng Light - Đổi Mật Khẩu';
// include_once 'head.php';
include_once 'set.php';
include_once 'connect.php';

if ($_login == null) {
   header("location:/login.php");
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
   <title>Ngọc Rồng Light</title>
   <link href="assets/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/all.min.css" />
   <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.min.css">
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/c79383dd6c.js" crossorigin="anonymous"></script>
   <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://kit.fontawesome.com/c79383dd6c.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
   <link rel="icon" href="/img/nro.png" type="image/png">
   <script src="assets/js/app.js" type="text/javascript"></script>
   <link rel="stylesheet" href="./assets/css/app.css">
   <link rel="stylesheet" href="./assets/css/dashboard.css">
   <link rel="stylesheet" href="./assets/css/all.min.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
   <script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
   <link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script src="https://kit.fontawesome.com/c79383dd6c.js" crossorigin="anonymous"></script>

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
      <nav class="left-menu menu-closed">
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
      type="text/javascript">$(document).ready(function () { $(".left-menu-btn-control").click(function () { $(".left-menu").toggleClass("menu-closed") }) });</script>
   <main class="flex-grow-1 flex-shrink-1">
      <br><br><br>
      <div class="container py-3">
         <main>
            <div class="row">
               <div class="col-md-9 pb-3 pt-2">
                  <h3>Thay Đổi Mật Khẩu</h3>
                  <p class="text-muted">Mật khẩu cần có 6 ký tự trở lên, nên sử dụng cả ký tự, chữ cái và số để
                     tăng tính bảo mật
                  </p>
                  <hr>
                  <table class="table">
               </div>
            </div>
            <div class="py-3">
               <div class="table-responsive">
                  <?php
                  $stmt = $conn->prepare("SELECT password, mkc2 FROM account WHERE username=?");
                  $stmt->bind_param("s", $_username);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $row = $result->fetch_assoc();
                  $mkc2 = $row['mkc2'];

                  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                     $password = $_POST['password'] ?? '';
                     $new_password = $_POST['new_password'] ?? '';
                     $new_passwordxacnhan = $_POST['new_password_confirmation'] ?? '';

                     if (!empty($mkc2)) {
                        $passwordcap2 = isset($_POST['passwordcap2']) ? $_POST['passwordcap2'] : '';

                        if (!empty($password) && !empty($new_password) && !empty($new_passwordxacnhan) && !empty($passwordcap2)) {
                           // Cập nhật mật khẩu cấp 2 vào database, thông báo
                           if ($password !== $row['password']) {
                              echo "<div class='alert alert-danger'>Sai mật khẩu hiện tại</div>";
                           } elseif ($passwordcap2 !== $mkc2) {
                              echo "<div class='alert alert-danger'>Sai mật khẩu cấp 2</div>";
                           } elseif ($new_password === $password) {
                              echo "<div class='alert alert-danger'>Mật khẩu mới không được giống mật khẩu hiện tại</div>";
                           } elseif ($new_password !== $new_passwordxacnhan) {
                              echo "<div class='alert alert-danger'>Mật khẩu mới không giống nhau</div>";
                           } else {
                              // Cập nhật mật khẩu cấp 2 lên database
                              $stmt = $conn->prepare("UPDATE account SET password=? WHERE username=?");
                              $stmt->bind_param("ss", $new_password, $_username);

                              if ($stmt->execute()) {
                                 echo "<div class='alert alert-success'>Cập nhật mật khẩu mới thành công</div>";
                              } else {
                                 echo "<div class='alert alert-danger'>Lỗi khi cập nhật mật khẩu cấp 2</div>";
                              }
                           }
                        } else {
                           echo "<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin trong form</div>";
                        }
                     } else {
                        if (!empty($password) && !empty($new_password) && !empty($new_passwordxacnhan)) {
                           // Update mật khẩu cấp 2 mới
                           $stmt = $conn->prepare("UPDATE account SET password=? WHERE username=?");
                           $stmt->bind_param("ss", $new_password, $_username);

                           if ($stmt->execute()) {
                              echo "<div class='alert alert-success'>Tạo mật khẩu mới thành công</div>";
                              $mkc2 = $new_password; // update the value of mkc2 variable after successful creation
                           } else {
                              echo "<div class='alert alert-danger'>Lỗi khi tạo mật khẩu mới</div>";
                           }
                        } else {
                           echo "<div class='alert alert-danger'>Vui lòng điền đầy đủ thông tin trong form</div>";
                        }
                     }
                  }
                  if (!empty($mkc2)) {
                     ?>
                     <form method="POST">
                        <div class="mb-3">
                           <label class="font-weight-bold">Mật Khẩu hiện tại:</label>
                           <input type="password" class="form-control" name="password" id="password"
                              placeholder="Mật khẩu hiện tại" required autocomplete="password">
                        </div>
                        <div class="mb-3">
                           <label class="font-weight-bold">Mật Khẩu Cấp 2:</label>
                           <input type="password" class="form-control" name="passwordcap2" id="passwordcap2"
                              placeholder="Mật khẩu cấp 2" required autocomplete="passwordcap2">
                        </div>
                        <div class="mb-3">
                           <label class="font-weight-bold">Mật Khẩu Mới:</label>
                           <input type="password" class="form-control" name="new_password" id="new_password"
                              placeholder="Mật khẩu mới" required autocomplete="new_password">
                        </div>
                        <div class="mb-3">
                           <label class="font-weight-bold">Xác Nhận Mật Khẩu Mới:</label>
                           <input type="password" class="form-control" name="new_password_confirmation"
                              id="new_password_confirmation" placeholder="Xác nhận mật khẩu mới" required
                              autocomplete="new_password_confirmation">
                        </div>
                        <button class="btn btn-outline-primary" type="submit">Thực hiện</button>
                     </form>
                  <?php } else { ?>
                     <form method="POST">
                        <div class="mb-3">
                           <label class="font-weight-bold">Mật Khẩu Hiện Tại:</label>
                           <input type="password" class="form-control" name="password" id="password"
                              placeholder="Mật khẩu hiện tại" required autocomplete="password">
                        </div>
                        <div class="mb-3">
                           <label class="font-weight-bold">Mật Khẩu Mới:</label>
                           <input type="password" class="form-control" name="new_password" id="new_password"
                              placeholder="Mật khẩu mới" required autocomplete="new_password">
                        </div>
                        <div class="mb-3">
                           <label class="font-weight-bold">Nhập Lại Mật Khẩu Mới:</label>
                           <input type="password" class="form-control" name="new_password_confirmation"
                              id="new_password_confirmation" placeholder="Xác nhận mật khẩu mới" required
                              autocomplete="new_password_confirmation">
                        </div>
                        <button class="btn btn-outline-primary" type="submit">Thực hiện</button>
                     </form>
                  <?php } ?>
               </div>
               <br>
               <div class="row pl-2 pt-2">
                  <a href="security">
                     <b class=text-primary>
                        <i class="fa fa-chevron-left"></i>
                        Trở lại
                     </b>
                  </a>
               </div>
               <?php require_once 'end.php'; ?>
            </div>
         </main>
</body>