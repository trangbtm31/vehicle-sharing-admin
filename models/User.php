<?php
require_once Config::BASE_PATH . 'database/Database.php';
require_once Config::BASE_PATH . 'models/UserObj.php';

class User {
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getByUsername($username){
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
}
?>