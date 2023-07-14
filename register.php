<?php
include_once 'set.php';
$_title = "NRO Light - Đăng Ký";
include('connect.php');

$_alert = '';
$recafcode = '';
$count = '';
// Giới hạn số lượng tài khoản đăng ký từ cùng một địa chỉ IP
$max_accounts_per_ip = 2;
$num_accounts = count_accounts_by_ip($_SERVER['REMOTE_ADDR']);
if ($num_accounts >= $max_accounts_per_ip) {
   $_alert = '<div class="alert alert-danger">Bạn đã đăng ký quá số lượng tài khoản cho phép từ cùng địa chỉ IP!</div>';
} else {
   if ($_login == null && isset($_POST['username']) && isset($_POST['password'])) {
      if (empty($_POST['username'])) {
         $_alert = '<div class="alert alert-danger">Vui lòng nhập tên tài khoản!</div>';
      } elseif (!preg_match('/^[a-zA-Z0-9-@_]+$/', $_POST['username'])) {
         $_alert = '<div class="alert alert-danger">Tên tài khoản không hợp lệ!</div>';
      }
      if (empty($_POST['password'])) {
         $_alert = '<div class="alert alert-danger">Vui lòng nhập mật khẩu!</div>';
      } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['password'])) {
         $_alert = '<div class="alert alert-danger">Mật khẩu không hợp lệ!</div>';
      } elseif (strcmp($_POST['password'], $_POST['repassword']) != 0) {
         $_alert = '<div class="alert alert-danger">Hai mật khẩu không khớp nhau, vui lòng kiểm tra lại!</div>';
      } else {
         $username = mysqli_real_escape_string($conn, $_POST['username']);
         $password = mysqli_real_escape_string($conn, trim($_POST['password']));
         $repassword = mysqli_real_escape_string($conn, trim($_POST['repassword']));

         // Kiểm tra xem username này đã tồn tại hay chưa
         $read = _select("*", 'account', "username='$username'");
         $existing_account = _fetch($read);
         if (is_array($existing_account)) {
            $_alert = '<div class="alert alert-danger">Tài khoản này đã tồn tại, vui lòng chọn tài khoản khác!</div>';
         } else {
            // Thực hiện INSERT tài khoản vào CSDL
            $recaf = isset($_POST["recaf"]) && !empty($_POST["recaf"]) ? mysqli_real_escape_string($conn, trim($_POST['recaf'])) : null;
            if (!empty($recaf)) {
               // Kiểm tra xem mã giới thiệu đã nhập có tương ứng với tài khoản được tạo từ cùng một địa chỉ IP không
               $result = _select("COUNT(*) as count", "account", "id='$recaf' AND ip_address='{$_SERVER['REMOTE_ADDR']}'");
               $row = _fetch($result);
               if ($row['count'] > 0) {
                  $_alert = '<div class="alert alert-danger">Bạn không thể nhập mã giới thiệu của chính mình!</div>';
               } else {
                  // Kiểm tra số lần đã cộng
                  if ($count < 15) {
                     $sql = "UPDATE account SET gioithieu = gioithieu + 1 WHERE id = '$recaf'";
                     if ($conn->query($sql) === TRUE) {

                        // Tăng biến đếm khi cộng thành công
                        $count++;
                        $txt = _insert('account', 'username,password,ip_address,recaf', "'$username','$password','{$_SERVER['REMOTE_ADDR']}'," . ($recaf === null ? 'NULL' : "'$recaf'"));
                        $kiemtra = _query($txt);
                        if ($kiemtra) {
                           $_alert = '<div class="alert alert-success">Đăng kí thành công!!</div>';
                        }
                     }
                  } else {
                     $_alert = '<div class="alert alert-danger">Mã giới thiệu này đã đạt đủ số người nhập mã!</div>';
                  }
               }
            } else {
               // Trường hợp không có recaf
               $txt = _insert('account', 'username,password,ip_address,recaf', "'$username','$password','{$_SERVER['REMOTE_ADDR']}',NULL");
               $kiemtra = _query($txt);
               if ($kiemtra) {
                  $_alert = '<div class="alert alert-success">Đăng kí thành công!!</div>';
               }
            }
         }
      }
   }
}

function count_accounts_by_ip($ip_address)
{
   global $conn;
   $count = 0;
   $result = _select("COUNT(*) as count", "account", "ip_address='$ip_address'");
   if ($row = _fetch($result)) {
      $count = $row['count'];
   }
   return $count;
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
   <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&amp;display=swap"
      rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</head>
<script src="assets/js/main.js" type="text/javascript"></script>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-FBRLPP0PX2"></script>
<script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments) } gtag("js", new Date()); gtag("config", "G-FBRLPP0PX2");</script>
<script
   type="text/javascript">/*<![CDATA[*/$(document).ready(function () { if ($(window).width() <= 500) { $(".dashboard").addClass("menu-closed") } else { $(".dashboard").removeClass("menu-closed") } });/*]]>*/</script>

