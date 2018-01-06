<?php

/**
 * Created by PhpStorm.
 * User: trang
 * Date: 1/3/18
 * Time: 9:39 PM
 */
class RequestObj
{
	protected $requestId;
	protected $ownerId;
	protected $timeStart;
	protected $vehicleType;
	protected $createdDate;
	protected $status;
	protected $updatedDate;
	protected $sourceLocation;
	protected $destinationLocation;
	protected $username;

	public function setRequestId($requestId)
	{
		$this->requestId = $requestId;
	}

	public function getRequestId()
	{
		return $this->requestId;
	}

	public function setOwnerId($userId)
	{
		$this->ownerId = $userId;
	}

	public function getOwnerId()
	{
		return $this->ownerId;
	}

	public function setTimeStart($timeStart)
	{
		$this->timeStart = $timeStart;
	}

	public function getTimeStart()
	{
		return $this->timeStart;
	}

	public function setVehicleType($vehicleType)
	{
		$this->vehicleType = $vehicleType;
	}

	public function getVehicleType()
	{
		return $this->vehicleType;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setCreatedDate($createdDate)
	{
		$this->createdDate = $createdDate;
	}

	public function getCreatedDate()
	{
		return $this->createdDate;
	}

	public function setUpdatedDate($updatedDate)
	{
		$this->updatedDate = $updatedDate;
	}

	public function getUpdatedDate()
	{
		return $this->updatedDate;
	}

	public function setStartLocation($sourceLocation)
	{
		$this->sourceLocation = $sourceLocation;
	}

	public function getStartLocation()
	{
		return $this->sourceLocation;
	}

	public function setEndLocation($destinateLocation)
	{
		$this->destinationLocation = $destinateLocation;
	}

	public function getEndlocation()
	{
		return $this->destinationLocation;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}


}