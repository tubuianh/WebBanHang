<?php 
session_start();
    require('includes/header.php');
    require('includes/myfunction.php');
    //require('includes/sidebar.php');


    function anhdaidien($arrstr, $height){
        //tách chuỗi các ảnh ngăn cách bởi dấu ; thành mảng, lấy ảnh đầu
        $arrstr = explode(";",$arrstr);
        return "<img src= '$arrstr[0]' height='$height'/>";
    }
    $smg = getFlashData('smg');
    $smg_type = getFlashData('smg_type');
?>

<style>
    .Cancelled, .Processing, .Confirmed, .Shipping, .Delivered{
        display: block;
        color: white;
        font-size: 20px;
        font-weight: 500;
        padding: 5px;
        border-radius: 4px;
        width: 120px;
    }
    .Processing{
        background-color: orange;
    }
    .Confirmed{
        background-color: blue;
    }
    .Shipping{
        background-color: yellowgreen;
    }
    .Delivered{
        background-color: green;
    }
    .Cancelled{
        background-color: red;
    }


</style>



<div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tin Tức</h6>
        <?php 
            if(!empty($smg)){
                getSmg($smg,$smg_type);
            }
        ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>  
                    <th>Xem</th>                                               
                </tr>
            </thead>
                <tfoot>
                    <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>  
                    <th>Xem</th>                          
                    </tr>                     
                </tfoot>                   
            <tbody>
                <?php 
                    require('../db/conn.php');
                    $sql_str = "SELECT * FROM orders
                    order by created_at";
                    $result =  mysqli_query($conn,$sql_str);
                    $stt=0;
                    while ($row = mysqli_fetch_assoc($result)){
                        $stt++;
                ?>
       
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><span class="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
                    <td>
                        <a href="vieworders.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Xem Chi Tiết</a>
                        <!-- <a href="deletenews.php?id=<?php echo $row['nid']; ?>" class="btn btn-danger" 
                        onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?');">Delete</a> -->
                    </td>
                </tr>  

                <?php
                }
                ?>                 
            </tbody>
            </table>
        </div>
    </div>
    </div>

</div>



<?php 
    require('includes/footer.php');
?>





