<?php
include('config.php');
session_start();

$idnaptien = $_GET['idnaptien'];
$sql_naptien = "SELECT * FROM mobilerecharge, user WHERE mobilerecharge.id_user = '$idnaptien'";
$result_naptien = mysqli_query($mysqli, $sql_naptien);
$row_naptien = mysqli_fetch_assoc($result_naptien);

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

    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #243a6f !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #243a6f !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: #243a6f !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #04376d !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #194f7e !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }

        .btn-info {
            background-color: #243a6f;
        }
    </style>
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

    <!-- main -->

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">THÔNG TIN NẠP TIỀN</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Người dùng:</span>
                            <span class="text-600 text-110 text-blue align-middle"> <?php echo $row7['fullname']; ?></span>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Mã thanh toán:</span>
                            <span class="text-600 text-110 text-blue align-middle"> <?php echo $row7['id_user']; ?></span>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125" style="text-align: center;">
                                SỐ TIỀN TRONG TÀI KHOẢN
                            </div>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                <span class="text-600 text-90">Số dư:</span> <span class="badge badge-warning badge-pill px-25">
                                    <?php
                                    $output_payuser = $row7['id_user'];
                                    // Lấy danh sách tiền của người dùng.
                                    $output_pay = "SELECT * FROM mobilerecharge WHERE id_user = '$output_payuser'";
                                    $output_pays = mysqli_query($mysqli, $output_pay);
                                    $output_payss = mysqli_fetch_assoc($output_pays);
                                    if ($output_payss <= 0) echo 0;
                                    else echo $output_payss['total'];
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="col" style="text-align: center;">NẠP TIỀN</div>
                    </div>
                    <div class="text-95 text-secondary-d3">
                        <div class="row mt-3">
                            <div class="col">
                                <form action="./checkpay.php" method="post">
                                    <div class="form-group">
                                        <label for="codepay">Mã thanh toán:</label>
                                        <input type="text" class="form-control" id="id_user" placeholder="Nhập mã thanh toán ..." name="id_user">
                                    </div>
                                    <div class="form-group">
                                        <label for="card">Mã thẻ cào:</label>
                                        <input type="text" class="form-control" id="id_card" placeholder="Nhập mã thẻ cào ..." name="id_card">
                                    </div>
                                    <div class="form-group">
                                        <label for="seri">Mã số seri:</label>
                                        <input type="text" class="form-control" id="id_seri" placeholder="Nhập mã seri ..." name="id_seri">
                                    </div>
                                    <div>
                                        <span class="text-secondary-d1 text-105">Cảm ơn bạn đã Nạp tiền</span>
                                        <button class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" name="checkpay">
                                            Nạp tiền
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="text-align: center;">LỊCH SỬ NẠP TIỀN</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%" class="text-center">
                                            #
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Mã thanh toán
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Số thẻ cào
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Số seri
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Mệnh giá
                                        </th>
                                        <th style="width: 15%" class="text-center">
                                            Họ và tên
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Ngày nạp
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="myTable">
                                    <?php
                                    $totalid_user = $row7['id_user'];
                                    // Lấy danh sách tiền của người dùng.
                                    $total1 = "SELECT * FROM mobilerecharge, user, cards 
                                    WHERE user.id_user = '$totalid_user' AND mobilerecharge.id_cards = cards.id_cards";
                                    $total2 = mysqli_query($mysqli, $total1);

                                    $i = 1;
                                    while ($total3 = mysqli_fetch_assoc($total2)) { ?>
                                        <tr>
                                            <td class="project-state" style="text-align: center;"><?php echo $i++; ?></td>
                                            <td class="project-state" style="text-align: center;"><?php echo $row7['id_user']; ?></td>
                                            <td class="project-state" style="text-align: center;"><?php echo $total3['id_card']; ?></td>
                                            <td class="project-state" style="text-align: center;"><?php echo $total3['id_seri']; ?></td>
                                            <td class="project-state" style="text-align: center;"><?php echo $total3['mobilerecharge']; ?></td>
                                            <td class="project-state" style="text-align: center;"><?php echo $row7['fullname']; ?></td>
                                            <td class="project-state" style="text-align: center;"><?php echo $total3['date']; ?></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>

            </div>
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