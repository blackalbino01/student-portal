<?php
    require_once('conn.php');

    class DatabaseTranscations extends PDOStatement {
        private $connection;

        public function __construct()
        {
        }

        private function connection() {
            $connection = new PDOConfig();
            if($connection === false){
                echo "ERROR: Could not connect. " . mysqli_connect_error();
            }
            return $connection;
        }

        public function insert($uploadimg,$fname,$mname,$lname,$email,$birthday,$gender,$phone,$address,$state,$localgovt,$nextofkin,$jambscore) {

            $sql = "INSERT INTO studentinfo(`uploadimg`,`fname`,`mname`,`lname`,`email`,`birthday`,`gender`,`phone`,`address`,`state`,`localgovt`,`nextofkin`,`jambscore`) VALUES ('".$uploadimg."', '".$fname."', '".$mname."', '".$lname."', '".$email."', '".$birthday."', '".$gender."', '".$phone."', '".$address."', '".$state."', '".$localgovt."', '".$nextofkin."', '".$jambscore."')";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);

                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function select($id = null) {
           if (isset($id)) {
               $sql = "SELECT * FROM studentinfo WHERE id = :id";
           try {
               $connection = $this->connection();
               $statement = $connection->prepare($sql);
               $statement->bindValue(':id', $id);
               $statement->execute();
               $result = $statement->fetch(PDO::FETCH_ASSOC);
               $connection = null;
               return $result;
           } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
           }
           } else {
               $sql =  "SELECT * FROM studentinfo";
               try {
                   $connection = $this->connection();
                   $statement = $connection->query($sql);
                   $result = $statement->fetchAll();
                   $connection = null;
                   return $result;
               } catch (PDOException $e) {
                   echo $e->getMessage();
                   return false;
               }
           }
        }

        public function searchSelect($gender = null,$jambscore = null){
            $sql = "SELECT * FROM studentinfo WHERE `gender` = '$gender' AND `jambscore` = '$jambscore'";  
            try {
               $connection = $this->connection();
               $statement = $connection->query($sql);
               $result = $statement->fetchAll();
               $connection = null;
               return $result;
            } catch (PDOException $e) {
               echo $e->getMessage();
               return false;
            }          
        }

        public function ajaxsearch($admstatus=null){
            $sql = "SELECT * FROM studentinfo WHERE `admstatus`= '$admstatus'";

            try{
                $connection = $this->connection();
                $statement = $connection->query($sql);
                $result = $statement->fetchAll();
                $connection = null;
                return $result;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function liveSearch($name=null){
            $sql = "SELECT * FROM studentinfo WHERE `fname` LIKE '%$name%' OR `mname` LIKE '%$name%' OR `lname` LIKE '%$name%'";

            try{
                $connection = $this->connection();
                $statement = $connection->query($sql);
                $result = $statement->fetchAll();
                $connection = null;
                return $result;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function update($admstatus,$id) {
            $sql = "UPDATE studentinfo set `admstatus` = '$admstatus' WHERE `id` = $id";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
              }
        }

    }