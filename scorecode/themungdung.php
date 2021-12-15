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

<div class="content-wrapper" style="min-height: 1604.8px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm Ứng Dụng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thêm Ứng Dụng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Thêm Ứng Dụng</h5>
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
                                            <img alt="Avatar" src="image/img_sanpham_df/logosanpham.png" id="avatars" class="rounded-circle img-responsive mt-2" width="128" height="128">
                                            <div class="mt-2"></div>
                                            <hr>
                                            <small>Ảnh này là ảnh mặc định, nếu bạn muốn thay đổi bạn có thể vào chỉnh sửa ứng dụng sao khi tạo ứng dụng.
                                                Bạn có thể dùng ảnh để đặt làm ảnh hồ sơ ứng dụng. Ảnh này hiển thị khi ai đó thấy ứng dụng của bạn trong hệ thống.</small>
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
                            <h3 class="card-title">Thông tin ứng dụng</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="./add_ungdung.php" method="post" role="form" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="name_app">Tên Ứng Dụng:</label>
                                            <input type="text" id="name_app" name="name_app" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="poster">Người Đăng:</label>
                                            <input type="text" id="poster" name="poster" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="category">Thể Loại:</label>
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
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="cost">Loại Phí:</label>
                                            <select id="cost" name="cost" class="form-control custom-select">
                                                <option selected="" disabled="">Chọn thể loại phí</option>
                                                <option value="Miễn Phí">Miễn phí</option>
                                                <option value="Có Phí">Có phí</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="prie">Phí:</label>
                                            <input type="text" id="prie" name="prie" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label for="cost">Chọn File:</label>
                                            <input type="file" name="myfile" class="form-control" id="myfile" style="padding: 6px 0;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="alert_content">Mô tả:</label>
                                    <textarea name="describes" id="alert_content" class="form-control" rows="3" placeholder="Nhập mô tả"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-12" style="margin-bottom: 10px;">
                                    <button name="add" type="submit" class="btn btn-primary" style="margin-left: 20px;">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>