<?php
include('config.php');

$sql = "SELECT *
FROM comments, apps, user
WHERE comments.id_app = apps.id_app AND user.id_user = comments.id_user";
$result = mysqli_query($mysqli, $sql);
?>

<style>
    p.text-content {
        white-space: nowrap;
        width: 200px;
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
                    <h1>Danh Sách Đánh Giá</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Danh Sách Đánh Giá</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card" style="margin: 0  90px 20px 90px;">
            <div class="card-header">
                <h3 class="card-title">Danh Sách Đánh Giá</h3>
                <div class="card-tools">
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
                                Ảnh
                            </th>
                            <th style="width: 20%" class="text-center">
                                Tên đăng nhập
                            </th>
                            <th style="width: 20%" class="text-center">
                                Họ và tên
                            </th>
                            <th style="width: 20%" class="text-center">
                                Ứng Dụng
                            </th>
                            <th style="width: 15%" class="text-center">
                                Nội Dung
                            </th>
                            <th style="width: 1%" class="text-center">
                                Vote
                            </th>
                            <th style="width: 10%" class="text-center">
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
                                <td class="project-state"><?php echo $row['fullname']; ?></td>
                                <td class="project-state"><?php echo $row['name_app']; ?></td>
                                <td class="project-state">
                                    <p class="text-content text-center"><?php echo $row['comment']; ?></p>
                                </td>
                                <td class="project-state"><?php echo $row['vote'];; ?></td>
                                <td class="project-actions text-center" project-state>
                                    <!-- view_danhgia.php?id=<?php echo $row['id_user']; ?> -->
                                    <a class="btn btn-info btn-sm" href="view_danhgia.php?iddanhgia=<?php echo $row['id_user']; ?>" class="edit" title="Edit">
                                        <i class="fas "></i> View
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