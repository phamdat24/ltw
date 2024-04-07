<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới đánh giá </title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>ID: </td>
                <td> 
                    <input type="text" name="txtid_danhgia">
                </td>
            </tr>
            <tr>
                <td>Tên xe: </td>
                <td>
                    <input type="text" name="txttenxe">
                </td>
            </tr>
            <tr>
                <td>Đánh giá: </td>
                <td>
                    <textarea name="txtdanhgia"></textarea>
                </td>
            </tr>
            <tr>
                <td>Lượt mua: </td>
                <td>
                    <input type="text" name="txtluotmua">
                </td>
            </tr>
            <tr>
                <td>Nhận xét của khách hàng: </td>
                <td>
                    <input type="text" name="txtnhanxet">
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
    <a href="danhgia.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi']))
        {
            $id_danhgia= $_POST['txtid_danhgia'];
            $tenxe = $_POST['txttenxe'];
            $danhgia = $_POST['txtdanhgia'];
            $luotmua = $_POST['txtluotmua'];
            $nhanxet = $_POST['txtnhanxet'];

            $conn = mysqli_connect('localhost','root','','btcknhom5');
            if (!$conn){
                echo "ket noi khong thanh cong" . mysqli_connect_error();
            }
            else{
                $query = "INSERT INTO danhgia VALUES ('".$id_danhgia."','".$tenxe."','".$danhgia."','".$luotmua."','".$nhanxet."')";

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