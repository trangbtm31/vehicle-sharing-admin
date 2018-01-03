<?php
/**
 * Created by PhpStorm.
 * User: trangbtm
 * Date: 02/01/2018
 * Time: 18:27
 */

//Khởi động session
session_start();

//Kiểm tra nếu chưa đăng nhập thì quay về trang đăng nhập
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

//Require các file cần thiết
require 'config/Config.php';
require 'models/User.php';
require "assets/constant.php";

//Khởi tạo đối tượng thành viên (User)
$userModel = new User();

//Lấy danh sách thành viên
$userList = $userModel->getList();

//Tiêu đề trang
$title = 'Thành viên - Danh sách';

//Require layout
require "views/userlist.tpl.php";