<?php

class UserObj
{
    protected $userId;
    protected $username;
    protected $password;
    protected $fullname;
    protected $email;
    protected $status; // 1: admin, 2:mod,...
    protected $created;
    protected $modified;
    protected $phone;
    protected $gender;
    protected $bday;
    protected $address;
    protected $avgHikerVote;
    protected $avgDriverVote;
    protected $role;

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setPhoneNumber($phone)
    {
        $this->phone = $phone;
    }

    public function getPhoneNumber()
    {
        return $this->phone;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setBirthday($bday)
    {
        $this->bday = $bday;
    }

    public function getBirthday()
    {
        return $this->bday;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAvgHikerVote($avgHikerVote)
    {
        $this->avgHikerVote = $avgHikerVote;
    }

    public function getAvgHikerVote()
    {
        return $this->userId;
    }

    public function setAvgDriverVote($avgDriverVote)
    {
        $this->avgDriverVote = $avgDriverVote;
    }

    public function getAvgDriverVote()
    {
        return $this->avgDriverVote;
    }

    public function setRole($userRole)
    {
        $this->role = $userRole;
    }

    public function getRole()
    {
        return $this->role;
    }


}

?>