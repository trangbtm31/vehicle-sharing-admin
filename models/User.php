<?php
require_once Config::BASE_PATH . 'database/Database.php';
require_once Config::BASE_PATH . 'models/UserObj.php';

class User
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @param $username
     * @return UserObj
     */
    public function getByUsername($username)
    {
        //SQL
        $sql = "SELECT * FROM admin WHERE username = '$username' AND status = 1";

        //Query
        $this->db->query($sql);

        //Fetch
        $row = $this->db->fetch();

        //Khởi tạo đối tượng UserObj
        $userObj = new UserObj();

        //Gán thông tin
        $userObj->setUserId($row['id']);
        $userObj->setUsername($row['username']);
        $userObj->setPassword($row['password']);
        $userObj->setFullname($row['full_name']);
        $userObj->setEmail($row['email_address']);
        $userObj->setStatus($row['status']);
        $userObj->setCreated($row['created_at']);
        $userObj->setModified($row['updated_at']);

        //Return
        return $userObj;
    }

    public function getList()
    {
        //SQL
        $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 10";

        //Query
        $this->db->query($sql);

        //Tạo mãng lưu trữ
        $listUser = array();

        //Fetch
        while ($row = $this->db->fetch()) {
        //Khởi tạo đối tượng UserObj
            $userObj = new UserObj();

        //Gán thông tin
            $userObj->setUserId($row['id']);
            $userObj->setPhoneNumber($row['phone']);
            $userObj->setPassword($row['password']);
            $userObj->setFullname($row['name']);
            $userObj->setEmail($row['email']);
            $userObj->setBirthday($row['birthday']);
            $userObj->setAddress($row['address']);
            $userObj->setGender($row['gender']);
            $userObj->setCreated($row['created_at']);
            $userObj->setModified($row['updated_at']);
            $userObj->setAvgHikerVote($row['avg_hiker_vote']);
            $userObj->setAvgDriverVote($row['avg_driver_vote']);
            $userObj->setRole($row['role']);

        //Gán vào mãng lưu trữ
            $listUser[] = $userObj;
        }

        //Return
        return $listUser;
    }
}

?>