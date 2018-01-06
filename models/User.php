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
        $conn = $this->db->query($sql);

        //Fetch
        $row = $this->db->fetch($conn);

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

    public function  getById($id) {
        $query = "SELECT * FROM users WHERE id =".$id;

        $conn = $this->db->query($query);

        $row = $this->db->fetch($conn);

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

        return $userObj;

    }

    public function getTopDeleteJourneyUser() {
        $query = "SELECT * FROM users WHERE role = 1";

        $conn1 = $this->db->query($query);

        $userCancelList = array();
        while($row = $this->db->fetch($conn1)) {
            $query = "SELECT * from journeys WHERE user_delete_id = ".$row['id']." AND status = 0 ";
            
            $conn = $this->db->query($query);
            $count = 0;
            //Khởi tạo đối tượng UserObj
            $userObj = new UserObj();
            while ($row1 = $this->db->fetch($conn)) {
                if($row1) {
                    $count ++;
                }
            }

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
            $userObj->setJourneyDeleteTimes($count);

            if($count>0) {
                //Gán vào mãng lưu trữ
                $userCancelList[] = $userObj;
            }
        }
        return $userCancelList;
    }

    public function getUserList() {
        $query = "SELECT * FROM users ORDER BY id DESC LIMIT 10";

        return $this->getListBase($query);
    }

    public function getListBase($query)
    {
        //Query
        $conn = $this->db->query($query);

        //Tạo mãng lưu trữ
        $listUser = array();

        //Fetch
        while ($row = $this->db->fetch($conn)) {
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