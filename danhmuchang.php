<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh mục hãng</title>
  
</head>
<body>
<?php
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	$sql_select_danhmuc="Select * from `danhmuchang`";
	$result_se_danhmuc=mysqli_query($conn,$sql_select_danhmuc);
	$tong_bg=mysqli_num_rows($result_se_danhmuc);
	
	$stt_id=0;
while($row=mysqli_fetch_object($result_se_danhmuc))
{
	$stt_id++;
	$id_hang[$stt_id]=$row->id_hang;
	$danhmuc[$stt_id]=$row->danhmuc;

}
	?>
    <table align="center" width="800" border="1">
  <thead>
    <tr>
      <td colspan="3" align="center">Danh Mục Sản Phẩm</td>
     
     
    </tr>
    
    <tr>
      <td align="center" width="50">ID</td>
      <td align="center" width="200">Danh Mục</td>
    
      <td align="center" width="250">Chức Năng</td>

    </tr>
  </thead>
      <?php
	  for($i=1;$i<=$tong_bg;$i++)
	  {
	  ?>
     
    <tr>
    <td align="center"><?php echo $i?></td>
      <td align="center"><?php echo $danhmuc[$i] ?>&nbsp;</td>
      <td align="center"><a href="/btcknhom5/suadanhmuc.php?id_hang=<?php echo $id_hang[$i]?>">Sửa</a> | <a href="/btcknhom5/xoadanhmuc.php?id_hang=<?php echo $id_hang[$i]?>">Xóa</a> | <a href="/btcknhom5/themhang.php">Thêm dữ liệu</a></td>
    </tr>
	  <?php
	  }
	  ?>
    <tr>
      <td colspan="3" align="center">Có tổng số <?php echo $tong_bg?> danh mục sản phẩm <a href="/btcknhom5/hienthixe.php?">Xem các loại xe hiện có</a></td>
    </tr>
    </table>
</body>
</html>
