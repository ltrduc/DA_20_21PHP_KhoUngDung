<?php
include('config.php');
session_start();

$id2 = $_GET['id'];
$sql_apps = "SELECT * FROM apps, user WHERE apps.id_app = '$id2'";
$result_apps = mysqli_query($mysqli, $sql_apps);
$row_apps = mysqli_fetch_assoc($result_apps);
date_default_timezone_set('Asia/Ho_Chi_Minh');
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

  <!-- =======================================================
  * Template Name: Flattern - v2.2.1
  * Template URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>SẢN PHẨM</h2>
          <ol>
            <li><a href="#">Trang chủ</a></li>
            <li>Sản phẩm</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <h2 class="portfolio-title"><?php echo $row_apps['name_app']; ?></h2>
        <div class="row">

          <div class="col-lg-8" data-aos="fade-right">
            <div class="owl-carousel portfolio-details-carousel">
              <img src="<?php echo $row_apps['img_app']; ?>" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-right">
            <hr>
            <h3><?php echo $row_apps['name_app']; ?></h3>
            <ul>
              <li><strong>Thể Loại</strong>: <?php echo $row_apps['category']; ?></li>
              <li><strong>Người đăng</strong>: <?php echo $row_apps['poster']; ?></li>
              <li><strong>Phí</strong>: <?php echo $row_apps['cost']; ?></li>
              <li><strong>Giá sản phẩm</strong>: <?php echo $row_apps['prie']; ?></li>
            </ul>
            <?php
            if ($row_apps['prie'] == 0) { ?>
              <a class="btn btn-info btn-block btn-flat" href="download.php?file=<?php echo $row_apps["file"]; ?>" name="down" type="submit" class="btn btn-danger">
                <i class="material-icons"><svg class="icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"></path>
                  </svg></i>
                Tải file ứng dụng</a>
              <hr>
            <?php } ?>

            <?php
            if ($row_apps['prie'] > 0) {
              if (!isset($_SESSION['user'])) { ?>
                <a class="btn btn-info btn-block btn-flat" href="./login.php" name="down" type="submit" class="btn btn-danger">
                  <i class="material-icons"><svg class="icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"></path>
                    </svg></i>
                  Tải file ứng dụng</a>
                <hr>
              <?php } else { ?>
                <?php $idpay = $_GET['id']; ?>
                <a class="btn btn-info btn-block btn-flat" href="./pay.php?idpay=<?php echo $idpay; ?>" name="down" type="submit" class="btn btn-danger">
                  <i class="material-icons"><svg class="icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"></path>
                    </svg></i>
                  Tải file ứng dụng</a>
                <hr>
              <?php } ?>
            <?php } ?>
            <h3 style="text-align: center;">Mô Tả</h3>
            <p style="text-align: justify;">
              <?php echo $row_apps['describes']; ?>
            </p>
            <hr>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

    <section class="testimonials" style="font-family: 'Times New Roman', Times, serif;">
      <div class="container">
        <div class="row">
          <div class=" col-lg-8 aos-init aos-animate" data-aos="fade-up">
            <h2>Đánh Giá Sản Phẩm</h2>
            <hr>
            <!-- Người dùng đánh giá -->
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM apps, user, comments WHERE apps.id_app = '$id' AND comments.id_app = '$id' AND user.id_user = comments.id_user";
            $result = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <div class="post">
                <div class="user-block">
                  <img class="rounded-circle rounded me-2 mb-2" class="avatar" style="height: 30px; width:30px;" src="<?php echo $row['img_avatar']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                  <span class="username">
                    <a href="#"><?php echo $row['fullname']; ?>.</a>
                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                  </span>
                  <span class="description">- Người dùng -</span>
                </div>
                <!-- /.user-block -->
                <p>
                  <?php echo $row['comment']; ?>
                </p>

                <p>
                  <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> </a>
                  <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> </a>
                  <span class="float-right">
                    <a href="#" class="link-black text-sm">
                      <i class="far fa-comments mr-1"></i> Đánh Giá (<?php echo $row['vote']; ?>) SAO
                    </a>
                  </span>
                </p>
                <hr>
              <?php } ?>

              </div>
              <div class=" col-lg-8 aos-init aos-animate" data-aos="fade-up">
                <!-- From gửi -->
                <form class="form-horizontal" action="" method="POST">

                  <div class="wrap">
                    <div class="stars">
                      <label class="rate">
                        <input type="radio" name="radio1" id="star1" value="1">
                        <div class="face"></div>
                        <i class="far fa-star star one-star"></i>
                      </label>
                      <label class="rate">
                        <input type="radio" name="radio1" id="star2" value="2">
                        <div class="face"></div>
                        <i class="far fa-star star two-star"></i>
                      </label>
                      <label class="rate">
                        <input type="radio" name="radio1" id="star3" value="3">
                        <div class="face"></div>
                        <i class="far fa-star star three-star"></i>
                      </label>
                      <label class="rate">
                        <input type="radio" name="radio1" id="star4" value="4">
                        <div class="face"></div>
                        <i class="far fa-star star four-star"></i>
                      </label>
                      <label class="rate">
                        <input type="radio" name="radio1" id="star5" value="5">
                        <div class="face"></div>
                        <i class="far fa-star star five-star"></i>
                      </label>
                    </div>
                  </div>
                  <div class="input-group input-group-sm mb-0">

                    <input class="form-control form-control-sm" placeholder="Response" name="comment">
                    <div class="input-group-append">
                      <button name="add" type="submit" class="btn btn-danger">Send</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
      </div>
    </section>

    <?php
    $temp_category = $row_apps['category'];
    $num_category = "SELECT count(*) as category from apps where category = '$temp_category'";
    $num_category = mysqli_query($mysqli, $num_category);
    $nums_category = mysqli_fetch_assoc($num_category);
    $numcategory = $nums_category['category'];

    if ($numcategory > 1) {
    ?>

      <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2><strong>Cùng Thể Loại</strong></h2>
          </div>
          <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up">
            <?php
            $sql_categorys = "SELECT * FROM apps";
            $result_category = mysqli_query($mysqli, $sql_categorys);

            while ($row_category = mysqli_fetch_assoc($result_category)) { ?>
              <?php if ($row_category['status'] == 1) {
                if ($row_apps['category'] ==  $row_category['category']) { ?>
                  <div class="col-lg-4 col-md-6 portfolio-item <?php echo $row_category['category']; ?>">
                    <img src="<?php echo $row_category['img_app']; ?>" class="img-fluid" alt="" style="border-radius: 10px;">
                    
                    <div class="portfolio-info" style="background-color: rgba(255, 255, 255, 0.6); padding: 10px;">
                      <h4 style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        <?php echo $row_category['name_app']; ?></h4>
                      <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        <?php echo $row_category['category']; ?></p>
                      <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        <?php echo $row_category['cost']; ?></p>
                      <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        Mức giá: <?php echo $row_category['prie']; ?></p>
                      <a style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;" href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                      <a style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;" href="portfolio-details.php?id=<?php echo $row_category['id_app']; ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } ?>
          </div>
      </section>
    <?php } ?>

    <?php
    $temp_poster = $row_apps['poster'];
    $num_poster = "SELECT count(*) as poster from apps where poster = '$temp_poster'";
    $num_posters = mysqli_query($mysqli, $num_poster);
    $nums_posters = mysqli_fetch_assoc($num_posters);
    $numposter = $nums_posters['poster'];

    if ($numposter > 1) {
    ?>
      <section id="portfolio" class="portfolio">
        <div class="container">
          <div class="section-title" data-aos="fade-up">
            <h2><strong>Cùng Nhà Phát Triển</strong></h2>
          </div>
          <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up">
            <?php
            $sql_poster = "SELECT * FROM apps";
            $result_poster = mysqli_query($mysqli, $sql_poster);

            while ($row_posters = mysqli_fetch_assoc($result_poster)) { ?>
              <?php if ($row_posters['status'] == 1) {
                if ($row_apps['poster'] ==  $row_posters['poster']) { ?>
                  <div class="col-lg-4 col-md-6 portfolio-item <?php echo $row_posters['category']; ?>">
                    <img src="<?php echo $row_posters['img_app']; ?>" class="img-fluid" alt="" style="border-radius: 10px;">
                    <div class="portfolio-info" style="background-color: rgba(255, 255, 255, 0.6); padding: 10px;">
                      <h4 style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        <?php echo $row_posters['name_app']; ?></h4>
                      <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        <?php echo $row_posters['category']; ?></p>
                      <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        <?php echo $row_posters['cost']; ?></p>
                      <p style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                        Mức giá: <?php echo $row_posters['prie']; ?></p>
                      <a style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;" href="assets/img/portfolio/portfolio-1.jpg" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                      <a style="color: black; font-weight: bold; font-family: 'Times New Roman', Times, serif;" href="portfolio-details.php?id=<?php echo $row_posters['id_app']; ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                <?php } ?>
              <?php } ?>
            <?php } ?>
          </div>
      </section>
    <?php } ?>
  </main><!-- End #main -->


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