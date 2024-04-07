<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa dữ liệu xe cũ</title>
</head>
<body>
    <?php
        $id_xecu= $_GET['id_xecu'];
        $tenxe = "";
        $gia = "";
        $tuoixe = "";
        $hang = "";

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "ket noi thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "SELECT * FROM xecu WHERE id_xecu='" .$id_xecu . "'";

            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_assoc($result)){
                $tenxe = $rows["tenxe"];
                $gia = $rows["gia"];
                $tuoixe = $rows["tuoixe"];
                $hang = $rows["hang"];  
            }
        }

    ?>
    <form method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="txtid_xecu" value="<?php echo("$id_xecu") ?>" disabled>
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
                    <textarea name="txtgiai">
                        <?php echo("$gia") ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Tuổi xe</td>
                <td>
                    <input type="text" name="txttuoixe" value="<?php echo $tuoixe ?>">
                </td>
            </tr>
            <tr>
                <td>sppp</td>
                <td>
                    <input type="text" name="txthang" value="<?php echo $hang ?>">
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
    <a href="xecu.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGHI']))
        {
            $tenxe = $_POST['txttenxe'];
            $gia = $_POST['txtgia'];
            $tuoixe = $_POST['txttuoixe'];
            $hang = $_POST['txthang'];
            $conn = mysqli_connect('localhost','root','','btcknhom5');
         
            if (!$conn){
                echo "Ket noi thanh cong" .  mysqli_connect_error();
            }
            else{
                $query = "UPDATE xecu SET tenxe='".$tenxe."', gia='".$gia."', tuoixe='".$tuoixe."' WHERE id_xecu='".$id_xecu."'";

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

