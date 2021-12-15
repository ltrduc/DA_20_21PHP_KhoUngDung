<a href="admin.php?select=admin" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">QUẢN LÝ HỆ THỐNG</span>
</a>

<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?php echo $row['img_avatar']; ?>" class="img-circle elevation-2" alt="<?php echo $row['username']; ?>">
        </div>
        <div class="info">
            <a href="./admin.php?select=admin" class="d-block"><?php echo $row['fullname']; ?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="./admin.php?select=admin" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Trang Chủ</p>
                </a>
            </li>
            <li class="nav-header">QUẢN LÝ TRANG</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Quản Lý Tài Khoản
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./admin.php?select=listtaikhoan" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Danh Sách Tài Khoản</p>
                        </a>
                        <a href="./admin.php?select=resetpwd" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; New password</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>
                        Quản Lý Ứng Dụng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./admin.php?select=listungdung" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Danh Sách Ứng Dụng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./admin.php?select=listtheloai" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Quản lý thể loại</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Quản Lý Danh Thu
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./admin.php?select=doanhthu" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Tổng Danh Thu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./admin.php?select=listthecao" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Thẻ Cào - Card</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Quản Lý Đánh Giá
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="./admin.php?select=listdanhgia" class="nav-link">
                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>
                            <p>&nbsp; Danh Sách Đánh Giá</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-header">THAO TÁC KHÁC</li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Đăng Xuất
                    </p>
                </a>
            </li>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>