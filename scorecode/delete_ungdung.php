<?php
include('config.php');
if (isset($_POST["delete"])) {
	$id = $_GET['delete_id'];
	$sql = "DELETE FROM apps WHERE id_app = '$id'";
	mysqli_query($mysqli, $sql);
	header('location:./admin.php?select=listungdung');
}
