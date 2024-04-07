<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý tin tuc</title>
    <style type="text/css">
    table, tr, td, th{
        border: solid 1px black;
        border-spacing: 0px;

    }
    th{
        background-color: pink;
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
         $query = "SELECT * FROM tintuc";
         $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result)>0){
            $STT = 0;
           
            echo "<table>
                <thead>
                    <th>STT</th>
                    <th>ID</th>
                    <th>TÊN TIN TỨC</th>
                    <th>MÔ TẢ</th>
                    <th>THAOTAC</th>
                </thead>
                <tbody>";

                while($arr = mysqli_fetch_assoc($result)){           
                    $STT = $STT + 1;
                    echo "<tr>". 
                            "<td>".$STT."</td>". 
                            "<td>".$arr["id_tt"]."</td>". 
                            "<td>".$arr["tentt"]."</td>".  
						    "<td>".$arr["mota"]."</td>".
                            "<td>
                              <a href='sua_tt.php?id_tt=".$arr["id_tt"]."'>Sửa</a>
                             <a href='xoa_tt.php?id_tt=".$arr["id_tt"]."'>Xóa</a>
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
            $query = "SELECT * FROM tintuc WHERE tentt LIKE N'%".$Key."%'";
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
                       <th>TÊN TIN TỨC</th>
                       <th>MÔ TẢ</th>
                       <th>THAOTAC</th>
                    </thead>
                    <tbody>";
                        while($arr = mysqli_fetch_assoc($result)){
                            $STT = $STT+1;
                            echo "<tr>". 
                            "<td>".$STT."</td>". 
                            "<td>".$arr["id_tt"]."</td>". 
                            "<td>".$arr["tentt"]."</td>".  
                            "<td>".$arr["mota"]."</td>". 
                            "<td>
                            <a href='sua_tt.php?id_tt=".$arr["id_tt"]."'>Sửatt</a>
                            <a href='xoa_tt.php?id_tt=".$arr["id_tt"]."'>Xóatt</a>
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
    <a href="them_tt.php">Thêm mới</a>
</body>
</html>