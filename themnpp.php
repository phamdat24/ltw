<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới thông tin nhà phân phối </title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>ID: </td>
                <td> 
                    <input type="text" name="txtid_npp">
                </td>
            </tr>
            <tr>
                <td>Tên nhà cung cấp: </td>
                <td>
                    <input type="text" name="txttennpp">
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td>
                    <textarea name="txtdiachi"></textarea>
                </td>
            </tr>
            <tr>
                <td>Số Điện Thoại: </td>
                <td>
                    <input type="text" name="txtsdt">
                </td>
            </tr>
            <tr>
                <td>tên sản phẩm phân phối: </td>
                <td>
                    <input type="text" name="txtsppp">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>    
                    <button type="SUBMIT" name="btnGhi">Ghi dữ liệu</button>
                </td>
            </tr>
        </table>
    </form>
    <a href="nhaphanphoi.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi']))
        {
            $id_npp= $_POST['txtid_npp'];
            $tennpp = $_POST['txttennpp'];
            $diachi = $_POST['txtdiachi'];
            $sdt = $_POST['txtsdt'];
            $sppp = $_POST['txtsppp'];

            $conn = mysqli_connect('localhost','root','','btcknhom5');
            if (!$conn){
                echo "ket noi khong thanh cong" . mysqli_connect_error();
            }
            else{
                $query = "INSERT INTO nhaphanphoi VALUES ('".$id_npp."','".$tennpp."','".$diachi."','".$sdt."','".$sppp."')";

                $result = mysqli_query($conn, $query);
                if ($result > 0){
                    echo "ghi du lieu thanh cong";
                }
                else{
                    echo "loi ghi du lieu";
                }
                }
        }
    ?>
</body>
</html>