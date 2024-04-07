<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa dữ liệu nhà cung cấp</title>
</head>
<body>
    <?php
        $id_ncc= $_GET['id_ncc'];
        $tenncc = "";
        $diachi = "";
        $sdt = "";

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "ket noi thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "SELECT * FROM nhacungcap WHERE id_ncc='" .$id_ncc . "'";

            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_assoc($result)){
                $tenncc = $rows["tenncc"];
                echo $tenncc;
                $diachi = $rows["diachi"];
                $sdt = $rows["sdt"];
            }
        }

    ?>
    <form method="POST">
        <table>
            <tr>
                <td>Id</td>
                <td>
                    <input type="text" name="txtid" value="<?php echo("$id_ncc") ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>tenncc</td>
                <td>
                    <input type="text" name="txttenncc" value="<?php echo $tenncc ?>">
                </td>
            </tr>
            <tr>
                <td>diachi</td>
                <td>
                    <textarea name="txtdiachi">
                        <?php echo("$diachi") ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>sdt</td>
                <td>
                    <input type="text" name="txtsdt" value="<?php echo $sdt ?>">
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
    <a href="nhacungcap.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGHI']))
        {
            $tenncc = $_POST['txttenncc'];
            $diachi = $_POST['txtdiachi'];
            $sdt = $_POST['txtsdt'];
            $conn = mysqli_connect('localhost','root','','btcknhom5');
         
            if (!$conn){
                echo "Ket noi thanh cong" .  mysqli_connect_error();
            }
            else{
                $query = "UPDATE nhacungcap SET tenncc='".$tenncc."', diachi='".$diachi."', sdt='".$sdt."' WHERE id_ncc='".$id_ncc."'";

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

