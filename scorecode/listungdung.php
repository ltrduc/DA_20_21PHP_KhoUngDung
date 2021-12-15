<?php
include('config.php');
$sql = "SELECT * FROM apps";
$result = mysqli_query($mysqli, $sql);
?>

<?php
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM apps WHERE id_app = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listungdung'; </script>";
}
?>

<?php
if (isset($_GET["update_id"])) {
    $id = $_GET['update_id'];
    $show = "Đã được duyệt";
    $sql = "UPDATE `apps` SET `status`= 1, `show` = '$show' WHERE id_app = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listungdung'; </script>";
}
?>

<?php
if (isset($_GET["danglai"])) {
    $id = $_GET['danglai'];
    $sql_danglai = "SELECT * FROM apps WHERE id_app = '$id'";
    $result_danglai = mysqli_query($mysqli, $sql_danglai);
    $showapps = mysqli_fetch_assoc($result_danglai);

    $shows = $showapps['show'];
    $show1 = "Đã được duyệt";

    if ($shows == $show1){
        $sql = "UPDATE `apps` SET `status`= 1 WHERE id_app = '$id'";
        mysqli_query($mysqli, $sql);
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    } else {
        echo "<script> alert('Ứng dụng của bạn đã bị từ chối!') </script>";
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    }
}
?>

<?php
if (isset($_GET["tuchoi"])) {
    $id = $_GET['tuchoi'];
    $show = "Từ chối xét duyệt";
    $sql = "UPDATE `apps` SET `status`= 0, `show` = '$show' WHERE id_app = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listungdung'; </script>";
}
?>

<?php
if (isset($_GET["hide"])) {
    $id = $_GET['hide'];
    $sql = "UPDATE `apps` SET `status`= 0 WHERE id_app = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listungdung'; </script>";
}
?>

<style>
    p.text-content {
        white-space: nowrap;
        width: 100px;
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
                    <a class="btn btn-primary btn-sm" target="_blank" href="admin.php?select=themungdung">
                        <i class="fas fa-plus"></i> Thêm Ứng Dụng
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
                <table class="table table-striped projects" id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 1%" class="text-center">
                                #
                            </th>
                            <th style="width: 7%" class="text-center">
                                Ảnh ứng dụng
                            </th>
                            <th style="width: 5%" class="text-center">
                                Tên ứng dụng
                            </th>
                            <th style="width: 5%" class="text-center">
                                Người đăng
                            </th>
                            <th style="width: 5%" class="text-center">
                                Thể loại
                            </th>
                            <th style="width: 5%" class="text-center">
                                Mô tả
                            </th>
                            <th style="width: 5%" class="text-center">
                                Chi phí
                            </th>
                            <th style="width: 5%" class="text-center">
                                File ứng dụng
                            </th>
                            <th style="width: 5%" class="text-center">
                                Trạng thái
                            </th>
                            <th style="width: 5%" class="text-center">
                                Trạng thái duyệt
                            </th>
                            <th style="width: 50%" class="text-center">
                                Tùy chỉnh
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td class="project-state"><?php echo $i++; ?></td>
                                <td class="project-state"><img class="rounded-circle rounded me-2 mb-2" class="avatar" style="height: 50px; width:50px;" src="<?php echo $row['img_app']; ?>" class="avatar img-circle img-thumbnail" alt="avatar"></td>
                                <td class="project-state">
                                    <p class="text-content"><?php echo $row['name_app']; ?></p>
                                </td>
                                <td class="project-state">
                                    <p class="text-content"><?php echo $row['poster']; ?>
                                </td>
                                <td class="project-state"><?php echo $row['category']; ?></td>
                                <td class="project-state">
                                    <p class="text-content"><?php echo $row['describes']; ?></p>
                                </td>
                                <td class="project-state"><?php echo $row['cost']; ?></td>
                                <td class="project-state">
                                    <p class="text-content"><?php echo $row['file']; ?></p>
                                </td>
                                <td class="project-state"><?php echo $row['status']; ?></td>
                                <td class="project-state"><?php echo $row['show']; ?></td>
                                <?php
                                if (isset($_SESSION['admin'])) { ?>
                                    <td class="project-actions text-center" project-state>
                                        <a class="btn btn-primary btn-sm" href="download.php?file=<?php echo $row["file"]; ?>" name="down" type="submit" class="btn btn-danger">Download</a>
                                        <a class="btn btn-info btn-sm" href="edit_ungdung.php?id=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-info btn-sm" href="listungdung.php?hide=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="fas fa-trash"></i> Gỡ
                                        </a>
                                        <a class="btn btn-info btn-sm" href="listungdung.php?tuchoi=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="fas fa-trash"></i> Từ chối
                                        </a>
                                        <a class="btn btn-info btn-sm" href="listungdung.php?update_id=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i> Xét duyệt
                                        </a>
                                        <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="listungdung.php?delete_id=<?php echo $row['id_app']; ?>" name="delete" type="submit"> <i class="fa fa-trash-o" aria-hidden="true">
                                                <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                <?php } else  { ?>
                                    <td class="project-actions text-center" project-state>
                                        <a class="btn btn-primary btn-sm" href="download.php?file=<?php echo $row["file"]; ?>" name="down" type="submit" class="btn btn-danger">Download</a>
                                        <a class="btn btn-info btn-sm" href="edit_ungdung.php?id=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <a class="btn btn-info btn-sm" href="listungdung.php?hide=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="fas fa-trash"></i> Gỡ
                                        </a>
                                        <a class="btn btn-info btn-sm" href="listungdung.php?danglai=<?php echo $row['id_app']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="fas fa-pencil-alt"></i> Đăng lại
                                        </a>
                                        <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="listungdung.php?delete_id=<?php echo $row['id_app']; ?>" name="delete" type="submit"> <i class="fa fa-trash-o" aria-hidden="true">
                                                <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>

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