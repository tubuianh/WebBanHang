<?php 
    require('includes/header.php');
    require('includes/myfunction.php');
    //require('includes/sidebar.php');
    $erros = getSession('errors');
    removeSession('errors');
?>

<style>
      .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff;
            transition: background-color 0.3s;
        }
        .custom-file-upload:hover {
            background-color: #e9ecef;
        }
</style>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Thêm Tin Tức!</h1>
                        <hr>
                    </div>
                    <form class="user" method="post" action="addnews.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input style="border-radius: 6px;" type="text" class="form-control form-control-user" 
                            id="name" name="name" aria-describedby="emailHelp" 
                            placeholder="Tiêu đề">
                            <?php 
                                if (!empty($errors['name'])) {
                                    echo '<span class="error">' . reset($errors['name']) . '</span>';
                                }
                            ?>
                    </div>
                    <div class="form-group">
                        <input class="custom-file-upload" type="file" class="form-control form-control-user" 
                            id="anh" name="anh" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-lable">Tóm tắt tin:</label>
                        <textarea name="sumary" id="" class="form-control">

                        </textarea>
                    </div>
                    <div class="form-group">
                    <label for="" class="form-lable">Nội dung tin:</label>
                        <textarea name="description" id="" class="form-control">
                            
                        </textarea>
                    </div>

          
                    <div class="form-group">
                        <label class="form-label" for="">Danh mục tin:</label>
                        <select class="form-control" name="danhmuc" id="">
                        <option value="">Chọn danh mục</option>
                        <?php 
                            require('../db/conn.php');
                            $sql_str = "SELECT * FROM newscategories order by name";
                            $result =  mysqli_query($conn,$sql_str);
                            while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>  
                        </select>
                    </div>
                    
                    <button class="btn btn-primary">Thêm mới</button>

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
?>

