<?php

require 'database.php';

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
        $inserted = $db->insert($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore);
        if ($inserted) {
            return "Successfully inserted";
        } else {
            return "Something went wrong insertion did not happen";
        }
    }
}