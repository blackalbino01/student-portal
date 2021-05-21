<?php
    define('db_host','localhost');
    define('db_user','root');
    define('db_password','');
    define('db_database','student-portal');

    $conn = mysqli_connect(db_host, db_user, db_password, db_database);
    

    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " : " . mysqli_connect_errno();
        exit($msg);
      }
?>