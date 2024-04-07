<?php
session_start();

if(isset($_POST["tendangnhap"]) && isset($_POST["matkhau"]))
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau= $_POST["matkhau"];
    $matkhau = md5($matkhau);

    $conn = mysqli_connect("localhost", "root", "") or die("Không connect được với máy chủ");
    mysqli_select_db($conn, "btcknhom5") or die("Không tìm thấy CSDL");

    $sql_dangnhap = "SELECT * FROM `dangnhap` WHERE tendangnhap='$tendangnhap' AND matkhau='$matkhau'";
    $result_dangnhap = mysqli_query($conn, $sql_dangnhap);

    if(mysqli_num_rows($result_dangnhap) > 0) 
        $_SESSION['tendangnhap'] = $tendangnhap;
        header("Location: trangchu.php");
?>