<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa danh sách xe</title>
<script src="ckeditor5/ckeditor.js"></script>
<script src="ckeditor5/ckfinder/ckfinder.js"></script>
</head>

<body>
    <?php
    $id=$_REQUEST["idxe"];
    $conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
    mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc

    $sql_select_sanpham="Select * from `hienthixe` where idxe=$id";
    $result_se_sanpham=mysqli_query($conn,$sql_select_sanpham);
    $row=mysqli_fetch_object($result_se_sanpham);
    $id=$row->idxe;
    $tenxe=$row->tenxe;
    $gia=$row->gia;
    $soluong=$row->soluong;

    $anh=$row->anh;
    $danhmuc=$row->danhmuc;
    $mota=$row->mota;


    ?>
     <form method="POST" action="suasanpham1.php?id=<?php echo $id ?>" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td colspan="3" align="center">Nhập sản phẩm</td>
            </tr>
            <tr>
                <td width="100">Id</td>
                <td><input type="text" name="id" value="<?php echo $id ?>" ></td>
            </tr>
            <tr>
                <td width="100">Tên sản phẩm</td>
                <td><input type="text" name="tenxe" value="<?php echo $tenxe ?>"></td>
            </tr>
            <tr>
                <td width="100">Gía</td>
                <td><input type="text" name="gia" value="<?php echo $gia ?>"></td>
            </tr>
            <tr>
                <td width="100">Số Lượng</td>
                <td><input type="text" name="soluong" value="<?php echo $soluong ?>"></td>
            </tr>
            <tr>
                <td width="100">Ảnh</td>
                <td><img src="anhs/<?php echo $anh;?>"><input type="file" name="anh" /></td>
            </tr>
            <tr>
                <td width="200">Danh mục sản phẩm</td>
                <td><input type="text" name="danhmuc" value="<?php echo $danhmuc ?>"></td>
            </tr>
            <tr>
            <td>Mô Tả Sản Phẩm</td>
            <td><textarea name="post_content" id="post_content" ></textarea></td>
        </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Gửi"/></td>
            </tr>
        </table>
    </form>
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