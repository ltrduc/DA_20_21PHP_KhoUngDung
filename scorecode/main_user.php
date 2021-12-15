<?php
include('config.php');
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 12; // Số sản phẩm hiện trong 1 trang
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; // Số trang bắt đầu sẽ là 0 - 1 - 2 - 3
$offset = ($current_page - 1) * $item_per_page;

$sql = "SELECT * FROM apps ORDER BY id_app ASC LIMIT " . $item_per_page . " OFFSET " . $offset;
$result = mysqli_query($mysqli, $sql);

$sqltotalRecords = "SELECT * FROM apps";
$totalRecords = mysqli_query($mysqli, $sqltotalRecords);
$totalRecords = $totalRecords->num_rows; // Tổng số sản phẩm

$totalPages = ceil($totalRecords / $item_per_page); // tổng số trang

?>

<main id="main">
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3>DNH STORE <span>Kho ứng dụng MOD APK</span> web/apps cho người Việt!</h3>
                    <p style="text-align: justify;">Bạn có thể dễ dàng tìm kiếm và tải xuống hàng triệu game và ứng dụng APK / MOD / Premium miễn phí. Tốc độ, an toàn và thân thiện là những gì chúng tôi muốn mang tới cho bạn. Bên cạnh đó, bạn có thể khám phá những kiến thức về Android,
                        iOS, Windows,… và những thông tin bổ ích mỗi ngày.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Hãy khám phá nào!</a>
                </div>
            </div>

        </div>
    </section>
    <!-- End Cta Section -->

    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <ul id="portfolio-flters">
                <li class="filter-active"><a href="./portfolio.php" style="text-decoration: none; color: white;">Xem thêm</a></li>
            </ul>
            <?php
            $resultungdung = "SELECT count(*) as id_app from apps";
            $soluongungdung = mysqli_query($mysqli, $resultungdung);
            $dulieuungdung = mysqli_fetch_assoc($soluongungdung);
            $num_app = $dulieuungdung['id_app'];

            if ($num_app > 0) {
            ?>
                <div class="section-title" data-aos="fade-up">
                    <h2><strong>ỨNG DỤNG HÀNG ĐẦU</strong></h2>
                    <p>DNH STORE mang tới cho bạn những ỨNG DỤNG hay nhất.</p>
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
                <?php include('./sophantrang.php') ?>
            <?php } else { ?>
                <div class="alert alert-danger" role="alert" style="text-align: center;">
                    XIN LỖI! HIỆN TẠI WEBSITE KHÔNG CÓ ỨNG DỤNG NÀO ĐƯỢC CẬP NHẬT!
                </div>
            <?php } ?>
    </section>
    <!-- End Portfolio Section -->
</main>