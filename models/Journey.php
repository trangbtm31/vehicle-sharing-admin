<?php
require_once Config::BASE_PATH . 'database/Database.php';
require_once Config::BASE_PATH . 'models/JourneyObj.php';
require_once Config::BASE_PATH . 'models/UserObj.php';
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
		$query = "SELECT * FROM journeys ORDER BY id DESC LIMIT 10";

		return $this->getListBase($query);
	}

	/**
	 * @return array
	 */
	public function getCancelJourneyList() {
		$query = "SELECT * FROM journeys WHERE status = 0 ORDER BY id DESC";

		return $this->getListBase($query);
	}
	/**
	 * @return array
	 */
	public function getDangerJourneyList() {
		$query = "SELECT * FROM journeys WHERE status = 5 ORDER BY id DESC";

		return $this->getListBase($query);
	}

	/**
	 * @param $userId
	 * @return array|null
	 */
	public function getUsername($userId) {
		$userId = $this->db->escapeString($userId);
		$query = "SELECT * FROM `users` WHERE `id` = '$userId'";
		$conn =$this->db->query($query);

		return $this->db->fetch($conn);
	}
	

	/**
	 * @param $query
	 * @return array
	 */
	private function getListBase($query)
	{
		//Query
		$conn = $this->db->query($query);

		//Tạo mãng lưu trữ
		$listJourney = array();

		//Fetch
		while ($row = $this->db->fetch($conn)) {
			//Khởi tạo đối tượng UserObj
			$journeyObj = new JourneyObj();

			$userDeleteInfo = $this->getUsername($row['user_delete_id']);
			$hikerInfo =$this->getUsername($row['hiker_id']);
			$driverInfo = $this->getUsername($row['driver_id']);
			$senderInfo = $this->getUsername($row['sender_id']);

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

			if($journeyObj->getStatus() == 5) {
				$journeyId = $this->db->escapeString($journeyObj->getJourneyId());
				$query5 = "SELECT * FROM `reports` WHERE `journey_id` ='$journeyId'";
				$conn1 = $this->db->query($query5);
				$dangerReport = $this->db->fetch($conn1);
				$journeyObj->setDangerLocation($dangerReport['report_location']);
				$journeyObj->setDangerUserId($dangerReport['reported_user_id']);
				$dangerUsername = $this->getUsername($dangerReport['reported_user_id']);
				$journeyObj->setDangerUsername($dangerUsername['name']);
			}

			switch($journeyObj->getStatus()) {
				case 0: $journeyObj->setStatus("<i style='font-weight: normal;'>"._IS_CANCELED."</i>"); break;
				case 1: $journeyObj->setStatus("<span class='text-info'>"._IS_ACTIVE."</span>"); break;
				case 2: $journeyObj->setStatus("<span class='text-warning'>"._IS_STARTED_TRIP."</span>"); break;
				case 3: $journeyObj->setStatus("<span class='text-success'>"._IS_FINISHED."</span>"); break;
				case 5: $journeyObj->setStatus("<h3 class='text-danger'>"._IS_SOS."</h3>"); break;
				case 6: $journeyObj->setStatus("<span class='text-primary'>"._IS_REPORTED."</span>"); break;
			}

			//Gán vào mãng lưu trữ
			$listJourney[] = $journeyObj;
		}
		//Return
		return $listJourney;
	}

}