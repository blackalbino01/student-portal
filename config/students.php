<?php

require_once('database.php');

class Student {
    public $uploadimg;
    public $fname;
    public $mname;
    public $lname;
    public $email;
    public $birthday;
    public $gender;
    public $phone;
    public $address;
    public $state;
    public $localgovt;
    public $nextofkin;
    public $jambscore;
    private $db;
    public function __construct() {
    }

    public function addStudent($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore) {

        $db = new DatabaseTranscations();
        $insert= $db->insert($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore);
    }
}