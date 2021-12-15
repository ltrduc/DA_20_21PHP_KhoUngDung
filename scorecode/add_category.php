<?php
include('config.php');
if (
  isset($_POST['add']) && $_POST['category'] != ''
) {

  $category = $_POST["category"];
  $sql = "INSERT INTO `category`(`category`) VALUES ('$category')";
  mysqli_query($mysqli, $sql);

  echo "<script> alert('Đã thêm thành công!') </script>";
  header("location:./admin.php?select=listtheloai");
} else {
  echo "<script> alert('Thêm thất bại!') </script>";
  header("location:./admin.php?select=listtheloai");
}
