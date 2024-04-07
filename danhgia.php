<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ĐÁNH GIÁ XE</title>
    <style type="text/css">
    table, tr, td, th{
        border: solid 1px black;
        border-spacing: 0px;

    }
    th{
        background-color:AliceBlue;
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
         $query = "SELECT * FROM danhgia";
         $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result)>0){
            $STT = 0;
           
            echo "<table>
                <thead>
                    <th>STT</th>
                    <th>ID</th>
                    <th>TÊN XE</th>
                    <th>ĐÁNH GIÁ</th>
                    <th>LƯỢT MUA</th>
                    <th>NHẬN XÉT CHUNG TỪ NGƯỜI MUA</th>
                    <th>THAO TAC</th>
                </thead>
                <tbody>";

                while($arr = mysqli_fetch_assoc($result)){           
                    $STT = $STT + 1;
                    echo "<tr>". 
                            "<td>".$STT."</td>". 
                            "<td>".$arr["id_danhgia"]."</td>". 
                            "<td>".$arr["tenxe"]."</td>".  
                            "<td>".$arr["danhgia"]."</td>". 
                            "<td>".$arr["luotmua"]."</td>". 
                            "<td>".$arr["nhanxet"]."</td>". 
                            "<td>
                            <a href='sua_danhgia.php?id_danhgia=".$arr["id_danhgia"]."'>Sửa</a>
                            <a href='xoa_danhgia.php?id_danhgia=".$arr["id_danhgia"]."'>Xóa</a>
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
            $query = "SELECT * FROM danhgia WHERE tenxe LIKE N'%".$Key."%'";
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
                    <th>ĐÁNH GIÁ</th>
                    <th>LƯỢT MUA</th>
                    <th>NHẬN XÉT CHUNG CỦA NGƯỜI MUA</th>
                    <th>THAO TAC</th>
                    </thead>
                    <tbody>";
                        while($arr = mysqli_fetch_assoc($result)){
                            $STT = $STT+1;
                            echo "<tr>". 
                            "<td>".$STT."</td>". 
                            "<td>".$arr["id_danhgia"]."</td>". 
                            "<td>".$arr["tenxe"]."</td>".  
                            "<td>".$arr["danhgia"]."</td>". 
                            "<td>".$arr["luotmua"]."</td>". 
                            "<td>".$arr["nhanxet"]."</td>".
                            "<td>
                            <a href='sua_danhgia.php?id_danhgia=".$arr["id_danhgia"]."'>Sửa</a>
                            <a href='xoa_danhgia.php?id_danhgia=".$arr["id_danhgia"]."'>Xóa</a>
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
    <a href="them_danhgia.php">Thêm mới</a>
</body>
</html>