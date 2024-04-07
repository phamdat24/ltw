<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	$id=$_REQUEST["id_hang"];
	$danhmuc=$_REQUEST["danhmuc"];
	
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");
	$sql_update_dm="UPDATE `danhmuchang` SET `danhmuc` = '$danhmuc' WHERE `danhmuchang`.`id_hang` = $id";
	mysqli_query($conn,$sql_update_dm);
	header("Location: danhmuchang.php");
	?>
</body>
</html>