<body class="dashboard">
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
   </style>
   <script>
      window.addEventListener('load', function () {
         // lấy query string từ URL
         let queryString = window.location.search;

         // kiểm tra có phần tham số ref hay không
         if (queryString.includes('ref=')) {
            // lấy giá trị của tham số ref
            let referralCode = queryString.split('ref=')[1];

            // tìm input field chứa mã giới thiệu trên trang đăng ký
            let referralInput = document.querySelector('#recaf');

            // nếu tìm được thì nhập mã giới thiệu vào field đó
            if (referralInput) {
               referralInput.value = referralCode;
            }
         }
      });
   </script>

   <body class="dashboard">
      <header class="navbar navbar-expand-md navbar-light bg-white fixed-top">
         <div class="container-fluid">
            <a class="navbar-brand" href="/index">
               <img src="img/nro.png" alt="Quản Lý Tài Khoản  - Ngọc Rồng Light">
            </a>
            <button class="navbar-toggler left-menu-btn-control" type="button" data-toggle="collapse"
               data-target="#left-menu" aria-controls="left-menu" aria-expanded="false"
               aria-label="Left menu navigation">
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
                     <?php } else { ?>
                     <li class="nav-item">
                        <i class="fas fa-coin" style="font-weight:bold;color:#343a40;margin-right:5px"></i>
                        <span style="color:#343a40">
                           <?php echo number_format($_coin); ?> VND
                        </span>
                     </li>
                     <div class="dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-user me-2" style="font-weight"></i>
                           <?php echo $_username; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="profile">Trang Cá Nhân</a>
                           <a class="dropdown-item" href="security">Bảo Mật</a>
                           <a class="dropdown-item" href="nap-tien">Nạp Tiền</a>
                           <a class="dropdown-item" href="history">Lịch Sử Giao Dịch</a>
                           <a class="dropdown-item" href="/?out">Đăng xuất</a>
                        </div>
                     </div>
                  <?php } ?>
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
      <div class="container py-3">
         <main>
            <br><br>
            <div class="text-center">
               <img src="/img/nro.png" alt="" width="400" height="100">
            </div>
            <form class="form-signin" method="POST">
               <h1 class="h3 mb-3 font-weight-normal text-center">Nhập thông tin đăng ký</h1>
               <input type="hidden" name="_token" value="JEGpj39vMoqzUAPDoHWTY8Y4jJiy4t0mhPST9nds">
               <?php
               if (!empty($_alert)) {
                  echo $_alert;
               }
               ?>
               <div class="form-group">
                  <label>Tài khoản</label>
                  <input type="text" class="form-control" placeholder="Tài khoản" required="" name="username" value="">
               </div>
               <div class="form-group">
                  <label>Mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="password"
                     autocomplete="password">
               </div>
               <div class="form-group">
                  <label>Nhập lại mật khẩu</label>
                  <input type="password" class="form-control" placeholder="Mật khẩu" required="" name="repassword"
                     autocomplete="repassword">
               </div>
               <div class="form-group">
                  <label for="referral_code">Mã giới thiệu:</label>
                  <input type="text" class="form-control" id="recaf" name="recaf" value="<?php echo $recafcode; ?>"
                     placeholder="Nhập mã giới thiệu (nếu có)">
               </div>
               <br>
               <button class="btn btn-primary w-100" onclick="redirectToRegisterPage()">Đăng ký</button>
               <script>
                  function redirectToRegisterPage() {
                     <?php if (isset($_SESSION['id'])) { ?>
                        var url = "<?php echo $_domain ?>/register.php?ref=<?php echo $_SESSION['id'] ?>";
                        window.location.href = url;
                     <?php } ?>
                  }
               </script>
               <div class="text-center">
                  Bạn đã có tài khoản? <a href="login">Đăng nhập ngay</a>
               </div>
               <div class="text-center">
                  <a href="#">Quên mật khẩu</a>
               </div>
            </form>
            <style>
               .form-signin {
                  width: 100%;
                  max-width: 400px;
                  padding: 15px;
                  margin: 0 auto
               }

               .form-signin .checkbox {
                  font-weight: 400
               }
            </style>
         </main>
         <script src="assets/js/jquery.form.min.js"></script>
         <script src="assets/js/clipboard.min.js"></script>
         <script src="assets/js/jquery.dataTables.min.js"></script>
         <script src="assets/js/dataTables.bootstrap5.min.js"></script>
         <?php
         include_once 'end.php';
         ?>
      </div>
   </body>