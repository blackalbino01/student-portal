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
            $sql = "INSERT INTO studentinfo(uploadimg,fname,mname,lname,email,birthday
            ,gender,phone,address,state,localgovt,nextofkin,jambscore) VALUES (?, ?,?,?,?,?,?,?,?,?,?,?,?)";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(1, $uploadimg, PDO::PARAM_STR);
            $statement->bindParam(2, $fname, PDO::PARAM_STR);
            $statement->bindParam(3, $mname, PDO::PARAM_STR);
            $statement->bindParam(4, $lname, PDO::PARAM_STR);
            $statement->bindParam(5, $email, PDO::PARAM_STR);
            $statement->bindParam(6, $birthday, PDO::PARAM_INT);
            $statement->bindParam(7, $gender, PDO::PARAM_STR);
            $statement->bindParam(8, $phone, PDO::PARAM_INT);
            $statement->bindParam(9, $address, PDO::PARAM_STR);
            $statement->bindParam(10, $state, PDO::PARAM_STR);
            $statement->bindParam(11, $localgovt, PDO::PARAM_STR);
            $statement->bindParam(12, $nextofkin, PDO::PARAM_STR);
            $statement->bindParam(13, $jambscore, PDO::PARAM_INT);


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

        /*public function update($Course, $Course_Desc, $id) {
            $sql = "UPDATE courses set Course = ?, Course_Desc = ? WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $Course, PDO::PARAM_STR);
                $statement->bindParam(2, $Course_Desc, PDO::PARAM_STR);
                $statement->bindParam(3, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        }

        public function delete($id) {
            $sql = "DELETE FROM courses WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }*/
    }





