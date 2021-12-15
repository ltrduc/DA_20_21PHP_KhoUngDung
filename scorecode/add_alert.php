<?php
include('config.php');
if (
  isset($_POST['add']) && $_POST['alert_content'] != ''
) {

  $alert_content = $_POST["alert_content"];
  $sql = "INSERT INTO `alert`(`alert_content`) VALUES ('$alert_content')";
  mysqli_query($mysqli, $sql);

  echo "<script> alert('Đã thêm thành công!') </script>";
  header("location:./admin.php?select=admin");
} else {
  echo "<script> alert('Thêm thất bại!') </script>";
  header("location:./admin.php?select=admin");
}
