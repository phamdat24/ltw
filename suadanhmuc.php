<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa Hãng Xe</title>
</head>

<body>
	<?php
	$id_hang=$_REQUEST["id_hang"];
	$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc
	
	$sql_select_danhmuc="Select * from `danhmuchang` where id_hang =$id_hang";
	$result_se_danhmuc=mysqli_query($conn,$sql_select_danhmuc);
	$row=mysqli_fetch_object($result_se_danhmuc);
	$id_hang=$row->id_hang;
	$danhmuc=$row->danhmuc;
	?>
	<form name="frm_suahangxe" action="suadanhmuc1.php" method="post">
		<input type="hidden" name="id_hang" value ="<?php echo $id_hang ?>">
<table width="300" border="1" align="center">
  <tbody>
    <tr>
      <td colspan="2" align="center">Sửa danh mục</td>
    </tr>
    <tr>
      <td width="60">ID</td>
      <td width="224"><input type="text" name="id_hang" value="<?php echo $id_hang?>"></td>
    </tr>
    <tr>
      <td>Tên hãng</td>
      <td><input type="text" name="danhmuc" value="<?php echo $danhmuc?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit"></td>
    </tr>
  </tbody>
</table>
		</form>
</body>
</html>