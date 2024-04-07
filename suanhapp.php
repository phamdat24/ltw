<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sửa dữ liệu nhà phân phối</title>
</head>
<body>
    <?php
        $id_npp= $_GET['id_npp'];
        $tennpp = "";
        $diachi = "";
        $sdt = "";
        $sppp = "";

        $conn = mysqli_connect('localhost','root','','btcknhom5');
        if (!$conn){
            echo "ket noi thanh cong" . mysqli_connect_error();
        }
        else{
            $query = "SELECT * FROM nhaphanphoi WHERE id_npp='" .$id_npp . "'";

            $result = mysqli_query($conn, $query);
            while($rows = mysqli_fetch_assoc($result)){
                $tennpp = $rows["tennpp"];
                $diachi = $rows["diachi"];
                $sdt = $rows["sdt"];
                $sppp = $rows["sppp"];  
            }
        }

    ?>
    <form method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="txtid_npp" value="<?php echo("$id_npp") ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Tên nhà phân phối</td>
                <td>
                    <input type="text" name="txttennpp" value="<?php echo $tennpp ?>">
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
                <td>sppp</td>
                <td>
                    <input type="text" name="txtsppp" value="<?php echo $sppp ?>">
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
    <a href="nhaphanphoi.php">Quay lại</a>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnGHI']))
        {
            $tennpp = $_POST['txttennpp'];
            $diachi = $_POST['txtdiachi'];
            $sdt = $_POST['txtsdt'];
            $sppp = $_POST['txtsppp'];
            $conn = mysqli_connect('localhost','root','','btcknhom5');
         
            if (!$conn){
                echo "Ket noi thanh cong" .  mysqli_connect_error();
            }
            else{
                $query = "UPDATE nhaphanphoi SET tennpp='".$tennpp."', diachi='".$diachi."', sdt='".$sdt."' WHERE id_npp='".$id_npp."'";

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

