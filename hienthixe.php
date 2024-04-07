<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XE</title>
	  <style type="text/css">
    table, tr, td, th{
        border: solid 1px black;
        border-spacing: 0px;

    }
    td{
        background-color:Gainsboro;
        color: black;
    }
    .search{
        margin: 8px 0px;
    }
    </style>
  
</head>
<body>
<?php
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	$sql_select_sanpham="Select * from `hienthixe`";
	$result_se_sanpham=mysqli_query($conn,$sql_select_sanpham);
	$tong_bg=mysqli_num_rows($result_se_sanpham);
	
	$stt_sp=0;
while($row=mysqli_fetch_object($result_se_sanpham))
{
	$stt_sp++;
	$idxe[$stt_sp]=$row->idxe;
	$tenxe[$stt_sp]=$row->tenxe;
    $gia[$stt_sp]=$row->gia;
    $soluong[$stt_sp]=$row->soluong;
    $anh[$stt_sp]=$row->anh;
    
    //$sql_danhmuc = "SELECT danhmuc FROM danhmuchang WHERE id_hang = '{$row->danhmuc}'";
//$result_danhmuc = mysqli_query($conn, $sql_danhmuc);
//$row_danhmuc = mysqli_fetch_assoc($result_danhmuc);
$danhmuc[$stt_sp] = $row->danhmuc;
$mota[$stt_sp]=$row->mota;

}
	?>
    <table align="center" width="1000" border="1">
  <thead>
    <tr>
      <td colspan="8" align="center">Danh sách sản phẩm</td>
     
     
    </tr>
    
    <tr>
      <td align="center" width="300">Id</td>
      <td align="center" width="300">Tên xe</td>
      <td align="center" width="300">Giá</td>
      <td align="center" width="300">Số lượng</td>
      <td align="center" width="50">Ảnh</td>
      <td align="center" width="300">Danh mục</td>
      <td align="center" width="300">Mô Tả</td>
      <td align="center" width="600">Chức năng</td>
    </tr>
  </thead>
      <?php
	  for($i=1;$i<=$tong_bg;$i++)
	  {
		  
	  ?>
    <tr>
	
    <td align="center"><?php echo $i?></td>
      <td align="center"><?php echo $tenxe[$i] ?>&nbsp;</td>
      <td align="center"><?php echo $gia[$i] ?>&nbsp;</td>
      <td align="center"><?php echo $soluong[$i] ?>&nbsp;</td>
      <td align="center"><img src="anhs/<?php echo $anh[$i] ?>"  width = "100px" height="100px" ></td>
		<td align="center"><?php echo $danhmuc[$i] ?>&nbsp;</td>

      <td align="center"><?php echo $mota[$i] ?>&nbsp;</td>

      <td align="center"><a href="/btcknhom5/suasanpham.php?idxe=<?php echo $idxe[$i]?>">Sửa</a> |
		  <a href="/btcknhom5/xoasanpham.php?idxe=<?php echo $idxe[$i]?>">Xóa</a> |</td>
    </tr>
	  <?php
	  }
	  ?>
    <tr>
      <td colspan="9" align="center">Có tổng số <?php echo $tong_bg?> mục sản phẩm<a href="/btcknhom5/themsanpham.php?">Thêm Sản Phẩm</a></td>
    </tr>
    </table>
</body>
</html>
