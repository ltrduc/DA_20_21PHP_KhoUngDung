<?php
include('config.php');
$sql = "SELECT * FROM category";
$result = mysqli_query($mysqli, $sql);
?>

<?php
if (isset($_SESSION['developer'])) {
    echo "<script> alert('Bạn không có quyền truy cập trang web này!') </script>";
    echo "<script> window.location='admin.php'; </script>";
    exit;
}
?>

<?php
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM category WHERE id_category = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listtheloai'; </script>";
}
?>

<?php
if (isset($_POST['fix'])) {
    $name_app = $_POST["name_app"];
    $poster = $_POST["poster"];
    $category = $_POST["category"];
    $cost = $_POST["cost"];

    $sql2 = "UPDATE `apps` SET `name_app` = '$name_app',`poster` ='$poster',`category` ='$category',`cost` ='$cost' WHERE id_app = '$id2'";
    if (mysqli_query($mysqli, $sql2)) {
        echo "<script> alert('Sửa thành công') </script>";
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    } else {
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý thể loại</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý thể loại</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin: 0 50px;">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách thể loại</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0" style="display: block;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 2%">#</th>
                                    <th style="width: 15%">Tên Thể Loại</th>
                                    <th style="width: 15%">Tùy Chỉnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <th class="project-state"><?php echo $i++; ?></th>
                                        <td class="project-state"><?php echo $row['category'];?></td>
                                        <td class="project-actions" project-state>
                                            <a class="btn btn-info btn-sm" href="edit_theloai.php?id=<?php echo $row['id_category']; ?>" class="edit" title="Edit" data-toggle="tooltip">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="listtheloai.php?delete_id=<?php echo $row['id_category']; ?>" name="delete" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
                                                    <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm Thể Loại</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_category.php" method="POST">
                            <div class="form-group">
                                <label for="category">Thể Loại:</label>
                                <input type="text" id="category" class="form-control" name="category">
                            </div>
                            <div class="form-group">
                                <div class="card clearfix" style="width: 80px;">
                                    <button name="add" type="submit" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->