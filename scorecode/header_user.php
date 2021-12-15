<?php
include('config.php');
$user = $_SESSION['user'];

$sql7 = "SELECT * FROM user where username = '$user'";
$result7 = mysqli_query($mysqli, $sql7);
$row7 = mysqli_fetch_assoc($result7);

?>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
            <i class="icofont-envelope"></i><a href="#">51900040@student.tdtu.edu.vn.com</a>
            <i class="icofont-phone"></i> +84 0977025449
        </div>
        <div class="social-links">
            <span class="text-600 text-90">Số dư:</span>
            <span class="badge badge-warning badge-pill px-25">
                <?php
                $totalid_user = $row7['id_user'];
                // Lấy danh sách tiền của người dùng.
                $total1 = "SELECT * FROM mobilerecharge WHERE id_user = '$totalid_user'";
                $total2 = mysqli_query($mysqli, $total1);
                $total3 = mysqli_fetch_assoc($total2);
                if ($total3 <= 0) echo 0;
                else echo $total3['total'];
                ?>
            </span>
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="skype"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header">
    <div class="container d-flex">
        <!-- .nav-menu -->
        <div class="logo mr-auto">
            <h1 class="text-light"><a href="#">DNH STORE</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="./user.php">Trang chủ</a></li>
                <li><a href="./info.php">Thông tin</a></li>
                <li><a href="./portfolio.php">Sản phẩm</a></li>
                <?php if ($_SESSION['user']) { ?>
                    <li class="drop-down">
                        <a href="./user.php?select=user" class="d-block"><?php echo $row7['fullname']; ?>
                        </a>
                        <ul>
                            <li><a href="./userprofile.php?id=<?php echo $row7['id_user']; ?>">THÔNG TIN</a></li>
                            <li><a href="./naptien.php?idnaptien=<?php echo $row7['id_user']; ?>">NẠP TIỀN</a></li>
                            <li><a href="./logout_user.php">ĐĂNG XUẤT</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!--End .nav-menu -->
        <!--End .nav-menu -->
    </div>
</header>
<!-- End Header -->


<!-- End Hero -->