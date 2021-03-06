<?php

require_once 'database.php';

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
    public $name;
    public $admstatus;
    private $db;
    public function __construct() {
    }

    public function addStudent($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore) {

        $db = new DatabaseTranscations();
        $insert= $db->insert($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore);
    }

    public function viewStudents() {
       $db = new DatabaseTranscations();
       $result = $db->select();
       if ($result) {
           return $result;
       } else {
           return "No results returned";
       }
    }

    public function viewStudent($id) {
       $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

       $db = new DatabaseTranscations();
       $result = $db->select($id);
       if ($result) {
           return $result;
       } else {
           return "No results returned";
       }
    }

    public function searchStudents($gender ,$jambscore){
        $db = new DatabaseTranscations();
        $result = $db->searchSelect($gender,$jambscore);
        if ($result) {
           return $result;
        } else {
           return "No results returned";
        }
    }

    public function searchWithAdm($admstatus){
        $db = new DatabaseTranscations();
        $result = $db->ajaxsearch($admstatus);
        if ($result) {
            return $result;
        } else{
            return "No results returned";
        }
    }

    public function searchWithName($name){
        $db = new DatabaseTranscations();
        $result = $db->liveSearch($name);
        if ($result) {
            return $result;
        } else{
            return "No results returned";
        }
    }


    public function editAdmstatus($admstatus,$id) {
        $db = new DatabaseTranscations();
        $result = $db->update($admstatus,$id);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}