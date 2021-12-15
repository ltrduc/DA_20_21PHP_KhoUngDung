<?php
include('config.php');
session_start();
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
    <div class="section">
        <div class="container" style="margin-top: 50px;">
            <h1 class="has-text-align-center" style="text-align: center;">DNH STORE</h1>
            <h2 class="has-text-align-center" style="text-align: center;">Kho ứng dụng MOD APK</h2>
            <p class="has-text-align-left" style="text-align: justify;">Bạn có thể dễ dàng tìm kiếm và tải xuống hàng triệu game và ứng dụng APK / MOD / Premium miễn phí. Tốc độ, an toàn và thân thiện là những gì chúng tôi muốn mang tới cho bạn. Bên cạnh đó, bạn có thể khám phá những kiến thức về Android, iOS, Windows,… và những thông tin bổ ích mỗi ngày.</p>
            <p>Hãy sử dụng trang sản phẩm để tìm những gì bạn đang mong chờ, hoặc duyệt qua các chuyên mục của chúng tôi để xem những gì đang nổi bật tuần qua.</p>
        </div>
    </div>
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

</body>

</html>