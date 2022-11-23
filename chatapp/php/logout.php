<?php
     session_start();
     if (isset($_SESSION['unique_id'])) {
        include_once "config.php";
        $sql = mysqli_query($conn, "UPDATE users SET status = 'Offline now' WHERE `users`.`unique_id` = {$_SESSION['unique_id']}");
        if ($sql) {
            session_unset();
            session_destroy();
            header("location: ../login.php");
        }else {
            header("location: ../users.php");
        }
     }else {
        header("location: ../login.php");
     }
?>