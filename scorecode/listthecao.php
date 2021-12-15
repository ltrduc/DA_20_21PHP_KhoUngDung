<?php
include('config.php');
$sql = "SELECT * FROM cards";
$result = mysqli_query($mysqli, $sql);
?>

<?php
if (isset($_GET["delete_id"])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM cards WHERE id_cards = '$id'";
    mysqli_query($mysqli, $sql);
    echo "<script> window.location='admin.php?select=listthecao'; </script>";
}
?>

<?php
include('config.php');
if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Bạn không có quyền truy cập trang web này!') </script>";
    echo "<script> window.location='admin.php'; </script>";
    exit;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý thẻ cào</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý thẻ cào</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row" style="margin: 0 50px;">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách thẻ cào</h3>
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
                                    <th style="width: 15%">Mã thẻ cào</th>
                                    <th style="width: 15%">Số seri</th>
                                    <th style="width: 20%">Mệnh giá (VNĐ)</th>
                                    <th style="width: 10%">Tùy chỉnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <th class="project-state"><?php echo $i++; ?></th>
                                        <td class="project-state" style="padding: 12px;"><?php echo $row['id_card']; ?></td>
                                        <td class="project-state"><?php echo $row['id_seri']; ?></td>
                                        <td class="project-state"><?php echo $row['price']; ?></td>
                                        <td class="project-actions" project-state>
                                            <a class="btn btn-danger btn-sm" Onclick="return ConfirmDelete();" href="listthecao.php?delete_id=<?php echo $row['id_cards']; ?>" name="delete" type="submit"><i class="fa fa-trash-o" aria-hidden="true">
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm Thẻ Cào</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="add_price.php" method="POST">
                            <div class="">
                                <div class="mb-3 ">
                                        <label class="form-label" for="inputZip">Số Lượng Thẻ:</label>
                                        <input type="text" name="index" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <label class="form-label" for="inputZip">Mệnh Giá:</label>
                                    <select class="form-control" aria-label="Default select example" name="price">
                                        <option selected="" disabled="">Chọn mệnh giá</option>
                                        <option value="10000">10.000 VNĐ</option>
                                        <option value="20000">20.000 VNĐ</option>
                                        <option value="50000">50.000 VNĐ</option>
                                        <option value="100000">100.000 VNĐ</option>
                                        <option value="200000">200.000 VNĐ</option>
                                        <option value="500000">500.000 VNĐ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="card clearfix" style="width: 80px; margin-left: 20px;">
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