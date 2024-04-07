<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id=$_REQUEST["id_hang"];

	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	$sql_del_dm="DELETE FROM danhmuchang WHERE `danhmuchang`.`id_hang`=$id";
	mysqli_query($conn,$sql_del_dm);
	header("Location: danhmuchang.php");
	?>
</body>
</html>