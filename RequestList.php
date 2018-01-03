<?php
/**
 * Created by PhpStorm.
 * User: trang
 * Date: 1/3/18
 * Time: 9:34 PM
 */

//Khởi động session
session_start();

//Kiểm tra nếu chưa đăng nhập thì quay về trang đăng nhập
if (!isset($_SESSION['user'])) {
	header('location:login.php');
}

//Require các file cần thiết
require 'config/Config.php';
require 'models/Request.php';
require "assets/constant.php";

//Khởi tạo đối tượng
$requestModel = new Request();

//Lấy danh sách request
$activeRequestList = $requestModel->getActiveRequestList();
$pendingRequestList = $requestModel->getPendingRequestList();
$cancelRequestList = $requestModel->getCancelRequestList();
$allRequest = $requestModel->getRequestList();

//Tiêu đề trang
$title = 'Requests - Danh sách';

//Require layout
require "views/requestlist.tpl.php";