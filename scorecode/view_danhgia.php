<?php
session_start();

include('config.php');
if ($_SESSION['level'] == 0){
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
<?php
$id_dg = $_GET['iddanhgia'];
$sql_dg = "SELECT *
FROM comments, apps, user
WHERE comments.id_app = apps.id_app AND user.id_user = $id_dg AND comments.id_user = $id_dg ";
$result_dg = mysqli_query($mysqli, $sql_dg);
$row_dg = mysqli_fetch_assoc($result_dg);
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Trang Chủ</title>

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
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <h1 style="font-family: 'Times New Roman', Times, serif; font-weight: bold;">DNH STORE</h1>
        </div> -->
        <!-- ./Preloader -->

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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="min-height: 1604.8px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thông Tin Đánh Giá</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Thông Tin Đánh Giá</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content" style="margin: 0 30px; padding: 0;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <td class="project-state"><img class="rounded-circle rounded me-2 mb-2" class="avatar" style="height: 50px; width:50px;" src="<?php echo $row_dg['img_avatar']; ?>" class="avatar img-circle img-thumbnail" alt="avatar"></td>
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo $row_dg['fullname']; ?></h3>
                                    <p class="text-muted text-center">Khách Hàng</p>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body" style="text-align: center; margin-top: -60px;">
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Danh mục đánh giá</strong>

                                    <p class="text-muted"><?php echo $row_dg['category']; ?></p>

                                    <hr>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane active">
                                            <!-- The timeline -->
                                            <div class="timeline timeline-inverse">
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <hr>
                                                </div>

                                                <div>
                                                    <i class="fas fa-envelope bg-primary"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header"><a href="#"><?php echo $row_dg['fullname']; ?></a></h3>
                                                        <div class="timeline-body"><a href="#"><?php echo $row_dg['comment']; ?></a></div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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




<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</html>