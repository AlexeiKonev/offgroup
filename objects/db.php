<?php
class db{
//    private $pdo;
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;
//  конструктор при создании заполнит поля
    public function __construct($host,$username,$password,$dbname)
    {

        $this->$host= $host;
        $this->$username=$username ;
        $this->$password= $password;
        $this->$dbname=$dbname ;


    }
    public function getHost(){
    return $this->host;
}
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getDBname(){
        return $this->dbname;
    }

}