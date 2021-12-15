<?php
include('config.php');
if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Bạn không có quyền truy cập trang web này!') </script>";
    echo "<script> window.location='admin.php'; </script>";
    exit;
}
?>
<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm tài khoản</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thêm tài khoản</h5>
                        </div>
                        <div class="list-group list-group-flush" role="tablist"></div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ảnh mặc định</h5>
                        </div>
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center">
                                            <img alt="Avatar" src="image/img_avt_df/avatar.png" id="avatars" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                            <div class="mt-2"></div>
                                            <hr>
                                            <small>Ảnh này là ảnh mặc định, nếu bạn muốn thay đổi bạn có thể vào chỉnh sửa tài khoản sao khi tạo tài khoản.
                                                Bạn có thể dùng ảnh để đặt làm ảnh hồ sơ. Ảnh này hiển thị khi ai đó thấy tên bạn trong hệ thống.</small>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">THÔNG TIN</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="./add_taikhoan.php" method="POST">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3 ">
                                                <label class="form-label" for="fullname">Họ và tên</label>
                                                <input type="text" class="form-control" name="fullname" id="inputFirstName" placeholder="Họ và tên">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="pass">Email</label>
                                            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="pass">Mật khẩu</label>
                                            <input type="password" class="form-control" name="password" id="inputEmail4" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputAddress">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Nguyễn Khoái, phương 8, quận 4">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Điện thoại</label>
                                                <input type="text" class="form-control" name="phone" id="inputAddress2" placeholder="+84000000000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="mb-3 ">
                                            <label class="form-label" for="inputZip">Phân quyền</label>
                                            <select class="form-control" aria-label="Default select example" name="level">
                                                <option value="">Phân quyền</option>
                                                <option value="0">0. Admin</option>
                                                <option value="1">1. Lập trình viên</option>
                                                <option value="2">2. Người dùng</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button name="add" type="submit" class="btn btn-primary">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>