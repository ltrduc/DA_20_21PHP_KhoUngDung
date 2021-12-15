<?php
include('config.php');
session_start();

$sql = "SELECT * FROM apps";
$result = mysqli_query($mysqli, $sql);
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

    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2><strong>ỨNG DỤNG HÀNG ĐẦU</strong></h2>
                <p>DNH STORE mang tới cho bạn những ỨNG DỤNG hay nhất.</p>
            </div>
            <?php
            $resultungdung = "SELECT count(*) as id_app from apps";
            $soluongungdung = mysqli_query($mysqli, $resultungdung);
            $dulieuungdung = mysqli_fetch_assoc($soluongungdung);
            $num_app = $dulieuungdung['id_app'];

            if ($num_app > 0) {
            ?>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <?php
                            $sql1 = "SELECT * FROM `category`";
                            $result1 = mysqli_query($mysqli, $sql1);
                            while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                <li data-filter=".<?php echo $row1['category']; ?>"><?php echo $row1['category']; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <div id="content" class="row portfolio-container aos-init aos-animate" data-aos="fade-up">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <?php if ($row['status'] == 1) { ?>
                            <div class="col-lg-3 col-md-6 portfolio-item <?php echo $row['category']; ?>">
                                <img src="<?php echo $row['img_app']; ?>" class="img-fluid" alt="" style="border-radius: 10px;">
                                <div class="portfolio-info" style="background-color: rgba(255, 255, 255, 0.6); padding: 10px;">
                                    <h4 style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                        <?php echo $row['name_app']; ?></h4>
                                    <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                        <?php echo $row['category']; ?></p>
                                    <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                        <?php echo $row['cost']; ?></p>
                                    <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                                        Mức giá: <?php echo $row['prie']; ?></p>
                                    <a style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;" href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                                    <a style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;" href="portfolio-details.php?id=<?php echo $row['id_app']; ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                    XIN LỖI! HIỆN TẠI WEBSITE KHÔNG CÓ ỨNG DỤNG NÀO ĐƯỢC CẬP NHẬT!
                </div>
            <?php } ?>
    </section>


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