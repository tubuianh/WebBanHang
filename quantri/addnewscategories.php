<?php 

require('../db/conn.php');
    //lấy dữ liệu từ form
    $name = $_POST['name'];
    //tạo slug tự động theo tên
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    
    $sql_str = "INSERT INTO `newscategories` (`name`, `slug`, `status`) VALUES 
     ('$name', '$slug', 'Active')";
    
    //thuc thi cau lenh
    mysqli_query($conn,$sql_str);
    
    //tro ve trang
    header("location: listnewscats.php");
?>