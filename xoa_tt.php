<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xóa dữ liệu tin tức</title>
</head>
<body>
    <?php
        $id_tt = $_GET['id_tt'];

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "Ket noi khong thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "DELETE FROM tintuc WHERE id_tt= '" .$id_tt . "'";

            $result = mysqli_query($conn, $query);
            if ($result > 0){
                echo 'Xoa du lieu thanh cong';
            }
            else{
                echo 'Loi xoa du lieu';
            }
        }
    ?>
    <a href="tintuc.php">Quay lại</a>
</body>
</html>