
<?php

//********************************************************
function layten($table,$field_ten,$value_ma,$field_ma,$value_ma2="",$field_dieukien2="")
{
$conn=mysqli_connect("localhost","root","") or die ("Không connect đc với máy chủ");//tạo kết nối với server
	mysqli_select_db($conn,"btcknhom5") or die ("Không tìm thấy CSDL");// Tìm CSDL đề làm việc

	if($value_ma2<>"")
		$where___=" and $field_dieukien2='$value_ma2'";
	
$sql___="SELECT $field_ten FROM $table WHERE $field_ma='$value_ma' $where___";
	echo $sql___;die();
//echo $sql___;
$result______=mysqli_query($link,$sql___);
if(mysqli_num_rows($result______)!=0)
	{
		while($row______=mysql_fetch_object($result______))	
		{	$ten=$row______->$field_ten; }
		
	}
	return $ten;
}
//********************************************************
//[Creator]   : ToDuongvpvn
//********************************************************
?>