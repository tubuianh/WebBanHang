
<?php 
    session_start();
    require('../db/conn.php');
    $errorsMsg ="";
    if(isset($_POST['btSubmit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM admins where email='$email' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            //lấy thông tin của user
            $row = mysqli_fetch_assoc($result);
            $_SESSION['users'] = $row;
            header("Location: index.php");
        }else{
            $errorsMsg = "Email hoặc mật khẩu không chính xác!";
            require_once("includes/loginform.php");
        }
    }
    else{
        require_once("includes/loginform.php");
    }
?>


