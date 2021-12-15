
<?php
include('config.php');

if (isset($_POST['checkpay']) && $_POST['id_user'] != '' && $_POST['id_card'] != '' && $_POST['id_seri'] != '') {

    $id_user = $_POST["id_user"];
    $id_card = $_POST["id_card"];
    $id_seri = $_POST["id_seri"];

    $sqlpcheckpay = "SELECT * FROM `cards`, `user` WHERE id_card = '$id_card' AND id_seri = '$id_seri' AND id_user = '$id_user'";
    $checkpay = mysqli_query($mysqli, $sqlpcheckpay);
    $rowcheckpay = mysqli_fetch_assoc($checkpay);
    if (mysqli_num_rows($checkpay) > 0) {
        $pricess = $rowcheckpay['price'];
        $id_cards =  $rowcheckpay['id_cards'];
        $datepay = date("d/m/Y");
        // them vào lịch sử nạp tiền
        $addhistore = "INSERT INTO `mobilerecharge`(`id_cards`, `id_user`, `mobilerecharge`, `date`) 
        VALUES ('$id_cards','$id_user','$pricess', '$datepay')";
        mysqli_query($mysqli, $addhistore);


        // Lấy danh sách tiền của người dùng.
        $total_pay = "SELECT * FROM mobilerecharge WHERE id_user = '$id_user'";
        $total_pays = mysqli_query($mysqli, $total_pay);
        $rows_totalpays = mysqli_fetch_assoc($total_pays);

        $total = $rows_totalpays['total'] + $pricess;

        $updatapays = "UPDATE `mobilerecharge` SET `total`='$total' WHERE id_user = '$id_user'";
        mysqli_query($mysqli, $updatapays);


        // Xóa thẻ cào trong bản cards để người dùng không thể nhập lại
        // $deletepay = "DELETE FROM `cards` WHERE id_card = '$id_card' AND id_seri = '$id_seri'";
        // mysqli_query($mysqli, $deletepay);
        header("location:./user.php");
    } else {
        echo "<script> alert('Sai số thẻ cào hoặc số Seri! Có thể thẻ này đã qua sử dụng') </script>";
        header("location:./user.php");
    }
} else {
    echo "<script> alert('Sai số thẻ cào hoặc số Seri!') </script>";
    header("location:./user.php");
}
?>

<?php

?>
