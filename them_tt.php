<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới tin tức </title>
</head>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>ID: </td>
                <td> 
                    <input type="text" name="txtid_tt">
                </td>
            </tr>
            <tr>
                <td>Tên tin tức: </td>
                <td>
                    <input type="text" name="txttentt">
                </td>
            </tr>
            <tr>
                <td>mô tả: </td>
                <td>
                    <input type="text" name="txtmota">
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
    <a href="tintuc.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGhi']))
        {
            $id_tt= $_POST['txtid_tt'];
            $tentt = $_POST['txttentt'];
            $mota = $_POST['txtmota'];
            
            $conn = mysqli_connect('localhost','root','','btcknhom5');
            if (!$conn){
                echo "ket noi khong thanh cong" . mysqli_connect_error();
            }
            else{
                $query = "INSERT INTO tintuc VALUES ('".$id_tt."','".$tentt."','".$mota."')";

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