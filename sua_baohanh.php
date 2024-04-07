<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhật thông tin bảo hành</title>
</head>
<body>
    <?php
        $id_baohanh= $_GET['id_baohanh'];
        $tenxe = "";
        $gia = "";
        $thoigian = "";
        $uudai = "";

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "ket noi thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "SELECT * FROM baohanh WHERE id_baohanh='" .$id_baohanh . "'";

            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_assoc($result)){
                $tenxe = $rows["tenxe"];
                $gia = $rows["gia"];
                $thoigian = $rows["thoigian"];
                $uudai = $rows["uudai"];  
            }
        }

    ?>
    <form method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="txtid_baohanh" value="<?php echo("$id_baohanh") ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Tên xe</td>
                <td>
                    <input type="text" name="txttenxe" value="<?php echo $tenxe ?>">
                </td>  
            </tr>
            <tr>
                <td>Giá bán</td>
                <td>
                    <textarea name="txtgia">
                        <?php echo("$gia") ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Thời gian bảo hành</td>
                <td>
                    <input type="text" name="txtthoigian" value="<?php echo $thoigian ?>">
                </td>
            </tr>
            <tr>
                <td>Ưu đãi</td>
                <td>
                    <input type="text" name="txtuudai" value="<?php echo $uudai ?>">
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
    <a href="baohanh.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGHI']))
        {
            $tenxe = $_POST['txttenxe'];
            $gia = $_POST['txtgia'];
            $thoigian = $_POST['txtthoigian'];
            $uudai = $_POST['txtuudai'];
            $conn = mysqli_connect('localhost','root','','btcknhom5');
         
            if (!$conn){
                echo "Ket noi thanh cong" .  mysqli_connect_error();
            }
            else{
                $query = "UPDATE baohanh SET tenxe='".$tenxe."', gia='".$gia."', thoigian='".$thoigian."',uudai='".$uudai."' WHERE id_baohanh='".$id_baohanh."'";

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

