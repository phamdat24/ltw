<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhật đánh giá từ khách hàng</title>
</head>
<body>
    <?php
        $id_danhgia= $_GET['id_danhgia'];
        $tenxe = "";
        $danhgia = "";
        $luotmua = "";
        $nhanxet = "";

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "ket noi thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "SELECT * FROM danhgia WHERE id_danhgia='" .$id_danhgia . "'";

            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_assoc($result)){
                $tenxe = $rows["tenxe"];
                $danhgia = $rows["danhgia"];
                $luotmua = $rows["luotmua"];
                $nhanxet = $rows["nhanxet"];  
            }
        }

    ?>
    <form method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="txtid_danhgia" value="<?php echo("$id_danhgia") ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Tên xe</td>
                <td>
                    <input type="text" name="txttenxe" value="<?php echo $tenxe ?>">
                </td>  
            </tr>
            <tr>
                <td>Đánh giá</td>
                <td>
                    <textarea name="txtdanhgia">
                        <?php echo("$danhgia") ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Lượt mua</td>
                <td>
                    <input type="text" name="txtluotmua" value="<?php echo $luotmua ?>">
                </td>
            </tr>
            <tr>
                <td>Nhận xét của khách hàng</td>
                <td>
                    <input type="text" name="txtnhanxet" value="<?php echo $nhanxet ?>">
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
    <a href="danhgia.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGHI']))
        {
            $tenxe = $_POST['txttenxe'];
            $danhgia = $_POST['txtdanhgia'];
            $luotmua = $_POST['txtluotmua'];
            $nhanxet = $_POST['txtnhanxet'];
            $conn = mysqli_connect('localhost','root','','btcknhom5');
         
            if (!$conn){
                echo "Ket noi thanh cong" .  mysqli_connect_error();
            }
            else{
                $query = "UPDATE danhgia SET tenxe='".$tenxe."', danhgia='".$danhgia."', luotmua='".$luotmua."',nhanxet='".$nhanxet."' WHERE id_danhgia='".$id_danhgia."'";

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

