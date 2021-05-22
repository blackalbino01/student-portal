<?php
class PDOConfig extends PDO
{

    public $host = 'localhost';
    public $user  = 'root';
    public $database = 'student-portal';
    public $password = '';

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->database = 'student-portal';
        $this->password = '';
        $dsn = 'mysql:host=' .$this->host . ';port=3306'. ';dbname=' . $this->database;
        parent::__construct($dsn, $this->user,$this->password);
    


    }

   
}
