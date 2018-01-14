<?php
/**
 * Created by PhpStorm.
 * User: trangbtm
 * Date: 12/01/2018
 * Time: 13:59
 */

require '../config/Config.php';
require '../database/Database.php';

if(!empty($_POST['request_id'])) {
	$sql = 'UPDATE requests SET status = 1 WHERE id = '.$_POST['request_id'];

	$db = new Database();
	$db->query($sql);
	echo json_encode(
		[
			'is_success' => 1,
			'request_id' => $_POST['request_id']
		]
	);

} else {
	echo json_encode([
		'is_success' => 0,
		'message' => 'Missing data'
	]);
}
