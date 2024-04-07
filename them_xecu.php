<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới thông tin xe cũ </title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>ID: </td>
                <td> 
                    <input type="text" name="txtid_xecu">
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
                <td>Tuổi xe: </td>
                <td>
                    <input type="text" name="txttuoixe">
                </td>
            </tr>
            <tr>
                <td>Hãng của xe: </td>
                <td>
                    <input type="text" name="txthang">
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
    <a href="xecu.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi']))
        {
            $id_xecu= $_POST['txtid_xecu'];
            $tenxe = $_POST['txttenxe'];
            $gia = $_POST['txtgia'];
            $tuoixe = $_POST['txttuoixe'];
            $hang = $_POST['txthang'];

            $conn = mysqli_connect('localhost','root','','btcknhom5');
            if (!$conn){
                echo "ket noi khong thanh cong" . mysqli_connect_error();
            }
            else{
                $query = "INSERT INTO xecu VALUES ('".$id_xecu."','".$tenxe."','".$gia."','".$tuoixe."','".$hang."')";

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