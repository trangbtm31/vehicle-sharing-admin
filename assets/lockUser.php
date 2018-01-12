<?php
/**
 * Created by PhpStorm.
 * User: trangbtm
 * Date: 12/01/2018
 * Time: 13:59
 */

require '../config/Config.php';
require '../database/Database.php';

if(!empty($_POST['user_id']) && !empty($_POST['journey_id'])) {
    $sql = 'UPDATE users SET role = 0 WHERE id = '.$_POST['user_id'];

    $db = new Database();
    $db->query($sql);

    $sql = 'UPDATE journeys SET status = 6 WHERE id = '.$_POST['journey_id'];

    echo json_encode([
        'is_success' => 1
    ]);
} else {
    echo json_encode([
        'is_success' => 0,
        'message' => 'Missing data'
    ]);
}

