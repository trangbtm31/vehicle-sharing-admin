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
require 'models/Journey.php';
require "assets/constant.php";

//Khởi tạo đối tượng thành viên (User)
$journeyModel = new Journey();

//Lấy danh sách thành viên
$journeyList = $journeyModel->getJourneyList();
$cancelJourneyList = $journeyModel->getCancelJourneyList();
$dangerJourneyList = $journeyModel->getDangerJourneyList();

//Tiêu đề trang
$title = 'Chuyến đi - Danh sách';

//Require layout
require "views/journeylist.tpl.php";