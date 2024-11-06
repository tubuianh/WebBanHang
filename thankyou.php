<?php 
        $ishome_page = false;
        require_once('./db/conn.php');
       
        require_once('components/header.php');
?>

<style>
    .checkout__form1 {
    background-color: #f9f9f9; /* Màu nền nhẹ nhàng */
    border-radius: 10px; /* Bo góc */
    padding: 20px; /* Khoảng cách bên trong */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bóng đổ */
    max-width: 500px; /* Độ rộng tối đa */
    margin: 20px auto; /* Canh giữa */
    text-align: center; /* Canh giữa nội dung */
}

.checkout__form1 h4 {
    color: #333; /* Màu chữ */
    font-family: 'Arial', sans-serif; /* Phông chữ */
    margin: 10px 0; /* Khoảng cách giữa các tiêu đề */
    font-weight: 600; /* Đậm chữ */
}

.checkout__form1 h4:first-of-type {
    font-size: 1.5em; /* Kích thước chữ lớn hơn cho tiêu đề đầu tiên */
}

.checkout__form1 h4:last-of-type {
    font-size: 1.2em; /* Kích thước chữ nhỏ hơn cho tiêu đề thứ hai */
    color: #555; /* Màu chữ nhạt hơn */
}
</style>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Đặt Hàng Thành Công</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang Chủ</a>
                            <span>Đặt Hàng Thành Công</span>
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
           
            <div class="checkout__form1">
                <h4>Cảm ơn bạn đã đặt hàng!</h4>
                <h4>Chúng tôi sẽ sớm liên hệ với bạn để chốt đơn hàng!</h4>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

<?php 
    require_once('components/footer.php');
?>