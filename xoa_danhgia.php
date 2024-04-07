<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xóa dữ liệu đánh giá</title>
</head>
<body>
    <?php
        $id_danhgia = $_GET['id_danhgia'];

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "Ket noi khong thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "DELETE FROM danhgia WHERE id_danhgia= '" .$id_danhgia . "'";

            $result = mysqli_query($conn, $query);
            if ($result > 0){
                echo 'Xoa du lieu thanh cong';
            }
            else{
                echo 'Loi xoa du lieu';
            }
        }
    ?>
    <a href="danhgia.php">Quay lại</a>
</body>
</html>