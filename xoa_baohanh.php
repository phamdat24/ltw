<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xóa dữ liệu bảo hành</title>
</head>
<body>
    <?php
        $id_baohanh = $_GET['id_baohanh'];

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "Ket noi khong thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "DELETE FROM baohanh WHERE id_baohanh= '" .$id_baohanh . "'";

            $result = mysqli_query($conn, $query);
            if ($result > 0){
                echo 'Xoa du lieu thanh cong';
            }
            else{
                echo 'Loi xoa du lieu';
            }
        }
    ?>
    <a href="baohanh.php">Quay lại</a>
</body>
</html>