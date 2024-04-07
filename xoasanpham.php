<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id=$_REQUEST["idxe"];

	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	$sql_del_sp="DELETE FROM `hienthixe` WHERE `hienthixe`.`idxe`=$id";
	mysqli_query($conn,$sql_del_sp);
	header("Location: hienthixe.php");
	?>
</body>
</html>