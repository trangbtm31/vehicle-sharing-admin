<?php
require_once Config::BASE_PATH . 'database/Database.php';
require_once Config::BASE_PATH . 'models/RequestObj.php';

/**
 * Created by PhpStorm.
 * User: trang
 * Date: 1/3/18
 * Time: 9:38 PM
 */
class Request
{
	protected $db;

	/**
	 * Request constructor.
	 */
	public function __construct()
	{
		$this->db = new Database();
	}

	/**
	 * @return array
	 */
	public function getActiveRequestList() {
		$query = "SELECT * FROM requests WHERE status = 1 ORDER BY id";

		$results = $this->getListBase($query);
		foreach ($results as $result) {
			switch($result->getVehicleType()) {
				case 0 : $result->setVehicleType(VEHICLE_TYPE_0); break;
				case 1 : $result->setVehicleType(VEHICLE_TYPE_1); break;
				case 2 : $result->setVehicleType(VEHICLE_TYPE_2); break;
			}
		}
		return $results;
	}

	/**
	 * @return array
	 */
	public function getPendingRequestList() {
		$query = "SELECT * FROM requests WHERE status = 2 ORDER BY id";

		$results = $this->getListBase($query);
		foreach ($results as $result) {
			switch($result->getVehicleType()) {
				case 0 : $result->setVehicleType(VEHICLE_TYPE_0); break;
				case 1 : $result->setVehicleType(VEHICLE_TYPE_1); break;
				case 2 : $result->setVehicleType(VEHICLE_TYPE_2); break;
			}
		}
		return $results;
	}

	/**
	 * @return array
	 */
	public function getCancelRequestList() {
		$query = "SELECT * FROM requests WHERE status = 0 ORDER BY id";

		$results = $this->getListBase($query);
		foreach ($results as $result) {
			switch($result->getVehicleType()) {
				case 0 : $result->setVehicleType(VEHICLE_TYPE_0); break;
				case 1 : $result->setVehicleType(VEHICLE_TYPE_1); break;
				case 2 : $result->setVehicleType(VEHICLE_TYPE_2); break;
			}
		}
		return $results;
	}

	/**
	 * @return array
	 */
	public function getRequestList() {
		$query = "SELECT * FROM requests ORDER BY id";

		$results = $this->getListBase($query);
		foreach ($results as $result) {
			switch($result->getVehicleType()) {
				case 0 : $result->setVehicleType(VEHICLE_TYPE_0); break;
				case 1 : $result->setVehicleType(VEHICLE_TYPE_1); break;
				case 2 : $result->setVehicleType(VEHICLE_TYPE_2); break;
			}
		}
		return $results;
	}

	/**
	 * @param $query
	 * @return array
	 */
	public function getListBase($query)
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
			$requestObj = new RequestObj();

			//Gán thông tin
			$requestObj->setRequestId($row['id']);
			$requestObj->setOwnerId($row['user_id']);
			$requestObj->setStartLocation($row['source_location']);
			$requestObj->setEndLocation($row['destination_location']);
			$requestObj->setVehicleType($row['vehicle_type']);
			$requestObj->setTimeStart($row['time_start']);
			$requestObj->setStatus($row['status']);
			$requestObj->setCreatedDate($row['created_at']);
			$requestObj->setUpdatedDate($row['updated_at']);

			//Gán vào mãng lưu trữ
			$listRequest[] = $requestObj;
		}

		//Return
		return $listRequest;
	}

}