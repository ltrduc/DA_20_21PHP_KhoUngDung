<?php
include('config.php');
$sql = "SELECT * FROM user";
$result = mysqli_query($mysqli, $sql);


if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM user WHERE id_user = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listtaikhoan'; </script>";
}

if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Bạn không có quyền truy cập trang web này!') </script>";
    echo "<script> window.location='admin.php'; </script>";
    exit;
}

?>

<style>
    p.text-content {
        white-space: nowrap;
        width: 120px;
        margin: 0;
        text-align: center;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tài khoản</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh Sách Tài Khoản</h3>
                <div class="card-tools">
                    <a class="btn btn-primary btn-sm" target="_blank" href="admin.php?select=themtaikhoan">
                        <i class="fas fa-plus"></i> Thêm Tài Khoản
                    </a>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%" class="text-center">
                                #
                            </th>
                            <th style="width: 10%" class="text-center">
                                Ảnh đại hiện
                            </th>
                            <th style="width: 10%" class="text-center">
                                Tên đăng nhập
                            </th>
                            <th style="width: 10%" class="text-center">
                                Mật khẩu
                            </th>
                            <th style="width: 15%" class="text-center">
                                Họ và tên
                            </th>
                            <th style="width: 10%" class="text-center">
                                Đại chỉ
                            </th>
                            <th style="width: 10%" class="text-center">
                                SĐT
                            </th>
                            <th style="width: 3%" class="text-center">
                                Level
                            </th>
                            <th style="width: 15%" class="text-center">
                                Tùy chỉnh
                            </th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td class="project-state"><?php echo $i++; ?></td>
                                <td class="project-state"><img class="rounded-circle rounded me-2 mb-2" class="avatar" style="height: 50px; width:50px;" src="<?php echo $row['img_avatar']; ?>" class="avatar img-circle img-thumbnail" alt="avatar"></td>
                                <td class="project-state"><?php echo $row['username']; ?></td>
                                <td class="project-state"><?php echo $row['password']; ?></td>
                                <td class="project-state"><?php echo $row['fullname']; ?></td>
                                <td class="project-state">
                                    <p class="text-content"><?php echo $row['address']; ?></p>
                                </td>
                                <td class="project-state"><?php echo $row['phone']; ?></td>
                                <td class="project-state"><?php echo $row['level']; ?></td>
                                <td class="project-actions text-center" project-state>
                                    <a class="btn btn-info btn-sm" href="edit_taikhoan.php?id=<?php echo $row['id_user']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="listtaikhoan.php?delete_id=<?php echo $row['id_user']; ?>" name="delete" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                            <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>