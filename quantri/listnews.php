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
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>  
                    <th>Hành động</th>                                               
                </tr>
            </thead>
                <tfoot>
                    <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>  
                    <th>Hành động</th>                         
                    </tr>                     
                </tfoot>                   
            <tbody>
                <?php 
                    require('../db/conn.php');
                    $sql_str = "SELECT *,
                    news.id as nid
                    FROM news, newscategories
                    WHERE news.newscategories_id = newscategories.id order by news.created_at";
                    $result =  mysqli_query($conn,$sql_str);
                    $stt=0;
                    while ($row = mysqli_fetch_assoc($result)){
                        $stt++;
                ?>
       
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><img height="100px" src="<?php echo $row['avatar']; ?>" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="editnews.php?id=<?php echo $row['nid']; ?>" class="btn btn-warning">Edit</a>
                        <a href="deletenews.php?id=<?php echo $row['nid']; ?>" class="btn btn-danger" 
                        onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?');">Delete</a>
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





