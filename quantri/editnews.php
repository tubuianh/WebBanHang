<?php 
    
    //require('includes/sidebar.php');
    
    //lay id can edit
    $id = $_GET['id'];
    require('../db/conn.php');

    $sql_str = "SELECT * FROM news WHERE id = $id";
    $res = mysqli_query($conn,$sql_str);

    $news = mysqli_fetch_assoc($res);
    if(isset($_POST['btnUpdate'])){
       //lấy dữ liệu từ form
        $name = $_POST['title'];
        //tạo slug tự động theo tên
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $sumary = $_POST['sumary'];
        $description = $_POST['description'];
        $danhmuc = $_POST['danhmuc'];
        //lấy ảnh
        //$countfiles = count($_FILES['anh']['name']);

        //nếu chọn ảnh mới, thì xóa ảnh cũ
        if(!empty($_FILES['anh']['name'])){
            unlink($news['avatar']);
                

                // $imgs = '';
                // for ($i=0;$i<$countfiles;$i++) {
                    $filename = $_FILES['anh']['name'];
                    ## Location
                    $location = "uploads/news/".$filename;
                    //pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME
                    $extension = pathinfo($location, PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    ## File upload allowed extensions
                    $valid_extensions = array("jpg", "jpeg","png");
                    $response = 0;
                    ## Check file extension
                    if(in_array (strtolower($extension), $valid_extensions)) {
        
                        //them vao csdl
                        ## Upload file
                        //$_FILES['file']['tmp_name']: $_FILES['file']['tmp_name']
                        if (move_uploaded_file($_FILES['anh']['tmp_name'], $location)){
                            //$imgs .= $location .";";
                            
                        }
                    }
                
                $imgs = substr($imgs,0,-1);//loại bỏ dấu ; ở cuối
                $sql_str = "UPDATE `news` SET 
                `title` = '$name', 
                `slug` = '$slug', 
                `description` = '$description', 
                `sumary` = '$sumary', 
                `avatar` = '$location', 
                `newscategories_id` = $danhmuc, 
                `update_at` = NOW()
                WHERE `id` = $id";          
                
        }
        else{
            $sql_str = "UPDATE `news` SET 
                `title` = '$name', 
                `slug` = '$slug', 
                `description` = '$description', 
                `sumary` = '$sumary',  
                `newscategories_id` = $danhmuc, 
                `update_at` = NOW()
                WHERE `id` = $id";   
            
        }

        //thuc thi cau lenh
        mysqli_query($conn,$sql_str); 
                
        //tro ve trang
        header("location: listnews.php");
    }
    else{      
        require('includes/header.php');
    
?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Cập Nhật Tin Tức</h1>
                        <hr>
                    </div>
                    <form class="user" method="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <input style="border-radius: 6px;" type="text" class="form-control form-control-user" 
                            id="title" name="title" aria-describedby="emailHelp" 
                            placeholder="Tên sản phẩm"
                            value="<?php echo $news['title']; ?>">
                    </div>
                    <div class="form-group">
                        <input class="custom-file-upload" type="file" class="form-control form-control-user" 
                            id="anh" name="anh" 
                            multiple>
                            Ảnh hiện tại:
                                <img src= '<?=$news['avatar'];?>' height='100px'/>;
                    </div>
                    <div class="form-group">
                        <label for="" class="form-lable">Tóm tắt tin:</label>
                        <textarea name="sumary" id="" class="form-control">
                            <?php echo $news['sumary']; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                    <label for="" class="form-lable">Nội dung tin:</label>
                        <textarea name="description" id="" class="form-control">
                        <?php echo $news['description']; ?>
                        </textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="">Danh mục tin:</label>
                        <select class="form-control" name="danhmuc" id="">
                        <option value="">Chọn danh mục</option>
                        <?php 
                            $sql_str = "SELECT * FROM newscategories order by name";
                            $result =  mysqli_query($conn,$sql_str);
                            while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <option value="<?php echo $row['id']; ?>"
                            <?php if($row['id'] == $news['newscategories_id']) echo "selected"; ?>
                            ><?php echo $row['name']; ?></option>
                        <?php } ?>  
                        </select>
                    </div>
                    
                    <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>

                    </form>
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

