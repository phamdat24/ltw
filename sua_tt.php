<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhật tin tức mới</title>
</head>
<body>
    <?php
        $id_tt= $_GET['id_tt'];
        $tentt = "";
        $mota = "";

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "ket noi thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "SELECT * FROM tintuc WHERE id_tt='" .$id_tt . "'";

            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_assoc($result)){
                $tentt = $rows["tentt"];
                $mota = $rows["mota"];
            }
        }
    ?>
    <form method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="txtid_tt" value="<?php echo("$id_tt") ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Tên tin tức</td>
                <td>
                    <input type="text" name="txttentt" value="<?php echo $tentt ?>">
                </td>  
            </tr>
            <tr>
                <td>Mô tả</td>
                <td>
                    <textarea name="txtmota">
                        <?php echo("$mota") ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="SUBMIT" name="btnGHI">Ghi dữ liệu</button>
                </td>
            </tr>
        </table>
    </form>
    <a href="tintuc.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGHI']))
        {
            $tentt = $_POST['txttentt'];
            $mota = $_POST['txtmota'];
            $conn = mysqli_connect('localhost','root','','btcknhom5');
            if (!$conn){
                echo "Ket noi thanh cong" .  mysqli_connect_error();
            }
            else{
                $query = "UPDATE tintuc SET tentt='".$tentt."',mota='".$mota."' WHERE id_tt='".$id_tt."'";

                $result = mysqli_query($conn, $query);
                if ($result > 0){
                    echo "Cap nhat du lieu thanh cong";
                }
                else{
                    echo "Loi ghi du lieu";
                }
            }
        }
    ?>

