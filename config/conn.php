<?php
class PDOConfig extends PDO
{

    private $host = 'localhost';
    private $user  = 'root';
    private $database = 'student-portal';

   public $con =null;
    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->database = 'student-portal';
        $dsn = 'mysql:host=' . $this->host . ';database=' . $this->database;
        parent::__construct($dsn, $this->user);
    


    }

   
}
