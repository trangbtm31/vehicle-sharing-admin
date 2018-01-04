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
		$query = "SELECT * FROM requests WHERE status = 1 ORDER BY id DESC";

		return $this->getListBase($query);
	}

	/**
	 * @return array
	 */
	public function getPendingRequestList() {
		$query = "SELECT * FROM requests WHERE status = 2 ORDER BY id DESC";

		return $this->getListBase($query);
	}

	/**
	 * @return array
	 */
	public function getCancelRequestList() {
		$query = "SELECT * FROM requests WHERE status = 0 ORDER BY id DESC";

		return $this->getListBase($query);
	}

	/**
	 * @return array
	 */
	public function getRequestList() {
		$query = "SELECT * FROM requests ORDER BY id DESC LIMIT 10";

		return $this->getListBase($query);
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
		foreach ($listRequest as $request) {
			switch($request->getVehicleType()) {
				case 0 : $request->setVehicleType(VEHICLE_TYPE_0); break;
				case 1 : $request->setVehicleType(VEHICLE_TYPE_1); break;
				case 2 : $request->setVehicleType(VEHICLE_TYPE_2); break;
			}
			switch($request->getStatus()) {
				case 0: $request->setStatus("<i style='font-weight: normal;'>"._IS_CANCELED."</i>"); break;
				case 1: $request->setStatus("<span class='text-info'>"._IS_ACTIVE."</span>"); break;
				case 2: $request->setStatus("<span class='text-warning'>"._IS_PENDING."</span>"); break;
				case 3: $request->setStatus("<span class='text-danger'>"._IS_STARTED_TRIP."</span>"); break;
				case 4: $request->setStatus("<span class='text-success'>"._IS_FINISHED."</span>"); break;
			}
		}

		//Return
		return $listRequest;
	}

}