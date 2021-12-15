<?php
include('config.php');
$sql = "SELECT * FROM user";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
date_default_timezone_set('Asia/Ho_Chi_Minh');

$id2 = $_GET['id'];
$sql2 = "SELECT * FROM apps WHERE id_app ='$id2'";
$result2 = mysqli_query($mysqli, $sql2);
$row2 = mysqli_fetch_assoc($result2);
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<?php
if (isset($_POST['fix'])) {
    $name_app = $_POST["name_app"];
    $poster = $_POST["poster"];
    $category = $_POST["category"];
    $describes = $_POST["describes"];
    $cost = $_POST["cost"];
    $price = $_POST["prie"];

    $sql2 = "UPDATE `apps` SET `name_app` = '$name_app',`poster` ='$poster', `prie` = $price ,`category` ='$category',`describes` ='$describes',`cost` ='$cost', `status` = 0
    WHERE id_app = '$id2'";
    if (mysqli_query($mysqli, $sql2)) {
        echo "<script> alert('Sửa thành công') </script>";
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    } else {
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    }
}
?>

<?php
if (isset($_POST['saveanh'])) {
    if ($_FILES['image']['name'] != NULL) {
        // Kiểm tra file up lên có phải là ảnh không            
        // Nếu là ảnh tiến hành code upload
        $path = "image/img_sanpham/"; // Ảnh sẽ lưu vào thư mục images
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        // Upload ảnh vào thư mục images
        move_uploaded_file($tmp_name, $path . $name);
        $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
        // Insert ảnh vào cơ sở dữ liệu
        $sql2 = "UPDATE `apps` SET `img_app` = '$image_url' WHERE id_app = '$id2'";
        if (mysqli_query($mysqli, $sql2)) {
            echo "<script> alert('Sửa thành công') </script>";
            echo "<script> window.location='admin.php?select=listungdung'; </script>";
        } else {
            echo "<script> alert('Sửa không thành công') </script>";
            echo "<script> window.location='admin.php?select=listungdung'; </script>";
        }
    }
} ?>

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
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLogo" height="60" width="60">
        </div>
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
        <div class="content-wrapper" style="min-height: 1604.8px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Chỉnh Sửa Ứng Dụng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Chỉnh Sửa Ứng Dụng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content-header" style="margin: 0 30px; padding: 0;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Chỉnh Sửa Ứng Dụng</h5>
                                </div>
                                <div class="list-group list-group-flush" role="tablist"></div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Chỉnh Sửa Ảnh Ứng Dụng</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-center">
                                                    <img alt="Charles Hall" src="<?php echo $row2['img_app']; ?>" id="avatars" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                                    <div class="mt-2">
                                                        <span class="btn btn-primary btn-file">
                                                            Tải lên <input name="image" id="file-upload" type="file">
                                                        </span>
                                                    </div>
                                                    <small>Để có kết quả tốt nhất, hãy sử dụng hình ảnh có kích thước tối thiểu 128px x 128px ở định dạng .jpg</small>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button name="saveanh" type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Thông tin ứng dụng</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <form action="" method="post" role="form" enctype="multipart/form-data">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row" style="height: 80px;">
                                                <div class="mb-3 col-md-6">
                                                    <div class="mb-3">
                                                        <div class="mb-3 ">
                                                            <label for="name_app">Tên Ứng Dụng:</label>
                                                            <input type="text" id="name_app" name="name_app" class="form-control" value="<?php echo $row2['name_app']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="poster">Người Đăng:</label>
                                                        <input type="text" id="poster" name="poster" class="form-control" value="<?php echo $row2['poster']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row" style="height: 80px;">
                                                <div class="mb-3 col-md-6">
                                                    <div class="mb-3">
                                                        <div class="mb-3 ">
                                                            <label for="category">Thể Loại (Hãy chọn lại thể loại):</label>
                                                            <select id="category" name="category" class="form-control custom-select">
                                                                <option selected="" disabled="">Chọn Thể Loại</option>
                                                                <?php
                                                                $query = "SELECT * from category";
                                                                $results = mysqli_query($mysqli, $query);
                                                                while ($rows = mysqli_fetch_assoc(@$results)) {
                                                                ?>
                                                                    <option value="<?php echo $rows['category']; ?>"><?php echo $rows['category']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="cost">Loại Phí (Hãy chọn lại chi phí):</label>
                                                        <select id="cost" name="cost" class="form-control custom-select">
                                                            <option selected="" disabled="">Loại phí</option>
                                                            <option value="Miễn Phí"> Chọn Miễn phí</option>
                                                            <option value="Có Phí">Có phí</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress">Giá: </label>
                                            <input name="prie" type="text" class="form-control" id="inputAddress" placeholder="1234 section St" value="<?php echo $row2['prie']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alert_content">Mô tả:</label>
                                            <textarea name="describes" id="alert_content" class="form-control" rows="3" placeholder="<?php echo $row2['describes']; ?>"><?php echo $row2['describes']; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="row">
                                        <div class="col-12" style="margin-bottom: 10px;">
                                            <button name="fix" type="submit" class="btn btn-primary" style="margin-left: 20px;">Lưu Thay Đổi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
        </div>
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
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
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


    <!--  -->
    <script src="js/app.js"></script>
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#avatars').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#file-upload").on('change', function() {
                readURL(this);
            });
        });
    </script>

</body>

</html>