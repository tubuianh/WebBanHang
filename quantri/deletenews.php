<?php 

$delid = $_GET['id'];
require('../db/conn.php');

$sql1 = "SELECT avatar FROM news WHERE id = $delid";
$rs = mysqli_query($conn,$sql1);
$row = mysqli_fetch_assoc($rs);

//tìm ảnh và xóa
$img = $row['avatar'];
unlink($img);

$sql_str = "DELETE FROM news WHERE id = $delid";
mysqli_query($conn,$sql_str);

//trở về trang liệt kê brands
header("location: listnews.php");