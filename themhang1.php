<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Thông Tin</title>
</head>

<body>
	<?php
	$id_hang = $_REQUEST["id_hang"];
	$danhmuc = $_REQUEST["danhmuc"];
	

	$conn = mysqli_connect("localhost", "root", "") or die ("Không thể kết nối với máy chủ"); // Tạo kết nối với máy chủ
	mysqli_select_db($conn, "btcknhom5") or die ("Không tìm thấy CSDL"); // Chọn CSDL để làm việc
	$sql = "INSERT INTO `danhmuchang` (`id_hang`, `danhmuc`) 
    VALUES ('$id_hang', '$danhmuc')"; // Đặt các giá trị trong dấu nháy đơn
	mysqli_query($conn, $sql);
   header("Location: danhmuchang.php");
	?>
</body>
</html> 