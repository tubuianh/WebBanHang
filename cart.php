<?php 
        $ishome_page = false;
        session_start();
        require_once('./db/conn.php');
       
        require_once('components/header.php');
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ Hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
           
            <div class="checkout__form">
                <h4>Giỏ hàng</h4>
                <!-- <form action="#"> -->
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="checkout__order">
                                <!-- <h4>Đơn hàng của bạn</h4> -->
                                <!-- <div class="checkout__order__products">Products <span>Total</span></div> -->
                                <table class="table">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                    <?php 
                                        $cart = [];
                                        if(isset($_SESSION['cart'])){
                                            $cart = $_SESSION['cart'];
                                        }
                                        $count = 0; //stt
                                        $total = 0;
                                        foreach($cart as $item){
                                            $total += $item['qty'] * $item['disscounted_price'];
                                        ?>
                                    <tr>                                      
                                        <td><?=++$count?></td>
                                        <td><a style="color: black;" href="sanpham.php?id=<?=$item['id']?>"><?=$item['name']?></a></td>
                                        <td><?=number_format($item['disscounted_price'],0,'','.')?>VND</td>
                                        <form method="post" action="updatecart.php?id=<?=$item['id']?>">
                                            <td><input type="number" name="qty" value="<?=$item['qty']?>" min="1"></td>
                                            <td><?=number_format($item['qty'] * $item['disscounted_price'],0,'','.')?>VND</td>  
                                            <td><button class="btn btn-warning" type="submit">Cập nhật</button>
                                        </form>
                                        <td><a class="btn btn-danger" href="./deletecart.php?id=<?=$item['id']?>">Xóa</a></td>                                          
                                    </tr>
                                    <?php } ?>
                                </table>
                                <!-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> -->
                                <div class="checkout__order__total">
                                    Tổng tiền <span><?=number_format($total,0,'','.')?>VND</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="shop.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                                    <a href="thanhtoan.php" class="btn btn-success">Thanh Toán</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

<?php 
    require_once('components/footer.php');
?>