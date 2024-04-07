<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xóa dữ liệu xe cũ</title>
</head>
<body>
    <?php
        $id_xecu = $_GET['id_xecu'];

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "Ket noi khong thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "DELETE FROM xecu WHERE id_xecu= '" .$id_xecu . "'";

            $result = mysqli_query($conn, $query);
            if ($result > 0){
                echo 'Xoa du lieu thanh cong';
            }
            else{
                echo 'Loi xoa du lieu';
            }
        }
    ?>
    <a href="xecu.php">Quay lại</a>
</body>
</html>