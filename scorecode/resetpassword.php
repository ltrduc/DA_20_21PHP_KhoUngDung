

<?php
include('config.php');
$sql = "SELECT * FROM user  where status = 1;";
$result = mysqli_query($mysqli, $sql);
?>

<?php
if (isset($_GET["update_id"])) {
    $id = $_GET['update_id'];
    $sql = "UPDATE `user` SET `status`= 0 WHERE id_user = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=resetpwd'; </script>";
}
?>

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
                            <th style="width: 5%" class="text-center">
                                Ảnh đại hiện
                            </th>
                            <th style="width: 10%" class="text-center">
                                Tên đăng nhập
                            </th>
                            <th style="width: 5%" class="text-center">
                                Mật khẩu Mới
                            </th>
                            <th style="width: 10%" class="text-center">
                                Email
                            </th>
                            <th style="width: 3%" class="text-center">
                                Level
                            </th>
                            <th style="width: 5%" class="text-center">
                               Xét duyệt
                            </th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="project-state"><?php echo $i++; ?></td>
                            <td class="project-state"><img class="rounded-circle rounded me-2 mb-2" class="avatar"
                                    style="height: 50px; width:50px;" src="<?php echo $row['img_avatar']; ?>"
                                    class="avatar img-circle img-thumbnail" alt="avatar"></td>
                            <td class="project-state"><?php echo $row['username']; ?></td>
                            <td class="project-state"><?php echo $row['password']; ?></td>
                            <td class="project-state">
                                <p class="text-content"><?php echo $row['email']; ?></p>
                            </td>
                            <td class="project-state"><?php echo $row['level']; ?></td>
                            <td class="project-actions text-center" project-state"">
                                <a class="btn btn-info btn-sm"
                                    href="resetpassword.php?update_id=<?php echo $row['id_user']; ?>" class="edit"
                                    title="Edit" data-toggle="tooltip">
                                    <i class="fas fa-pencil-alt"></i> Xét duyệt
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