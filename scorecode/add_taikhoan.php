<?php
include('config.php');
if (
  isset($_POST['add']) && $_POST['username'] != '' && $_POST['password'] != ''  && $_POST['fullname'] != '' && $_POST['email'] != ''
  && $_POST['address'] != '' && $_POST['phone'] != '' && $_POST['level'] != ''
) {

  $u = $_POST["username"];
  $p = $_POST["password"];
  $f = $_POST["fullname"];
  $e = $_POST['email'];
  $dc = $_POST["address"];
  $sdt = $_POST["phone"];
  $l = $_POST["level"];

  $sql = "SELECT * FROM user WHERE username = '$u'";
  $old = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($old) > 0) {
    echo "<script> alert('Tài khoản đã tồn tại!') </script>";
    header("location:./admin.php?select=themtaikhoan");
  }

  $sql = "INSERT INTO `user`(`username`, `password`, `fullname`, `email`, `address`, `phone`, `level`, `img_avatar`, `status`) 
  VALUES ('$u', '$p', '$f', '$e', '$dc', '$sdt', '$l', 'image/img_avt_df/avatar.png', '0')";
  mysqli_query($mysqli, $sql);
  echo "<script> alert('Tài khoản đã thêm thành công!') </script>";
  header("location:./admin.php?select=listtaikhoan");
} else {
  echo "<script> alert('Tài khoản thêm thất bại!') </script>";
  header("location:./admin.php?select=listtaikhoan");
}
