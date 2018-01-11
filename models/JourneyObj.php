<?php

/**
 * Created by PhpStorm.
 * User: trang
 * Date: 1/4/18
 * Time: 7:10 PM
 */
class JourneyObj
{
	protected $journeyId;
	protected $hikerRequestId;
	protected $driverRequestId;
	protected $hikerId;
	protected $driverId;
	protected $status;
	protected $senderId;
	protected $userDeleteId;
	protected $deletedDate;
	protected $createdDate;
	protected $updatedDate;
	protected $finishedDate;
	protected $userDeleteUsername;
	protected $hikerUsername;
	protected $driverUsername;
	protected $senderUsername;
	protected $dangerLocation;
	protected $dangerUsername;
	protected $dangerUserId;

	public function setJourneyId($journeyId)
	{
		$this->journeyId = $journeyId;
	}

	public function getJourneyId()
	{
		return $this->journeyId;
	}

	public function setHikerRequestId($requestId)
	{
		$this->hikerRequestId = $requestId;
	}

	public function getHikerRequestId()
	{
		return $this->hikerRequestId;
	}

	public function setDriverRequestId($requestId)
	{
		$this->driverRequestId = $requestId;
	}

	public function getDriverRequestId()
	{
		return $this->role;
	}

	public function setHikerId($userId)
	{
		$this->hikerId = $userId;
	}

	public function getHikerId()
	{
		return $this->hikerId;
	}

	public function setDriverId($userId)
	{
		$this->driverId = $userId;
	}

	public function getDriverId()
	{
		return $this->driverId;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setSenderId($userId)
	{
		$this->senderId = $userId;
	}

	public function getSenderId()
	{
		return $this->senderId;
	}


	public function setUserDeleteId($userId)
	{
		$this->userDeleteId = $userId;
	}

	public function getUserDeleteId()
	{
		return $this->userDeleteId;
	}

	public function setCreatedDate($date)
	{
		$this->createdDate = $date;
	}

	public function getCreatedDate()
	{
		return $this->createdDate;
	}

	public function setUpdatedDate($date)
	{
		$this->updatedDate = $date;
	}

	public function getUpdatedDate()
	{
		return $this->updatedDate;
	}

	public function setDeletedDate($date)
	{
		$this->deletedDate = $date;
	}

	public function getDeletedDate()
	{
		return $this->deletedDate;
	}

	public function setFinishedDate($date)
	{
		$this->finishedDate = $date;
	}

	public function getFinishedDate()
	{
		return $this->finishedDate;
	}

	public function setDeleteUsername($username)
	{
		$this->userDeleteUsername = $username;
	}

	public function getDeleteUsername()
	{
		return $this->userDeleteUsername;
	}

	public function setHikerUsername($username)
	{
		$this->hikerUsername = $username;
	}

	public function getHikerUsername()
	{
		return $this->hikerUsername;
	}

	public function setDriverUsername($username)
	{
		$this->driverUsername = $username;
	}

	public function getDriverUsername()
	{
		return $this->driverUsername;
	}

	public function setSenderUsername($username)
	{
		$this->senderUsername = $username;
	}

	public function getSenderUsername()
	{
		return $this->senderUsername;
	}

	public function setDangerLocation($address)
	{
		$this->dangerLocation = $address;
	}

	public function getDangerLocation()
	{
		return $this->dangerLocation;
	}

	public function setDangerUserId($userId)
	{
		$this->dangerUserId = $userId;
	}

	public function getDangerUserId()
	{
		return $this->dangerUserId;
	}

	public function setDangerUsername($username)
	{
		$this->dangerUsername = $username;
	}

	public function getDangerUsername()
	{
		return $this->dangerUsername;
	}
}