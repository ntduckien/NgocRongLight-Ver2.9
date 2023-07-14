<?php
include_once 'adminset.php';
include_once '../connect.php';
if ($_login == null) {
    header("location:../login.php");
}
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
    <main class="flex-grow-1 flex-shrink-1">
        <!-- <script type="text/javascript">new WOW().init();</script> -->
        <br>
        <br>
        <br>
        <div class="container py-3">
            <main>
                <div class="row">
                    <div class="col-md-9 pb-3 pt-2">
                        <h3>Cộng Chỉ Số Nhân Vật - Máy Chủ 1</h3>
                        <p class="text-muted">Cộng chỉ số nhân vật cho thành viên trong Máy Chủ 1 (Không nên cộng quá
                            nhiều)</p>
                        <hr>
                        <table class="table">
                    </div>
                </div>
                <div class="py-3">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <?php
                            include_once 'connectadmin.php';

                            $_alert = '';

                            // Xử lý dữ liệu form khi submit
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                // Lấy giá trị từ form
                                $name = $_POST["name"];
                                $sucmanh = isset($_POST["sucmanh"]) ? intval($_POST["sucmanh"]) : 0;
                                $tiemnang = isset($_POST["tiemnang"]) ? intval($_POST["tiemnang"]) : 0;
                                $hp = isset($_POST["hp"]) ? intval($_POST["hp"]) : 0;
                                $mp = isset($_POST["mp"]) ? intval($_POST["mp"]) : 0;
                                $sdg = isset($_POST["sdg"]) ? intval($_POST["sdg"]) : 0;
                                $giapgoc = isset($_POST["giapgoc"]) ? intval($_POST["giapgoc"]) : 0;
                                $chimang = isset($_POST["chimang"]) ? intval($_POST["chimang"]) : 0;

                                // Kiểm tra tính hợp lệ của dữ liệu
                                if (!empty($name)) {

                                    // Tìm nhân vật trong CSDL
                                    $sql = "SELECT * FROM player WHERE name='$name'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // Nhân vật tồn tại, cộng chỉ số cho nhân vật
                                        $row = $result->fetch_assoc();
                                        $data_point = json_decode($row["data_point"], true); // Chuyển đổi JSON thành mảng
                            
                                        $select_property = isset($_POST["select-property"]) ? $_POST["select-property"] : "";

                                        // cập nhật giá trị mới cho các chỉ số trong mảng $data_point
                                        switch ($select_property) {
                                            case 'sucmanh':
                                                $data_point[1] += $sucmanh;
                                                break;
                                            case 'tiemnang':
                                                $data_point[2] += $tiemnang;
                                                break;
                                            case 'hp':
                                                $data_point[5] += $hp;
                                                break;
                                            case 'mp':
                                                $data_point[6] += $mp;
                                                break;
                                            case 'sdg':
                                                $data_point[7] += $sdg;
                                                break;
                                            case 'giapgoc':
                                                $data_point[8] += $giapgoc;
                                                break;
                                            case 'chimang':
                                                $data_point[9] += $chimang;
                                                break;
                                            case 'congtoanbo':
                                                $data_point[1] += isset($_POST["congtoanbo-sucmanh"]) ? intval($_POST["congtoanbo-sucmanh"]) : 0;
                                                $data_point[2] += isset($_POST["congtoanbo-tiemnang"]) ? intval($_POST["congtoanbo-tiemnang"]) : 0;
                                                $data_point[5] += isset($_POST["congtoanbo-hp"]) ? intval($_POST["congtoanbo-hp"]) : 0;
                                                $data_point[6] += isset($_POST["congtoanbo-mp"]) ? intval($_POST["congtoanbo-mp"]) : 0;
                                                $data_point[7] += isset($_POST["congtoanbo-sdg"]) ? intval($_POST["congtoanbo-sdg"]) : 0;
                                                $data_point[8] += isset($_POST["congtoanbo-giapgoc"]) ? intval($_POST["congtoanbo-giapgoc"]) : 0;
                                                $data_point[9] += isset($_POST["congtoanbo-chimang"]) ? intval($_POST["congtoanbo-chimang"]) : 0;
                                                break;
                                            default:
                                                break;
                                        }

                                        // Cập nhật chỉ số mới vào CSDL
                                        $sql = "UPDATE player SET data_point='" . json_encode($data_point) . "' WHERE name='$name'";

                                        if ($conn->query($sql) === TRUE) {
                                            $_alert = '<div class="alert alert-success">Cộng chỉ số thành công!</div>';
                                        } else {
                                            $_alert = '<div class="alert alert-danger">Lỗi kết nối đến máy chủ!</div>';
                                        }

                                    } else {
                                        // Nhân vật không tồn tại
                                        $_alert = '<div class="alert alert-warning">Nhân vật không tồn tại!</div>';
                                    }
                                } else {
                                    // Tên tài khoản không được để trống
                                    $_alert = '<div class="alert alert-warning">Vui lòng nhập tên nhân vật!</div>';
                                }

                                // Ngắt kết nối CSDL
                                $conn->close();
                            }
                            ?>

                            <!-- Hiển thị biến $_alert -->
                            <?php
                            echo $_alert;
                            ?>
                            <form method="POST">
                                <div class="mb-3">
                                    <label class="font-weight-bold">Tên Tài Khoản:</label>
                                    <input type="name" class="form-control" name="name" id="name"
                                        placeholder="Nhập tên tài khoản" required autocomplete="name">
                                </div>
                                <div class="mb-3">
                                    <label class="font-weight-bold">Chỉ Số:</label>
                                    <select class="form-control" id="select-property" name="select-property">
                                        <option value="none">Chọn Chỉ Số</option>
                                        <option value="sucmanh">Sức Mạnh</option>
                                        <option value="sucmanh">Tiềm Năng</option>
                                        <option value="hp">HP</option>
                                        <option value="mp">MP</option>
                                        <option value="sdg">Sức Đánh Gốc</option>
                                        <option value="giapgoc">Giáp Gốc</option>
                                        <option value="chimang">Chí Mạng</option>
                                        <option value="congtoanbo">Cộng Toàn Bộ Chỉ Số</option>
                                    </select>
                                </div>

                                <div class="mb-3" id="sucmanh-input" style="display:none;">
                                    <label class="font-weight-bold">Sức Mạnh:</label>
                                    <input type="sucmanh" class="form-control" name="sucmanh" id="sucmanh"
                                        placeholder="Nhập chỉ số Sức Mạnh" required autocomplete="sucmanh">
                                </div>

                                <div class="mb-3" id="tiemnang-input" style="display:none;">
                                    <label class="font-weight-bold">Sức Mạnh:</label>
                                    <input type="tiemnang" class="form-control" name="tiemnang" id="tiemnang"
                                        placeholder="Nhập tiềm năng cần cộng" required autocomplete="tiemnang">
                                </div>

                                <div class="mb-3" id="hp-input" style="display:none;">
                                    <label class="font-weight-bold">HP:</label>
                                    <input type="hp" class="form-control" name="hp" id="hp" placeholder="Nhập chỉ số HP"
                                        required autocomplete="hp">
                                </div>

                                <div class="mb-3" id="mp-input" style="display:none;">
                                    <label class="font-weight-bold">MP:</label>
                                    <input type="mp" class="form-control" name="mp" id="mp" placeholder="Nhập chỉ số MP"
                                        required autocomplete="mp">
                                </div>

                                <div class="mb-3" id="sdg-input" style="display:none;">
                                    <label class="font-weight-bold">Sức Đánh Gốc:</label>
                                    <input type="sdg" class="form-control" name="sdg" id="sdg"
                                        placeholder="Nhập chỉ số Sức Đánh Gốc" required autocomplete="sdg">
                                </div>

                                <div class="mb-3" id="giapgoc-input" style="display:none;">
                                    <label class="font-weight-bold">Giáp Gốc:</label>
                                    <input type="giapgoc" class="form-control" name="giapgoc" id="giapgoc"
                                        placeholder="Nhập chỉ số Giáp Gốc" required autocomplete="giapgoc">
                                </div>

                                <div class="mb-3" id="chimang-input" style="display:none;">
                                    <label class="font-weight-bold">Chí Mạng:</label>
                                    <input type="chimang" class="form-control" name="chimang" id="chimang"
                                        placeholder="Nhập chỉ số Chí Mạng" required autocomplete="chimang">
                                </div>

                                <div class="mb-3" id="congtoanbo-input" style="display:none;">
                                    <!-- Cộng Chỉ Số Sức Mạnh -->
                                    <label class="font-weight-bold">Sức Mạnh:</label>
                                    <input type="sucmanh" class="form-control" name="congtoanbo-sucmanh"
                                        id="congtoanbo-sucmanh" placeholder="Nhập chỉ số Sức Mạnh" required
                                        autocomplete="sucmanh">
                                    <!-- Cộng Chỉ Số Tiềm Năng -->
                                    <label class="font-weight-bold">Tiềm Năng:</label>
                                    <input type="tiemnang" class="form-control" name="congtoanbo-tiemnang"
                                        id="congtoanbo-tiemnang" placeholder="Nhập chỉ số Tiềm Năng" required
                                        autocomplete="tiemnang">
                                    <!-- Cộng Chỉ Số HP-->
                                    <label class="font-weight-bold">HP:</label>
                                    <input type="hp" class="form-control" name="congtoanbo-hp" id="congtoanbo-hp"
                                        placeholder="Nhập chỉ số HP" required autocomplete="hp">
                                    <!-- Cộng Chỉ Số MP -->
                                    <label class="font-weight-bold">MP:</label>
                                    <input type="mp" class="form-control" name="congtoanbo-mp" id="congtoanbo-mp"
                                        placeholder="Nhập chỉ số MP" required autocomplete="mp">
                                    <!-- Cộng Chỉ Số Sức Đánh Gốc -->
                                    <label class="font-weight-bold">Sức Đánh Gốc:</label>
                                    <input type="sdg" class="form-control" name="congtoanbo-sdg" id="congtoanbo-sdg"
                                        placeholder="Nhập chỉ số Sức Đánh Gốc" required autocomplete="sdg">
                                    <!-- Cộng Chỉ Số Giáp Gốc -->
                                    <label class="font-weight-bold">Giáp Gốc:</label>
                                    <input type="giapgoc" class="form-control" name="congtoanbo-giapgoc"
                                        id="congtoanbo-giapgoc" placeholder="Nhập chỉ số Giáp Gốc" required
                                        autocomplete="giapgoc">
                                    <!-- Cộng Chỉ Số Chí Mạng -->
                                    <label class="font-weight-bold">Chí Mạng:</label>
                                    <input type="chimang" class="form-control" name="congtoanbo-chimang"
                                        id="congtoanbo-chimang" placeholder="Nhập chỉ số Chí Mạng" required
                                        autocomplete="chimang">
                                </div>
                                <button class="btn btn-outline-primary" type="submit">Thực Hiện</button>
                            </form>

                            <script>
                                document.getElementById('select-property').addEventListener('change', function () {
                                    var value = this.value;
                                    switch (value) {
                                        case 'none':
                                            hideAllInputs();
                                            break;
                                        case 'sucmanh':
                                            hideAllInputs();
                                            showInput('sucmanh-input');
                                            break;
                                        case 'tiemnang':
                                            hideAllInputs();
                                            showInput('tiemnang-input');
                                            break;
                                        case 'hp':
                                            hideAllInputs();
                                            showInput('hp-input');
                                            break;
                                        case 'mp':
                                            hideAllInputs();
                                            showInput('mp-input');
                                            break;
                                        case 'sdg':
                                            hideAllInputs();
                                            showInput('sdg-input');
                                            break;
                                        case 'giapgoc':
                                            hideAllInputs();
                                            showInput('giapgoc-input');
                                            break;
                                        case 'chimang':
                                            hideAllInputs();
                                            showInput('chimang-input');
                                            break;
                                        case 'congtoanbo':
                                            hideAllInputs();
                                            showInput('congtoanbo-input');
                                            break;
                                        default:
                                            break;
                                    }
                                });

                                function hideAllInputs() {
                                    var inputs = document.querySelectorAll('#sucmanh-input, #tiemnang-input, #hp-input, #mp-input, #sdg-input, #giapgoc-input, #chimang-input, #congtoanbo-input');
                                    inputs.forEach(function (input) {
                                        input.style.display = 'none';
                                    });
                                }

                                function showInput(inputId) {
                                    var input = document.getElementById(inputId);
                                    input.style.display = 'block';
                                }
                            </script>
                        </div>
                        <?php require_once '../end.php'; ?>
                    </div>
                </div>
</body>