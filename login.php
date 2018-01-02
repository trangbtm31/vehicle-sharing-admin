<?php
//Khởi động session
session_start();

//Kiểm tra nếu đã đăng nhập thì quay về trang chủ quản trị
if(isset($_SESSION['Admin'])){
    header('location:home.php');
}

//Require các file cần thiết
require 'Config.php';
require 'models/User.php';

//Kiểm tra dữ liệu POST lên
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
//Gán tài khoản và mật khẩu nhận được từ form vào 2 biến tương ứng
    $username = $_POST['username'];
    $password = $_POST['password'];

//Khởi tạo đối tượng thành viên (User)
    $userModel = new User();

//Lấy thông tin thành viên
    $user = $userModel->getByUsername($username);

//Kiểm tra sự tồn tại của thành viên và mật khẩu có trùng khớp
    if($user && $user->getPassword() === md5($password)){
//Tạo session lưu thông tin thành viên đăng nhập thành công
        $_SESSION['Admin'] = $user;

//Chuyển hướng về trang chủ quản trị
        header('location:home.php');
    }else{
//Bật cờ lỗi
        $error = true;
    }
}

//Require file giao diện (View)
require 'views/login.tpl.php';
?>