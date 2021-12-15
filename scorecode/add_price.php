<?php
include('config.php');
if (isset($_POST['add']) && $_POST['price'] != '' && $_POST["index"] != '') {

    $price = $_POST["price"];
    $index = $_POST["index"];
    for ($x = 1; $x <= $index; $x++) {
        $id_card = mt_rand(100000000, 999999999);
        $id_seri = mt_rand(100000000, 999999999);
        $sql = "INSERT INTO `cards`(`id_card`, `id_seri`, `price`) VALUES ('$id_card', '$id_seri','$price')";
        mysqli_query($mysqli, $sql);
    }

    echo "<script> alert('Đã thêm thành công!') </script>";
    header("location:./admin.php?select=listthecao");
} else {
    echo "<script> alert('Thêm thất bại!') </script>";
    header("location:./admin.php?select=listthecao");
}
