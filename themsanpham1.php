<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm Thông Tin</title>
</head>

<body>
	<?php
	$idxe = $_REQUEST["id"];
	$tenxe = $_REQUEST["tenxe"];
    $gia = $_REQUEST["gia"];
    $soluong = $_REQUEST["soluong"];
    $anh = $_REQUEST["anh"];
    $danhmuc = $_REQUEST["danhmuc"];
    $mota=$_REQUEST["post_content"];
    $uploadDir_img_logo = "anhs/";

        $file_tmp = isset($_FILES['anh']['tmp_name']) ? $_FILES['anh']['tmp_name'] : ""; 
        $file_name = isset($_FILES['anh']['name']) ? $_FILES['anh']['name'] : ""; 
        $file_type = isset($_FILES['anh']['type']) ? $_FILES['anh']['type'] : ""; 
        $file_size = isset($_FILES['anh']['size']) ? $_FILES['anh']['size'] : ""; 
        $file_error = isset($_FILES['anh']['error']) ? $_FILES['anh']['error'] : "";
        
    

$dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s"); ///Lay gio cua he thong
    $file__name__=$dmyhis.$file_name;
    copy ( $file_tmp, $uploadDir_img_logo.$file__name__);	

	

	$conn = mysqli_connect("localhost", "root", "") or die ("Không thể kết nối với máy chủ"); // Tạo kết nối với máy chủ
	mysqli_select_db($conn, "btcknhom5") or die ("Không tìm thấy CSDL"); // Chọn CSDL để làm việc
	$sql = "INSERT INTO `hienthixe` (`idxe`, `tenxe`, `gia`, `soluong`, `anh`, `danhmuc`, `mota`) 
    VALUES ('$idxe', '$tenxe', '$gia', '$soluong', '$file__name__', '$danhmuc','$mota')"; // Đặt các giá trị trong dấu nháy đơn
	mysqli_query($conn, $sql);
   header("Location: hienthixe.php");
	?>
</body>
</html> 