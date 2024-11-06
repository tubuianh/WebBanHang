<?php 
    
    //require('includes/sidebar.php');
    
    //lay id can edit
    $id = $_GET['id'];
    require('../db/conn.php');

    $sql_str = "SELECT * FROM orders WHERE id = $id";
    $res = mysqli_query($conn,$sql_str);

    $row = mysqli_fetch_assoc($res);
    if(isset($_POST['btnUpdate'])){
       //lấy dữ liệu từ form
        $status = $_POST['status'];
        //tạo slug tự động theo tên
       
            $sql_str = "UPDATE `orders` SET 
                `status` = '$status'
                WHERE `id` = $id";   
            
        

        //thuc thi cau lenh
        mysqli_query($conn,$sql_str); 
                
        //tro ve trang
        header("location: listorders.php");
    }else{
        require_once('includes/header.php');
    
    
?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Xem Và Cập Nhật Trạng Thái Đơn Hàng</h1>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <form class="user" method="post" action="#" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">Khách hàng</div>
                                    <div class="col-md-9"><?=$row['firstname']. " ".$row['lastname']?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Địa chỉ</div>
                                    <div class="col-md-9"><?=$row['address']?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Số điện thoại</div>
                                    <div class="col-md-9"><?=$row['phone']?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Email</div>
                                    <div class="col-md-9"><?=$row['email']?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Trạng thái đơn hàng</div>
                                    <div class="col-md-9">
                                        <select name="status" id="">
                                            <option <?php echo $row['status'] =='Processing'? 'selected':''; ?>>Processing</option>
                                            <option <?php echo $row['status'] =='Confirmed'? 'selected':''; ?>>Confirmed</option>
                                            <option <?php echo $row['status'] =='Shipping'? 'selected':''; ?>>Shipping</option>
                                            <option <?php echo $row['status'] =='Delivered'? 'selected':''; ?>>Delivered</option>
                                            <option <?php echo $row['status'] =='Cancelled'? 'selected':''; ?>>Cancelled</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>

                            </form>
                        </div>
                        <div class="col-md-6">
                            <h4>Chi tiết đơn hàng</h4>
                            <table class="table">
                            <tr>
                                <th>STT</th>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Số tiền</th>
                            </tr>
                           
                            <?php 
                                $sql = "SELECT *,products.name as pname, order_details.price as oprice,
                                order_details.qty as oqty, order_details.total as ototal FROM products, order_details where 
                                products.id = order_details.product_id and order_id = $id";
                                $res = mysqli_query($conn, $sql);
                                $stt = 0;
                                $tongtien = 0;
                                while($row1 = mysqli_fetch_assoc($res)){
                                    $tongtien += $row1['oprice'] * $row1['oqty'];
                            ?>
                            <tr>
                                <td><?=++$stt?></td>
                                <td><?=$row1['pname']?></td>
                                <td><?=number_format($row1['oprice'],0,'','.')?> VND</td>
                                <td><?=$row1['oqty']?></td>
                                <td><?=number_format($row1['ototal'],0,'','.')?> VND</td>
                            </tr>
                            <?php } ?>
                            </table>
                            <div>
                                <h5>Thành tiền: <?=number_format($tongtien,0,'','.')?> VND</h5>
                            </div>
                        </div>
                    </div>
                   
                    <hr>
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>


<?php 
    require('includes/footer.php');
}
?>

