<?php
/**
 * Created by PhpStorm.
 * User: trangbtm
 * Date: 02/01/2018
 * Time: 13:38
 */
class MySql
{
    protected $_query;
    protected $connection;

    public function __construct(){
//Connect
        $this->connection = mysqli_connect(Config::DB_SERVER, Config::DB_USERNAME, Config::DB_PASSWORD, Config::DB_DATABASE) or die('Not connected DB!');

//Set UTF8
        mysqli_query($this->connection, 'SET NAMES UTF8');
    }

    public function query($sql){
//Truy vấn và return
        return mysqli_query($this->connection, $sql);
    }

    public function fetch($conn){
//Fetch và return
        return mysqli_fetch_assoc($conn);
    }
	
	public function escapeString($value) {
        return mysqli_escape_string($this->connection, $value);
	}
}
?>
