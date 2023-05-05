<?php
class DataBase{

    private $host;
    private $username;
    private $password;
    private $dbname;
    private $pdo;

//  конструктор при создании заполнит поля
    public function __construct($host,$dbname,$username,$password)
    {

        $this->host= $host;
        $this->username=$username ;
        $this->password= $password;
        $this->dbname=$dbname ;

        try {
        //инкапсулируем  PDO
         $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);

        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());

        }

    }

    public function getPdo(){
    return $this->pdo;
    }

}