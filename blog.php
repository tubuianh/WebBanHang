
<?php 
 session_start();
  
        $ishome_page = false;
        require_once('components/header.php');
        require_once('./db/conn.php');
        $sql_str = "SELECT * FROM news order by created_at desc";
        $result =  mysqli_query($conn,$sql_str); 
        $row = mysqli_fetch_assoc($result);
        $anh = $row['avatar'];                                                
    ?>
     <!-- Blog Details Hero Begin -->
     <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->
   <!-- Blog Section Begin -->
   <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh mục tin</h4>
                            <ul>
                                <?php 
                                    $sql_str2 = "SELECT * FROM newscategories order by id";
                                    $result2 =  mysqli_query($conn,$sql_str2); 
                                    $row2 = mysqli_fetch_assoc($result2);
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                ?>
                                <li><a href="#"><?=$row2['name']?> (20)</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin mới</h4>
                            <div class="blog__sidebar__recent">
                                <?php 
                                    $sql_str3 = "SELECT * FROM news order by created_at desc limit 0,4";
                                    $result3 =  mysqli_query($conn,$sql_str3); 
                                    $row3 = mysqli_fetch_assoc($result3);
                                    while($row3 = mysqli_fetch_assoc($result3)){
                                ?>
                                <a href="tintuc.php?id=<?=$row3['id']?>" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="<?="quantri/".$row3['avatar']?>" width="70px" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?=$row3['title']?></h6>
                                        <span><?=$row3['created_at']?></span>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tìm kiếm</h4>
                            <div class="blog__sidebar__item__tags">
                                <?php 
                                    $sql_str2 = "SELECT * FROM newscategories order by id";
                                    $result2 =  mysqli_query($conn,$sql_str2); 
                                    $row2 = mysqli_fetch_assoc($result2);
                                    while($row2 = mysqli_fetch_assoc($result2)){
                                ?>
                                    <a href="#"><?=$row2['name']?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <?php 
                        //    $sql_str3 = "SELECT * FROM news order by created_at desc";
                        //    $result3 =  mysqli_query($conn,$sql_str3); 
                        //    $row3 = mysqli_fetch_assoc($result3);
                           while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="<?="quantri/".$row['avatar']?>"  height="270px" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i><?=$row['created_at']?></li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#"><?=$row['title']?></a></h5>
                                    <p><?=$row['sumary']?></p>
                                    <a href="tintuc.php?id=<?=$row['id']?>" class="blog__btn">Đọc thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->


<?php 
    require_once('components/footer.php');
?>