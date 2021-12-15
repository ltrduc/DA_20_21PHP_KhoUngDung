<?php
include('config.php');
session_start();

if (isset($_POST['login']) && $_POST['username'] != "" && $_POST['password'] != "") {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$u' AND password ='$p'";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($query);
    $level = $row['level'];

    switch ($level) {
        case "0":
            echo "<script> alert('Đăng nhập thành công!') </script>";
            $_SESSION['admin'] = $u;
            $_SESSION['level'] = $level;
            echo "<script> window.location='admin.php'; </script>";
            break;
        case "1":
            $sql = "SELECT * FROM user WHERE username = '$u' AND password ='$p'";
            $query = mysqli_query($mysqli, $sql);
            $num_row = mysqli_num_rows($query);
            if ($num_row != 0) {
                echo "<script> alert('Đăng nhập thành công!') </script>";
                $_SESSION['developer'] = $u;
                $_SESSION['level'] = $level;
                echo "<script> window.location='admin.php'; </script>";
            } else {
                echo "<script> alert('Không có quyền truy cập!') </script>";
                echo "<script> window.location='admin.php'; </script>";
            }
            break;
        default:
            $sql = "SELECT * FROM user WHERE username = '$u' AND password ='$p'";
            $query = mysqli_query($mysqli, $sql);
            $num_row = mysqli_num_rows($query);
            if ($num_row != 0) {
                echo "<script> alert('Đăng nhập thành công!') </script>";
                $_SESSION['user'] = $u;
                echo "<script> window.location='user.php'; </script>";
            } else {
                echo "<script> alert('Tài khoản không khả dụng!') </script>";
                echo "<script> window.location='index.php'; </script>";
            }
    }
} else {
    echo "<script> alert('Có gì đó không đúng, vui lòng thử lại!') </script>";
    header('location:index.php');
}
