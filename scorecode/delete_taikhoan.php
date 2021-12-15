<?php
include('config.php');
if (isset($_POST["delete"])) {
	$id = $_GET['delete_id'];
	$sql = "DELETE FROM user WHERE id_user = '$id'";
	mysqli_query($mysqli, $sql);
	header('location:./admin.php?select=listtaikhoan');
}
