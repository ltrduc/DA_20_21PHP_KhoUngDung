<?php
include('config.php');
session_start();

$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id_user ='$id'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<?php
if (isset($_POST['saveanh'])) {
    if ($_FILES['image']['name'] != NULL) {
        // Kiểm tra file up lên có phải là ảnh không            
        // Nếu là ảnh tiến hành code upload
        $path = "image/img_avt/"; // Ảnh sẽ lưu vào thư mục images
        $tmp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        // Upload ảnh vào thư mục images
        move_uploaded_file($tmp_name, $path . $name);
        $image_url = $path . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
        // Insert ảnh vào cơ sở dữ liệu
        $sql = "UPDATE `user` SET `img_avatar` = '$image_url' WHERE id_user = '$id'";
        if (mysqli_query($mysqli, $sql)) {
            echo "<script> alert('Tài khoản sửa thành công') </script>";
            echo "<script> window.location='./user.php'; </script>";
        } else {
            echo "<script> alert('Tài khoản sửa không thành công') </script>";
            echo "<script> window.location='./user.php'; </script>";
        }
    }
} ?>

<?php
if (isset($_POST['fix'])) {
    $u = $_POST["username"];
    $p = $_POST["password"];
    $f = $_POST["fullname"];
    $e = $_POST["email"];
    $dc = $_POST["address"];
    $sdt = $_POST["phone"];

    $sql = "UPDATE `user` SET `username` = '$u',`password` = '$p',`fullname` ='$f', `email` ='$e',`address` ='$dc',`phone` ='$sdt'
    WHERE id_user = '$id'";
    if (mysqli_query($mysqli, $sql)) {
        echo "<script> alert('Tài khoản sửa thành công') </script>";
        echo "<script> window.location='./user.php'; </script>";
    } else {
        echo "<script> window.location='./user.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DNH STORE</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- header -->
    <?php if (isset($_SESSION['user'])) {
        include_once('./header_user.php');
    }

    if (!isset($_SESSION['user'])) {
        include_once('./tempheader_user.php');
    }
    ?>

    <!-- Main -->
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">THÔNG TIN CÁ NHÂN</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-center">
                                                    <img alt="Charles Hall" src="<?php echo $row['img_avatar']; ?>" id="avatars" class="rounded-circle img-responsive mt-2" width="128" height="128" />
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
                            <div class="card mb-3">
                                <div class="card-body">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <div class="mb-3">
                                                    <div class="mb-3 ">
                                                        <label class="form-label" for="fullname">Họ và tên</label>
                                                        <input type="text" class="form-control" name="fullname" id="inputFirstName" placeholder="Họ và tên" value="<?php echo $row['fullname']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="pass">Email</label>
                                                    <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" value="<?php echo $row['email']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputFirstName">Tên đăng nhập</label>
                                                <input name="username" type="text" class="form-control" id="inputFirstName" placeholder="First name" value="<?php echo $row['username']; ?>">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="inputLastName">Mật khẩu</label>
                                                <input name="password" type="password" class="form-control" id="inputLastName" placeholder="Last name" value="<?php echo $row['password']; ?>">
                                                <a style="float: right;" href="#pass" data-toggle="collapse"><img src="https://www.freeiconspng.com/uploads/eyeball-icon-png-eye-icon-1.png" style="height: 25px; width: auto" alt="" srcset=""></a></a>
                                                <div id="pass" class="collapse" style="margin-left: 10px;">
                                                    <?php echo $row['password']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress">Địa chỉ</label>
                                            <input name="address" type="text" class="form-control" id="inputAddress" placeholder="1234 section St" value="<?php echo $row['address']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="inputAddress2">Điện thoại</label>
                                            <input name="phone" type="text" class="form-control" id="inputAddress2" placeholder="+84........" value="<?php echo $row['phone']; ?>">
                                        </div>
                                        <button name="fix" type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row gutters-sm">
                                <div class="col-sm-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Ứng dụng đã mua</i></h6>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Ứng dụng đã tải</i></h6>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    </script>
    <!-- End Main -->

    <!-- ======= Footer ======= -->
    <?php include_once('footer_user.php') ?>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

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