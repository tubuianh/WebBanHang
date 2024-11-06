<?php 
    session_start();
    $idsp = $_GET['id'];//lấy id trên url
    $qty = $_POST['qty'];
    $cart = [];
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    }
    for($i=0;$i<count($cart);$i++){
        if($cart[$i]['id'] == $idsp){
            $cart[$i]['qty'] = $qty;
            break;
        }
    }

    //update session
    $_SESSION['cart'] =  $cart;
    header("location: cart.php")
?>