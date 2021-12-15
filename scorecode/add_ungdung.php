<?php
include_once('config.php');
if (
    isset($_POST['add']) && $_POST['name_app'] != '' && $_POST['poster'] != ''  && $_POST['category'] != ''
    && $_POST['cost'] != '' && $_POST['describes'] != '' && $_POST['prie'] != ''
) {

    $name_app = $_POST['name_app'];
    $poster = $_POST['poster'];
    $category = $_POST['category'];
    $cost = $_POST['cost'];
    $price = $_POST['prie'];
    $describes = $_POST['describes'];

    $filename = $_FILES['myfile']['name'];
    // destination of the file on the server
    $destination = 'files/' . $filename;
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip'])) {
        echo "<script> alert('File phải là  .zip') </script>";
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    } elseif ($_FILES['myfile']['size'] > 100000000000000000000000000) { // file shouldn't be larger than 1Megabyte
        echo "<script> alert('Dung lượng  quá lớn! ') </script>";
        echo "<script> window.location='admin.php?select=listungdung'; </script>";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO `apps`(`name_app`, `poster`, `category`, `describes`, `cost`, `prie`, `file`, `img_app`, `status`, `show`) 
                    VALUES ('$name_app','$poster','$category','$describes','$cost','$price','$filename','image/img_sanpham_df/logosanpham.png', 0, 'Đang chờ xét')";
            if (mysqli_query($mysqli, $sql)) {
                echo "<script> alert('Thêm thành công') </script>";
                echo "<script> window.location='admin.php?select=listungdung'; </script>";
            }
        } else {
            echo "<script> alert('Thêm không thành công') </script>";
            echo "<script> window.location='admin.php?select=listungdung'; </script>";
        }
    }
}
