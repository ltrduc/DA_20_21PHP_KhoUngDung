<?php

// Kết nối CSDL
include_once('config.php');

// Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
// tồn tại key này trong biến toàn cục $_POST thì nghĩa là người
// dùng đã click register(submit)
if (isset($_POST['recover'])) {
    // Lấy thông tin
    $username   = $_POST['username'];
    $email      = $_POST['email'];

    // Validate Thông Tin Username và Email có bị trùng hay không

    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM user WHERE username = '$username' AND email = '$email'";

    // Thực thi câu truy vấn
    $result = mysqli_query($mysqli, $sql);

    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        $newpwd = mt_rand(100000, 999999);
        $sql = "UPDATE `user` SET `password` = '$newpwd', `status` = 1 WHERE username = '$username'";
        if (mysqli_query($mysqli, $sql)) {
            echo "<script> alert('Vui Lòng Chờ Email của Quản Trị Viên') </script>";
            echo "<script> window.location='index.php'; </script>";
        } else {
            echo "<script> alert('Sai Thông Tin!') </script>";
            echo "<script> window.location='index.php'; </script>";
        }
    } else {
        echo '<script language="javascript">alert("Quá trình xử lý thất bại. Vui lòng nhập đúng thông tin!"); window.location="index.php";</script>';
    }
}
