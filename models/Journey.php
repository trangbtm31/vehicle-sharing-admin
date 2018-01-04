<?php
require_once Config::BASE_PATH . 'database/Database.php';
require_once Config::BASE_PATH . 'models/JourneyObj.php';
/**
 * Created by PhpStorm.
 * User: trang
 * Date: 1/4/18
 * Time: 7:10 PM
 */
class Journey
{
	protected $db;

	public function __construct()
	{
		$this->db = new Database();
	}

	/**
	 * @param $query
	 * @return array
	 */
	private function getListBase($query)
	{
		//SQL
		$sql = $query;

		//Query
		$this->db->query($sql);

		//Tạo mãng lưu trữ
		$listRequest = array();

		//Fetch
		while ($row = $this->db->fetch()) {
			//Khởi tạo đối tượng UserObj
			$journeyObj = new JourneyObj();

			//Gán thông tin
			$journeyObj->setJourneyId($row['id']);
			$journeyObj->setDriverId($row['driver_id']);
			$journeyObj->setHikerId($row['hiker_id']);
			$journeyObj->setStatus($row['status']);
			$journeyObj->setDriverRequestId($row['request_driver_id']);
			$journeyObj->setHikerRequestId($row['request_hiker_id']);
			$journeyObj->setSenderId($row['sender_id']);
			$journeyObj->setUserDeleteId($row['user_delete_id']);
			$journeyObj->setDeletedDate($row['delete_at']);
			$journeyObj->setFinishedDate($row['finish_at']);
			$journeyObj->setCreatedDate($row['created_at']);
			$journeyObj->setUpdatedDate($row['updated_at']);

			//Gán vào mãng lưu trữ
			$listJourney[] = $journeyObj;
		}
		//Return
		return $listJourney;
	}

}