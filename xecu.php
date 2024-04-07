<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xe cũ</title>
    <style type="text/css">
    table, tr, td, th{
        border: solid 1px black;
        border-spacing: 0px;

    }
    th{
        background-color:blue;
        color: black;
    }
    .search{
        margin: 8px 0px;
    }
    </style>
</head>
<body>
    <form method="POST">
        <div class="search">
            <input type="text" name="txtsearch" placeholder="Nhập từ khóa">
            <button type="SUBMIT" name="btnsearch">Tìm kiếm</button> 
        </div>
    </form>

<?php
    $conn = mysqli_connect('localhost','root','','btcknhom5');
    if (!$conn){
        echo "ket noi khong thanh cong" . mysqli_connect_eror();
    }
    else{
         $query = "SELECT * FROM xecu";
         $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result)>0){
            $STT = 0;
           
            echo "<table>
                <thead>
                    <th>STT</th>
                    <th>ID</th>
                    <th>TÊN XE</th>
                    <th>GIÁ</th>
                    <th>TUỔI XE</th>
                    <th>HÃNG</th>
                    <th>THAO TAC</th>
                </thead>
                <tbody>";

                while($arr = mysqli_fetch_assoc($result)){           
                    $STT = $STT + 1;
                    echo "<tr>". 
                            "<td>".$STT."</td>". 
                            "<td>".$arr["id_xecu"]."</td>". 
                            "<td>".$arr["tenxe"]."</td>".  
                            "<td>".$arr["gia"]."</td>". 
                            "<td>".$arr["tuoixe"]."</td>". 
                            "<td>".$arr["hang"]."</td>". 
                            "<td>
                            <a href='sua_xecu.php?id_xecu=".$arr["id_xecu"]."'>Sửa</a>
                            <a href='xoa_xecu.php?id_xecu=".$arr["id_xecu"]."'>Xóa</a>
                            </td>".
                            "</tr>";
                }
            echo "</tbody></table>";
            }
            else{
                echo "khong co du lieu";
            }
        }
    ?>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['btnsearch'])){
            $Key = $_POST['txtsearch'];
            $query = "SELECT * FROM xecu WHERE tenxe LIKE N'%".$Key."%'";
            $result = mysqli_query($conn, $query);
                echo '<script type="text/javascript">
                        var x = document.getElementById("tblMain");
                        x.style.display = "none";
                    </script>';
                if (mysqli_num_rows($result)>0){
                    $STT = 0;
                    echo "<table>
                    <thead>
                    <th>STT</th>
                    <th>ID</th>
                    <th>TÊN XE</th>
                    <th>GIÁ</th>
                    <th>TUỔI XE</th>
                    <th>HÃNGI</th>
                    <th>THAO TAC</th>
                    </thead>
                    <tbody>";
                        while($arr = mysqli_fetch_assoc($result)){
                            $STT = $STT+1;
                            echo "<tr>". 
                            "<td>".$STT."</td>". 
                            "<td>".$arr["id_xecu"]."</td>". 
                            "<td>".$arr["tenxe"]."</td>".  
                            "<td>".$arr["gia"]."</td>". 
                            "<td>".$arr["tuoixe"]."</td>". 
                            "<td>".$arr["hang"]."</td>".
                            "<td>
                            <a href='sua_xecu.php?id_xecu=".$arr["id_xecu"]."'>Sửa</a>
                            <a href='xoa_xecu.php?id_xecu=".$arr["id_xecu"]."'>Xóa</a>
                            </td>".
                            "</tr>";
                       }
                    echo "</tbody></table>";
                }
                else{                
                        echo "Khong co du lieu";
                }
        }
    ?>
    <a href="them_xecu.php">Thêm mới</a>
</body>
</html>