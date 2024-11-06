<?php 
    session_start();
    $idsp = $_GET['id'];//lấy id trên url
    $cart = [];
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    for($i=0;$i<count($cart);$i++){//nếu sản phẩm đã có trong giỏ hàng, cộng thêm số lượng
        if($cart[$i]['id'] == $idsp){
            array_splice($cart,$i,1);//xóa sả phẩm trùng id ra khỏi cart
            break;
        }
    }

    //update session
    $_SESSION['cart'] =  $cart;
    header("location: cart.php")
?>