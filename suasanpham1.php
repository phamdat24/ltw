<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="ckeditor5/ckeditor.js"></script>
    <script src="ckeditor5/ckfinder/ckfinder.js"></script>
</head>

<body>
	<?php
	$id = $_REQUEST["idxe"];
	$tenxe = $_REQUEST["tenxe"];
    $gia = $_REQUEST["gia"];
    $soluong = $_REQUEST["soluong"];
    $anh = $_REQUEST["anh"];
    $danhmuc = $_REQUEST["danhmuc"];
    $mota=$_REQUEST["post_content"];
    $uploadDir_img_logo = "anhs/";
   

    $conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");
    $uploadDir_img_logo = "anhs/";

    $file_tmp = isset($_FILES['anh']['tmp_name']) ? $_FILES['anh']['tmp_name'] : ""; 
    $file_name = isset($_FILES['anh']['name']) ? $_FILES['anh']['name'] : ""; 
    $file_type = isset($_FILES['anh']['type']) ? $_FILES['anh']['type'] : ""; 
    $file_size = isset($_FILES['anh']['size']) ? $_FILES['anh']['size'] : ""; 
    $file_error = isset($_FILES['anh']['error']) ? $_FILES['anh']['error'] : "";
    
    if($file_name!="")
	{
$dmyhis=date("Y").date("m").date("d").date("H").date("i").date("s"); ///Lay gio cua he thong
$file__name__=$dmyhis.$file_name;
copy ( $file_tmp, $uploadDir_img_logo.$file__name__);
	
	
	
$sql_update_dm="UPDATE `hienthixe` SET `tenxe` = '$tenxe',`gia` = '$gia',`soluong` = '$soluong',`anh` = '$file__name__',`danhmuc` = '$danhmuc',`mota` = '$mota' WHERE `danhsachxe`.`idxe` = $id"; 
	}
	
	else
	{
        $sql_update_dm="UPDATE `hienthixe` SET `tenxe` = '$tenxe',`gia` = '$gia',`soluong` = '$soluong',`danhmuc` = '$danhmuc',`mota` = '$mota' WHERE `danhsachxe`.`idxe` = $id"; 
	}
   
  mysqli_query($conn,$sql_update_dm);
	header("Location: hienthixe.php");
	?>
     <script>
       

       ClassicEditor
           .create(document.querySelector('#post_content'), {
               ckfinder: {
                 uploadUrl: 'connector.php'
               }
           })
           .then(editor => {
               console.log("Editor 2 created:", editor);
           })
           .catch(error => {
               console.error(error);
           });
   </script>
</body>
</html>