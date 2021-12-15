<?php
session_start();

include('config.php');
if ($_SESSION['level'] == 0) {
    $admin = $_SESSION['admin'];
    $sql = "SELECT * FROM user where username = '$admin'";
} else {
    $developer = $_SESSION['developer'];
    $sql = "SELECT * FROM user where username = '$developer'";
}

$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (!isset($_SESSION['admin']) && !isset($_SESSION['developer'])) {
    echo "<script> alert('Bạn không có quyền truy cập trang web này!') </script>";
    echo "<script> window.location='index.php'; </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản Lý Ứng Dụng | Trang Chủ</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once 'header.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <?php include_once 'menu.php'; ?>
            <!-- /.sidebar -->
        </aside>
        <!-- ./Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <?php if (isset($_GET["select"])) {
            switch ($_GET["select"]) {
                case 'admin':
                    include_once './trangchu.php';
                    break;
                case 'listtaikhoan':
                    include_once './listtaikhoan.php';
                    break;
                case 'themtaikhoan':
                    include_once './themtaikhoan.php';
                    break;
                case 'listungdung':
                    include_once './listungdung.php';
                    break;
                case 'themungdung':
                    include_once './themungdung.php';
                    break;
                case 'listtheloai':
                    include_once './listtheloai.php';
                    break;
                case 'listthecao':
                    include_once './listthecao.php';
                    break;
                case 'listdanhgia':
                    include_once './listdanhgia.php';
                    break;
                case 'view_danhgia':
                    include_once './view_danhgia.php';
                    break;
                case 'resetpwd':
                    include_once './resetpassword.php';
                    break;
                case 'doanhthu':
                    include_once './doanhthu.php';
                    break;
            }
        } else {
            include_once './trangchu.php';
        } ?>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <?php include_once 'footer.php'; ?>
        <!-- ./footer -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jquery-knob/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>