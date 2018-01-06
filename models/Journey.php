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
	 * @return array
	 */
	public function getJourneyList() {
		$query = 'SELECT * FROM journeys ORDER BY id DESC LIMIT 10';

		$result = $this->getListBase($query);
		return $result;
	}

	/**
	 * @return array
	 */
	public function getCancelJourneyList() {
		$query = 'SELECT * FROM journeys WHERE status = 0 ORDER BY id DESC';

		$result = $this->getListBase($query);
		return $result;
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
		$conn = $this->db->query($sql);

		//Tạo mãng lưu trữ
		$listJourney = array();

		//Fetch
		while ($row = $this->db->fetch($conn)) {
			//Khởi tạo đối tượng UserObj
			$journeyObj = new JourneyObj();

			$query4 = "SELECT * FROM users WHERE id =".$row['user_delete_id'];
			$query1 = "SELECT * FROM users WHERE id =".$row['hiker_id'];
			$query2 = "SELECT * FROM users WHERE id =".$row['driver_id'];
			$query3 = "SELECT * FROM users WHERE id =".$row['sender_id'];

			$conn1 = $this->db->query($query4);
			$conn2 = $this->db->query($query1);
			$conn3 = $this->db->query($query2);
			$conn4 = $this->db->query($query3);

			$userDeleteInfo = $this->db->fetch($conn1);
			$hikerInfo = $this->db->fetch($conn2);
			$driverInfo = $this->db->fetch($conn3);
			$senderInfo = $this->db->fetch($conn4);

			$journeyObj->setDeleteUsername($userDeleteInfo['name']);
			$journeyObj->setHikerUsername($hikerInfo['name']);
			$journeyObj->setDriverUsername($driverInfo['name']);
			$journeyObj->setSenderUsername($senderInfo['name']);

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

			switch($journeyObj->getStatus()) {
				case 0: $journeyObj->setStatus("<i style='font-weight: normal;'>"._IS_CANCELED."</i>"); break;
				case 1: $journeyObj->setStatus("<span class='text-info'>"._IS_ACTIVE."</span>"); break;
				case 2: $journeyObj->setStatus("<span class='text-warning'>"._IS_STARTED_TRIP."</span>"); break;
				case 3: $journeyObj->setStatus("<span class='text-success'>"._IS_FINISHED."</span>"); break;
			}

			//Gán vào mãng lưu trữ
			$listJourney[] = $journeyObj;
		}
		//Return
		return $listJourney;
	}

}