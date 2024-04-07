<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới thông tin bảo hành </title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>ID: </td>
                <td> 
                    <input type="text" name="txtid_baohanh">
                </td>
            </tr>
            <tr>
                <td>Tên xe: </td>
                <td>
                    <input type="text" name="txttenxe">
                </td>
            </tr>
            <tr>
                <td>Giá bán: </td>
                <td>
                    <textarea name="txtgia"></textarea>
                </td>
            </tr>
            <tr>
                <td>Thời gian bảo hành: </td>
                <td>
                    <input type="text" name="txtthoigian">
                </td>
            </tr>
            <tr>
                <td>Ưu đãi: </td>
                <td>
                    <input type="text" name="txtuudai">
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
    <a href="baohanh.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi']))
        {
            $id_baohanh= $_POST['txtid_baohanh'];
            $tenxe = $_POST['txttenxe'];
            $gia = $_POST['txtgia'];
            $thoigian = $_POST['txtthoigian'];
            $uudai = $_POST['txtuudai'];

            $conn = mysqli_connect('localhost','root','','btcknhom5');
            if (!$conn){
                echo "ket noi khong thanh cong" . mysqli_connect_error();
            }
            else{
                $query = "INSERT INTO baohanh VALUES ('".$id_baohanh."','".$tenxe."','".$gia."','".$thoigian."','".$uudai."')";

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